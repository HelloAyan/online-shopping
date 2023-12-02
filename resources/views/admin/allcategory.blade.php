@extends('admin.layouts.template')

@section('page_title')
All Category - Online Shop
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Category</h4>
    <div class="card">
        <h5 class="card-header">Available Category</h5>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>

        @endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Sub Category</th>
                        <th>Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                    $counter = 1;
                    @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$category->category_name}} </td>
                        <td>{{$category->slug}}</td>
                        <td>100</td>
                        <td>
                            <a href="{{route('editCategory', $category->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('deleteCategory', $category->id)}}" class="btn btn-warning">Delete</a>
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