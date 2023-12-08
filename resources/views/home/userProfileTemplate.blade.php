@extends('home.layouts.template')

@section('page_title')
    User Profile - Online Shop
@endsection

@section('main-container')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{ route('userProfile') }}">Dashboard</a></li>
                        <li><a href="{{ route('pendingOrders') }}">Pending Order</a></li>
                        <li><a href="{{ route('history') }}">History</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
@endsection
