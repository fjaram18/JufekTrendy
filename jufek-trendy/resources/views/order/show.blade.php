@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<!-- Author: Federico Jaramillo -->
<div class="container">
    {{ Breadcrumbs::render('order', $data["order"][0]) }}
    <div class="card">
        <div class="card-header text-white bg-secondary">
            <div class="row justify-content-center">
                <h3>{{__('messages.order')}}</h3>
            </div>
            <div class="row justify-content-center">
                <b><a href="" onClick="printPDF()">Print PDF</a></b>
            </div>
        </div>
        <div class="card-body">
            @foreach($data["order"][0]->items as $item)
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <b>{{__('messages.product_name')}}: </b>
                    <a>{{ $item->product->getName() }}</a>
                    @if($item->customization)
                    <a><i>{{__('messages.with')}}</i> {{ $item->customization->getName() }}</a>
                    @endif
                </div>
                <div class="col-md-2">
                    <b>{{__('messages.amount')}}: </b>
                    <a>{{ $item->getAmount() }}</a>
                </div>
                <div class="col-md-2">
                    <b>{{__('messages.subtotal')}}: </b>
                    <a>${{ $item->getSubtotal() }}</a>
                </div>
            </div>
            @if(!$loop->last)
            <hr>
            @endif
            @endforeach
            <hr style="border-top: 2px solid black">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <b>{{__('messages.order_created')}}:</b> {{ $data["order"][0]->getDate() }}
                </div>
                <div class="col-md-3">
                    <b>{{__('messages.order_shipping_date')}}:</b> {{ $data["order"][0]->getShippingDate() }}
                </div>
                <div class="col-md-2">
                    <b>{{__('messages.state')}}: </b>
                    @if($data["order"][0]->getState() == "Active")
                    <a style="color: green;">{{ $data["order"][0]->getState() }}</a>
                    @else
                    <a style="color: red;">{{ $data["order"][0]->getState() }}</a>
                    @endif
                </div>
                <div class="col-md-2">
                    <b>{{__('messages.order_total')}}:</b> ${{ $data["order"][0]->getTotal() }}
                </div>
            </div>
        </div>
        <div class="card-footer text-white bg-secondary" style="text-align: center">
            @if($data["order"][0]->getState() == "Active")
            <a href="{{ route('order.cancel', ['id'=> $data['order'][0]->getId()]) }}" class="btn btn-danger btn-sm" type="button">{{__('messages.cancel_order')}}</a>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
    function printPDF() {
        window.print();  
    }
</script>
@endsection