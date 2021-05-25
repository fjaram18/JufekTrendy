@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<!-- Author: Federico Jaramillo -->
<div class="container">
    {{ Breadcrumbs::render('allied') }}
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h1>{{__('messages.allied_products')}}</h1>
            </div>
        </div>
        <div class="card-body">
            @foreach ($data["responseBody"] as $response)
            <div class="row justify-content-center">
                <b>{{__('messages.product_name')}}: </b>&nbsp {{ $response->name }}
                &nbsp&nbsp&nbsp
                <b>{{__('messages.product_brand')}}: </b>&nbsp {{ $response->brand }}
                &nbsp&nbsp&nbsp
                <b>{{__('messages.product_category')}}: </b>&nbsp {{ $response->category }}
                &nbsp&nbsp&nbsp
                <b> {{__('messages.product_price')}}: </b>&nbsp ${{ $response->price }}
            </div>
            @if (!$loop->last)
            <hr>
            @endif
            @endforeach
        </div>
        <div class="card-footer text-white bg-secondary" style="text-align: right">
            <b>{{__('messages.more_at')}}</b><a href="https://www.google.com">Seed shop</a>
        </div>
    </div>
    @endsection