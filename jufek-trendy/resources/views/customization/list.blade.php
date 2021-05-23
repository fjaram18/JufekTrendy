@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<!-- Author: Federico Jaramillo -->
<div class="container">
    {{ Breadcrumbs::render('customizables') }}
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h1>{{__('messages.customizable_products')}}</h1>
            </div>
        </div>
        <div class="card-body">
        @foreach ($data["products"]->chunk(3) as $chunk)
            <div class="row justify-content-center">
            @foreach ($chunk as $key => $product)
                <div class="col-md-4">
                    <div class="holder">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                            <img src="{{ asset('/img/product').'/'.$product->getImage() }}" alt="{{__('messages.image_error')}}">
                        </a>
                    </div>
                    <h4>{{ $product->getName() }}</h4>
                    <p>${{ $product->getPrice() }}</p>
                </div>
            @endforeach
            </div>
            @if(!$loop->last)
                <hr>
            @endif
        @endforeach
        </div>
        <div class="card-footer text-white bg-secondary">
        </div>
    </div>
</div>
@endsection