@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h1">
                    <div class="card-header">{{ $data["product"]->getName() }}</div>
                </div>
                <div class="card-body">
                    <b>{{__('messages.product_name')}}: </b> {{ $data["product"]->getName() }}<br/>
                    <b>{{__('messages.product_price')}}: </b> {{ $data["product"]->getPrice() }}<br/>
                    <b>{{__('messages.product_size')}}: </b> {{ $data["product"]->getSize() }}<br/>
                    <b>{{__('messages.product_stock')}}: </b> {{ $data["product"]->getStock() }}<br/>
                    <b>{{__('messages.product_image')}}: </b> {{ $data["product"]->getImage() }}<br/>
                    <b>{{__('messages.product_description')}}: </b> {{ $data["product"]->getDescription() }}$<br/>
                </div>
                <div class="block">
                    <a href="{{ route('admin.product.delete', ['id' => $data["product"]->getid()])}}" type="submit" class="btn btn-danger"> {{__('messages.product_remove')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

