@extends('home.layouts.template')

@section('page_title')
    Product Details - Online Shop
@endsection

@section('main-container')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img">
                        <img src="{{ asset($product->img) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <div class="product-info">
                        <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;"> ${{ $product->price }}</span>
                        </p>
                    </div>
                    <div class="my-3 product-details">
                        <p class="lead">{{ $product->product_long_description }} </p>
                        <ul class="p2 bg-light my-2">
                            <li>Category - {{ $product->product_category_name }}</li>
                            <li>Sub Category - {{ $product->product_sub_category_name }}</li>
                            <li>Available Quantity - {{ $product->quantity }}</li>
                        </ul>

                    </div>
                    <div class="btn_main">
                        <form action="{{ route('addProductToCart') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="1" name="quantity">
                            <div class="form-group">
                                <label class="pr-2" for="product_quantity">How Many Pics?</label>
                                <input class="form-control" style="width: 100px;" type="number" min="1"
                                    name="quantity" placeholder="1">
                            </div>

                            <br>
                            <input class="btn btn-warning" type="submit" value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="fashion_section mt-5">
            <div id="main_slider">
                <div class="container">
                    <h1 class="fashion_taital">Related Product</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            @foreach ($related_products as $product)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                        <p class="price_text">Price <span style="color: #262626;">$
                                                {{ $product->price }}</span></p>
                                        <div class="tshirt_img"><img src="{{ asset($product->img) }}">
                                        </div>
                                        <div class="btn_main">
                                            <div class="buy_bt">
                                                <form action="{{ route('addProductToCart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input class="btn btn-primary" type="submit" value="Add To Cart">
                                                </form>
                                            </div>
                                            <div class="seemore_bt"><a
                                                    href="{{ route('productDetails', [$product->id, $product->slug]) }}">See
                                                    More</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
