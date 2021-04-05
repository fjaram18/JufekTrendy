@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-start">
                <h1 style="padding-left: 20px;">
                    @if( $data["product"]->getStock() == 0 )
                        <a style="color: red;">{{__('messages.no_stock2')}}</a>
                    @else
                        {{ $data["product"]->getName() }}
                    @endif
                </h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-start">
                <div class="col-md-5">
                    <div class="show-holder">
                        <img src="{{ asset('/img/product').'/'.$data['product']->getImage() }}" alt="{{__('messages.image_error')}}">
                    </div>
                </div>
                <div class="col-md-3 justify-content-start">
                    <h2 style="padding-top: 20px;">{{ $data["product"]->getName() }}</h2>
                    <hr>
                    <h4 style="padding-top: 20px;">${{ $data["product"]->getPrice() }}</h4>
                    <p style="padding-top: 50px;"><b>{{__('messages.size')}}: </b>{{ $data["product"]->getSize()  }}</p>
                    <p style="padding-top: 20px;">{{ $data["product"]->getDescription() }}</p>
                    @if(sizeOf($data["product"]->customizations) && !Session::get('customization'))
                     <a href="{{ route('customization.show', ['id'=> $data['product']->getId()]) }}" class="btn btn-primary" type="button" ">{{__('messages.customize')}}</a>
                    @endif
                </div>
                <div class="col-md-2 offset-md-2">
                @if( $data["product"]->getStock() > 0 )
                    <form method="POST" action="{{ route('cart.add', ['id'=> $data['product']->getId()]) }}" style="padding-top: 90px;">
                        @csrf
                        <select require type="number" class="form-control form-control-lg" name="amount" style="width: 90px;">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <br>
                        @if(Session::get('products') && array_key_exists( $data["product"]->getId(), Session::get('products') ))
                            <button type="submit" class="btn btn-primary" style="margin-right: 40px;" onClick="window.location.reload();">{{__('messages.update_cart')}}</button>
                        @else
                            <button type="submit" class="btn btn-primary" style="margin-right: 40px;" onClick="window.location.reload();">{{__('messages.add_to_cart')}}</button>
                        @endif
                    </form>
                @endif
                @if(Session::get('products') && array_key_exists( $data["product"]->getId(), Session::get('products') ))
                <br>
                    <a href="{{ route('cart.delete', ['id'=> $data['product']->getId()]) }}" class="btn btn-secondary btn-sm" type="button" style="margin-right: 40px;">{{__('messages.delete')}}</a>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection