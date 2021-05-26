@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<!-- Author: Federico Jaramillo -->
<div class="container">
    {{ Breadcrumbs::render('rates') }}
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h1>{{__('messages.currency_rate')}}</h1>
            </div>
        </div>
        <div class="card-body">
            <b>$1 {{ $data["responseBody"]->base }}</b>
            {{__('messages.equal_to')}}
            <b>${{ $data["responseBody"]->rates->COP }} COP</b>
        </div>
        <div class="card-footer text-white bg-secondary" style="text-align: right">
        </div>
    </div>
    @endsection