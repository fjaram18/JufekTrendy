@extends('layouts.app')

@section('content') 
    @guest
    @else
    <div class="container">
        <div class="row justify-content-center">
        <h1>{{__('messages.welcome_message')}}, {{ Auth::user()->getName() }}!</h1>
        </div>
        <br>
        <div class="row justify-content-center">
            <diV style="padding-right: 20px;">
                <a href="{{ route('product.list') }}" class="btn btn-secondary btn-lg" type="button" >{{__('messages.avaible_products')}}</a>
            </div>
            <div style="padding-right: 20px;">
                <a href="{{ route('customization.list') }}" class="btn btn-secondary btn-lg" type="button" >{{__('messages.customizable_products')}}</a>
            </div>
            <div>
                <a href="{{ route('order.list') }}" class="btn btn-secondary btn-lg" type="button" >{{__('messages.my_order')}}</a>
            </div>
        </div>
    </div>
    @endguest
    <br><br>
    <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid" width="350" height="350" src="{{ asset('/img/logo/logoJufexTrendy.jpeg') }}" alt="" />
    </div>
@endsection
