@extends('layouts.app')
<!-- Author: Juan Camilo Echeverri -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Breadcrumbs::render('showcategory', $data["category"] ) }}
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
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
