@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Deals</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('deals.create') }}" class="btn btn-success float-right mb-3">New Deal</a>

    <table class="table table-bordered" id="dealsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Internal Name</th>
                <th>Title</th>
                <th>Sale Price</th>
                <th>Normal Price</th>
                <th>Is On Sale</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.alert').fadeOut();
        }, 2000);
        new DataTable('#dealsTable', {
            processing: true,
            serverSide: true,
            ajax: '{!! route('deals.index') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'internal_name', name: 'internal_name' },
                { data: 'title', name: 'title' },
                { data: 'sale_price', name: 'sale_price' },
                { data: 'normal_price', name: 'normal_price' },
                { data: 'is_on_sale', name: 'is_on_sale' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endsection
