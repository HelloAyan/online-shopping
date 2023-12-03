@extends('admin.layouts.template')

@section('page_title')
    All Sub Category - Online Shop
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Sub Category</h4>
        <div class="card">
            <h5 class="card-header">Available Sub Category</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Sub Category Name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $subcategory->subcategory_name }} </td>
                                <td>{{ $subcategory->category_name }}</td>
                                <td>{{ $subcategory->product_count }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                            @php
                                $counter++; // Increment the counter for the next row
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
