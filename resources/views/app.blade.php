<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Aplicación</title>
    <!-- Agrega enlaces a las bibliotecas jQuery y Bootstrap aquí -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="logo"></div>
        <ul class="navbar-nav ml-auto d-flex align-items-center list-inline">
            <li class="nav-item mr-3">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item cart-button">
                <a class="nav-link btn-color" href="#"><i class="fas fa-shopping-cart "></i>&nbsp;Cart</a>
            </li>
        </ul>
    </nav>

    <div class="">
        <div class="poster"></div>
        <div class="d-flex justify-content-center mt-4">
            <div class="input-group gradient-border">
                <input type="text" id="search" class="form-control border-0 transparent-bg" placeholder="Search...">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent border-0"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        <div class="row div-results" id="searchResults"></div>
        <div class="row pagination">
            <nav class="pagination">
                <ul>
                </ul>
            </nav>
        </div>
    </div>
    <script src="{{ asset('js/cards.js') }}"></script>
    <footer class="bg-dark text-center text-light py-3">
    </footer>
</body>
</html>




