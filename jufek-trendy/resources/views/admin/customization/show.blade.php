@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h1">
                    <div class="card-header">{{ $data["customization"]->getName() }}</div>
                </div>
                <div class="card-body">
                    <b>{{__('messages.customization_name')}}: </b> {{ $data["customization"]->getName() }}<br/>
                    <b>{{__('messages.customization_size')}}: </b> {{ $data["customization"]->getSize() }}<br/>
                    <b>{{__('messages.customization_location')}}: </b> {{ $data["customization"]->getLocation() }}<br/>
                    <b>{{__('messages.customization_price')}}: </b> {{ $data["customization"]->getPrice() }}<br/>
                    <b>{{__('messages.customization_image')}}: </b> {{ $data["customization"]->getImage() }}<br/>
                </div>
                <div class="block">
                    <a href="{{ route('admin.customization.delete', ['id' => $data["customization"]->getid()])}}" type="submit" class="btn btn-danger"> {{__('messages.customization_remove')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection