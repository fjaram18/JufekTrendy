@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
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
                        <div class="col-md-10" style="text-align: left;">
                            <a href="{{ route('cart.removeAll') }}">{{__('messages.remove_all')}}</a>
                        </div>
                        <div class="col-md-2">
                            <a class="text-nowrap" style="padding-top: 100px;"><b>{{__('messages.price')}}</b></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        @if($data["customization"][0])
                        <div class="row">
                            <div class="col-md-2">
                                <div class="holder">
                                    <img src="{{ asset('/img/product').'/'.$data['customization'][0]->product->getImage() }}" alt="{{__('messages.image_error')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="holder">

                                    <img src="{{ asset('/img/customization').'/'.$data['customization'][0]->getImage() }}" alt="{{__('messages.image_error')}}">

                                </div>
                            </div>
                            <div class="col-md-3" style="padding-top: 40px; padding-left:40px;">
                                <h3>{{ $data['customization'][0]->product->getName() }}</h3>
                                <a>{{__('messages.with')}}</a>
                                <h3 style="padding-top: 7px;">{{ $data['customization'][0]->getName() }}</h3>
                            </div>
                            <div class="col-md-3" style="padding-top: 50px;">
                                <p>{{__('messages.delete')}}</p>
                                <a href="{{ route('cart.deleteCustomization') }}" class="btn btn-secondary btn-lg" type="button">X</a>
                            </div>
                            <div class="col-md-2" style="padding-top: 65px;">
                                <h4>${{ $data['customization'][0]->product->getPrice()  }}</h4>
                                <h4>${{ $data['customization'][0]->getPrice()  }}</h4>
                            </div>
                        </div>
                        @if($data["productsInCart"])
                        <hr>
                        @endif
                        @endif
                        @foreach($data["productsInCart"] as $key => $product)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="holder">
                                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                                        <img src="{{ asset('/img/product').'/'.$product->getImage() }}" alt="{{__('messages.image_error')}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3" style="text-align: left; padding-top: 25px;">
                                <h3>{{ $product->getName() }}</h3>
                                @if ($product->getStock() - intval($data["amountInCart"][$key]) >= 0)
                                <small style="color: green;">{{__('messages.in_stock')}}</small>
                                @else
                                <small style="color: red;">{{__('messages.no_stock')}}</small>
                                @endif
                                <form method="POST" action="{{ route('cart.add', ['id'=> $product->getId()]) }}" style="text-align: left; padding-top: 25px;">
                                    @csrf
                                    <select require type="submit" class="form-control form-control-sm" name="amount" style="width: 110px;" onchange="this.form.submit();">
                                        <option value="" selected disabled hidden>{{__('messages.quantity')}}: {{ intval($data["amountInCart"][$key]) }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </form>
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
                    <a>{{__('messages.price_total')}} ({{ Session::get('amount') }}):</a>
                    <b style="font-size: 150%; padding-left:6px;">${{ $data["totalPrice"] }} </b>
                    <div style="padding-top:10px;">
                    <a href="{{ route('order.save') }}" class="btn btn-primary btn-sm" type="button">{{__('messages.confirm_order')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection