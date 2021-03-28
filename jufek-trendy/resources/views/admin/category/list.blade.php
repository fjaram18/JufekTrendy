@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.list_categories')}}</div>
                </h1>  
                <div class="col-11" >
                    <ul id="errors">
                        <div class="list-group" > 
                            @include('util.message')
                            @foreach($data["categories"] as $category)
                            <a  href="{{ route('admin.category.show', ['id' => $category->getid()])}}" class="list-group-item list-group-item-action list-group-item-dark" > <b>{{ $category->getId() }} - {{ $category->getName() }} </b></a>
                            @endforeach    
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>              
@endsection
    
    
    
    