@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Available products</h1>
            <ul>
                @foreach($data["products"] as $key => $product)
                <li>
                    Id: {{ $key }} -
                    Name: {{ $product["name"] }} -
                    Price: {{ $product["price"] }} -
                    <a href="{{ route('cart.add', ['id'=> $key]) }}">Add to cart</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    <div class="row">
                        <div class="col-md-4">
                            <h1>{{__('messages.shopping_cart')}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-2">
                            <a class="text-nowrap" style="padding-top: 100px;">{{__('messages.price')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($data["productsInCart"] as $key => $product)
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="holder">
                                            <img src="{{ asset('/img/product').'/'.$key.'.jpeg' }}" alt="{{__('messages.image_error')}}">
                                    </div>
                                </div>
                                <div class="col-md-3" style="text-align: left; padding-top: 55px;">
                                    <h3>{{ $product->getName() }}</h3>
                                    @if ($product->getStock() > 0)
                                        <small style="color: green;">{{__('messages.inStock')}}</small>
                                    @else
                                        <small style="color: red;">{{__('messages.noStock')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-3" style="padding-top: 50px;">
                                    <p>{{__('messages.delete')}}</p>
                                    <a href="{{ route('cart.delete', ['id'=> $key]) }}" class="btn btn-secondary btn-lg" type="button">X</a>
                                </div>
                                <div class="col-md-2" style="padding-top: 75px;">
                                    <h4>${{ $product->getPrice() }}</h4>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    </ul>
                </div>    
                <div class="card-footer text-white bg-secondary" style="text-align: right">
                    <a>{{__('messages.priceTotal')}} ({{ count($data["productsInCart"]) }}): </a>
                    <b style="font-size: 150%;"> ${{ $data["totalPrice"] }} </b>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection