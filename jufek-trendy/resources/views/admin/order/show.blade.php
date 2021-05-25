
@extends('layouts.app')
<!-- Author: Juan Camilo Echeverri -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        {{ Breadcrumbs::render('showorder', $data["order"] ) }}
            <div class="card">
                <div class="h1">
                    <div class="card-header">{{ $data["order"]->getId() }}</div>
                </div>
                <div class="card-body">
                    <b>{{__('messages.order_date')}}: </b> {{ $data["order"]->getDate() }}<br/>
                    <b>{{__('messages.order_total')}}: </b> {{ $data["order"]->getTotal() }}$<br/>
                    <b>{{__('messages.order_shipping_date')}}: </b> {{ $data["order"]->getShippingDate() }}<br/>
                    <b>{{__('messages.order_state')}}: </b> {{ $data["order"]->getState() }}<br/>
                    <b>{{__('messages.order_payment_type')}}: </b> {{ $data["order"]->getPayment() }}<br/>
                    <b>{{__('messages.order_user')}}: </b> {{ $data["order"]->getUserId() }}<br/>
                </div>
                <div class="block">
                    <a href="{{ route('admin.order.delete', ['id' => $data["order"]->getid()])}}" type="submit" class="btn btn-danger"> {{__('messages.order_remove')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

