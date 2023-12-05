@extends('admin.layouts.template')

@section('page_title')
    All Product - Online Shop
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Product</h4>
        <div class="card">
            <h5 class="card-header">Available Product</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $product->product_name }} </td>
                                <td><img style="width: 50px;" src={{ asset($product->img) }} alt=""></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td style= "display: flex; column-gap: 5px; padding-bottom:21px;">
                                    <a href="{{ route('editProduct', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{ route('deleteProduct', $product->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this Product?');">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-warning" type="submit" value="Delete">
                                    </form>
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
