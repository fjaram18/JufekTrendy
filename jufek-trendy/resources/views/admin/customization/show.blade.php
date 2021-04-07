@extends('layouts.app')
<!-- Author: Juan Camilo Echeverri -->
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
                <div class='mx-auto' style="padding-right: 550px;"">
                    <a href="{{route('admin.customization.list')}}" class="btn btn-secondary " type="button"> {{__('messages.go_back')}}  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection