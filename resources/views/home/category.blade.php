@extends('home.layouts.template')

@section('page_title')
    Category - Online Shop
@endsection

@section('main-container')
    <h2></h2>

    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
                <h1 class="fashion_taital">{{ $categories->category_name }} - ({{ $categories->product_count }})</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($product as $pro)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $pro->product_name }}</h4>
                                    <p class="price_text">Price <span style="color: #262626;">$
                                            {{ $pro->price }}</span></p>
                                    <div class="tshirt_img"><img src="{{ asset($pro->img) }}">
                                    </div>
                                    <div class="btn_main">
                                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                                        <div class="seemore_bt"><a href="#">See More</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
