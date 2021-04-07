@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h1">
                    <div class="card-header">{{ $data["category"]->getName() }}</div>
                </div>
                <div class="card-body">
                    <b>{{__('messages.category_name')}}: </b> {{ $data["category"]->getName() }}<br/>
                    <b>{{__('messages.category_description')}}: </b> {{ $data["category"]->getDescription() }}<br/>
                </div>
                <div class="block">
                    <a href="{{ route('admin.category.delete', ['id' => $data["category"]->getid()])}}" type="submit" class="btn btn-danger"> {{__('messages.category_remove')}}</a>
                </div>
                <div class='mx-auto' style="padding-right: 550px;"">
                    <a href="{{route('admin.category.list')}}" class="btn btn-secondary " type="button"> {{__('messages.go_back')}}  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
