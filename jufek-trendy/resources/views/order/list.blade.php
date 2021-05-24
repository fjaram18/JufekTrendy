@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<!-- Author: Federico Jaramillo -->
<div class="container">
    {{ Breadcrumbs::render('orders') }}
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1>{{__('messages.my_order')}}</h1>
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <a href="{{ route('order.export') }}">{{__('messages.export')}}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($data["orders"] as $order)
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <h4>{{__('messages.order')}} {{ $loop->iteration }}</h4>
                </div>
                <div class="col-md-2">
                    {{__('messages.order_created')}}: {{ $order->getDate() }}
                </div>
                <div class="col-md-2">
                    {{__('messages.order_shipping_date')}}: {{ $order->getShippingDate() }}
                </div>
                <div class="col-md-2">
                    {{__('messages.state')}}:<br>
                    @if($order->getState() == 'Active')
                    <a style="color: green;">{{ $order->getState() }}</a>
                    @else
                    <a style="color: red;">{{ $order->getState() }}</a>
                    @endif
                </div>
                <div class="col-md-2">
                    {{__('messages.order_total')}}:<br>${{ $order->getTotal() }}
                </div>
                <div class="col-md-2">
                    <a href="{{ route('order.show', ['id'=> $order->getId()]) }}" class="btn btn-info btn-lg" type="button">{{__('messages.view')}}</a>
                </div>
            </div>
            @if(!$loop->last)
            <hr>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection