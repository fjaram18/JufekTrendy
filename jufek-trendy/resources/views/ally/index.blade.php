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
                <b>{{__('messages.product_name')}}: </b>&nbsp {{ $response->question }} 
                &nbsp&nbsp&nbsp
                <b> {{__('messages.allied_products')}}: </b>&nbsp {{ $response->answers->answer_a }}
            </div>
            <hr>
            @endforeach
        </div>
        <div class="card-footer text-white bg-secondary" style="text-align: right">
        </div>
    </div>
@endsection