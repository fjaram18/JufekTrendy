@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<!-- Author: Federico Jaramillo -->
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h2>{{__('messages.search_results')}} <a style="color:white;">"{{ $data['term'] }}"</a></h2>
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
        <div class="card-footer text-white bg-secondary" style="text-align: right">
            <div class="row justify-content-center">
                {{ $data["products"]->links() }}
            </div>
        </div>
    </div>
    <br><br>
    <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid" width="350" height="350" src="{{ asset('/img/logo/logoJufexTrendy.jpeg') }}" alt="" />
    </div>
</div>
@endsection