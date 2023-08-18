// Global variables
var deals = [];
var searchTimeout;
var currentPage;
var totalPages;

function fetchDeals(page = 1) {
    currentPage=1;
    $.ajax({
        url: "/api/deals",
        data: { page: page },
        dataType: "json",
        success: function (response) {
            deals = response.data;
            totalPages = response.last_page;
            loadCards();
        },
        error: function () {
            console.error("Error loading deals.");
        },
    });
}

function searchDeals(query, page = 1) {
    $("#searchResults").empty();
    if(page <=0) page=1;
    currentPage=page;
    $.ajax({
        url: "/api/deals",
        data: { q: query, page: page },
        dataType: "json",
        success: function (response) {
            deals = response.data;
            totalPages = response.last_page;
            loadCards()
        },
        error: function () {
            console.error("Error performing deals search.");
        },
    });
}

function loadCards() {
    var searchResults = $("#searchResults");
    searchResults.empty(); // Clear the search results div

    // Loop through the 'deals' array and create rows of cards
    for (var i = 0; i < deals.length; i += 3) {
        var row = $('<div class="row mb-4"></div>'); // Create a new row

        // Loop through the next three deals and create cards
        for (var j = i; j < i + 3 && j < deals.length; j++) {
            var deal = deals[j];
            var savingCircle = '';
            if (deal.savings > 0) {
                savingCircle = `<div class="saving-circle"><h2>${parseInt(deal.savings)}%off</h2></div>`;
            }
            var cardHtml = `
                <div class="col-md-4">
                    <div class="card">
                        <img src="${deal.thumb}" class="card-img-top" alt="${deal.title}">
                        ${savingCircle}
                        <div class="card-body">
                            <h5 class="card-title">${deal.title}</h5>
                            <h3 class="card-text text-center">
                                Steam Review:
                                <p class="steam-rating text-center">
                                    <i class="fas fa-star${deal.steam_rating_percent >= 20 ? ' filled' : ''}"></i>
                                    <i class="fas fa-star${deal.steam_rating_percent >= 40 ? ' filled' : ''}"></i>
                                    <i class="fas fa-star${deal.steam_rating_percent >= 60 ? ' filled' : ''}"></i>
                                    <i class="fas fa-star${deal.steam_rating_percent >= 80 ? ' filled' : ''}"></i>
                                    <i class="fas fa-star${deal.steam_rating_percent >= 100 ? ' filled' : ''}"></i>
                                </p>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <a class="btn  gradient-link" href="#">
                                    <span class="normal-price">${deal.normal_price}</span>
                                    <span class="sale-price">${deal.sale_price}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            row.append(cardHtml);
        }

        searchResults.append(row); // Append the row of cards to the search results div

          // Display pagination links
          var paginationHtml = "";
          if (deals.length > 0) {
              paginationHtml += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                                      <a class="page-link" href="#" onclick="searchDeals('${$('#search').val()}', ${currentPage - 1})">Previous</a>
                                  </li>`;
              paginationHtml += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                                      <a class="page-link" href="#" onclick="searchDeals('${$('#search').val()}', ${currentPage + 1})">Next</a>
                                  </li>`;
          }
          $(".pagination ul").html(paginationHtml);

                // Disable "Previous" button on the first page
            if (currentPage <= 1) {
                $(".pagination ul li:first-child").addClass("disabled");
            }

            // Disable "Next" button on the last page
            if (currentPage >= totalPages) {
                $(".pagination ul li:last-child").addClass("disabled");
            }

    }
}

$(function () {
    fetchDeals();

    $("#search").on("input", function () {
        clearTimeout(searchTimeout);
        var query = $(this).val();

        searchTimeout = setTimeout(async function () {
            await searchDeals(query);
            loadCards();
        }, 800);
    });
});
