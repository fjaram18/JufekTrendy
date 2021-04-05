@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h1>{{__('messages.customize')}}: {{ $data["product"]->getName() }}</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <a>{{__('messages.pick_customization')}}</a>
            </div>
            <hr>
            @foreach ($data["customizations"]->chunk(3) as $chunk)
            <div class="row justify-content-center">
                @foreach ($chunk as $key => $customization)
                <div class="col-md-4">
                    <div class="holder">
                        <img src="{{ asset('/img/customization').'/'.$customization->getId().'.jpeg' }}" alt="{{__('messages.image_error')}}">
                    </div>
                    <h4>{{ $customization->getName() }}</h4>
                    <a>${{ $customization->getPrice() }}</a>
                    <br>
                    <a style="border-right: 2px solid gray; padding-right: 12px;"><b>{{__('messages.location')}}:</b> {{ $customization->getLocation() }}</a>
                    <a style="padding-left: 6px;"><b>{{__('messages.size')}}: </b>{{ $customization->getSize() }} cm<sup>2</sup></a>
                    <br>
                    <a href="{{ route('cart.addCustomization', ['id' => $customization->getId()]) }}" class="btn btn-primary btn-sm" type="button" ">{{__('messages.add_customize')}}</a>
                </div>
                @endforeach
            </div>
            @if(!$loop->last)
            <hr>
            @endif
            @endforeach
        </div>
    </div>
    <br><br>
    <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid" width="350" height="350" src="{{ asset('/img/logo/logoJufexTrendy.jpeg') }}" alt="" />
    </div>
</div>
@endsection