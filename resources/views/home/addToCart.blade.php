@extends('home.layouts.template')

@section('page_title')
    Add to Cart - Online Shop
@endsection

@section('main-container')
    <h2>Add to Cart page</h2>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>

                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($cart_items as $cart_item)
                            @php
                                $product_name = App\Models\product::where('id', $cart_item->product_id)->value('product_name');
                                $product_image = App\Models\product::where('id', $cart_item->product_id)->value('img');
                            @endphp
                            <tr>
                                <th>{{ $counter }}</th>
                                <th>{{ $product_name }}</th>
                                <th><img style="width: 50px;" src="{{ asset($product_image) }}"></th>
                                <th>{{ $cart_item->quantity }}</th>
                                <th>{{ $cart_item->price }}</th>
                                <th><a href="" class="btn btn-warning"> Remove</a></th>
                            </tr>
                            @php
                                $counter++; // Increment the counter for the next row
                            @endphp
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
