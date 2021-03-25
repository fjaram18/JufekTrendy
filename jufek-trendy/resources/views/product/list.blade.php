@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid" width="350" height="350" src="{{ asset('/img/logo/logoJufexTrendy.jpeg') }}" alt="" />
    </div>
    <br><br><br>
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h1>{{__('messages.avaible_products')}}</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                @foreach ($data["products"] as $key => $product)
                @if(!(($loop->iteration - 1) % 3) && !$loop->first)
                <div class="row justify-content-center">
                    @endif
                    <div class="col-md-4">
                        <div class="holder">
                            <a href="{{ route('product.show', ['id' => $key]) }}">
                                <img src="{{ asset('/img/product').'/'.$key.'.jpeg' }}" alt="{{__('messages.image_error')}}">
                            </a>
                        </div>
                        <h4>{{ $product->getName() }}</h4>
                        <p>${{ $product->getPrice() }}</p>
                        @if( $product->getStock() == 0 )
                        <small style="color: red;">{{__('messages.no_stock2')}}</small>
                        @endif
                    </div>
                    @if(!($loop->iteration % 3) && !$loop->last)
                </div>
                <hr>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection