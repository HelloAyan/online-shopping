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
                            $total = 0;
                        @endphp

                        @foreach ($cart_items as $cart_item)
                            @php
                                $product_name = App\Models\product::where('id', $cart_item->product_id)->value('product_name');
                                $product_image = App\Models\product::where('id', $cart_item->product_id)->value('img');
                            @endphp
                            <tr>
                                <td class="align-middle">{{ $counter }}</td>
                                <td class="align-middle">{{ $product_name }}</td>
                                <td class="align-middle"><img style="width: 50px;" src="{{ asset($product_image) }}"></td>
                                <td class="align-middle">{{ $cart_item->quantity }}</td>
                                <td class="align-middle">{{ $cart_item->price }}</td>
                                <td class="align-middle"><a href="" class="btn btn-warning"> Remove</a></td>
                            </tr>
                            @php
                                $counter++;
                                $total = $total + $cart_item->price;
                            @endphp
                        @endforeach
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="align-middle">Total Price</th>
                        <th class="align-middle">{{ $total }}</th>
                        <th></th>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection;
