@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.list_products')}}</div>
                </h1>  
                <div class="col-11" >
                    <ul id="errors">
                        <div class="list-group" > 
                            @include('util.message')
                            @foreach($data["products"] as $product)
                            <a  href="{{ route('admin.product.show', ['id' => $product->getid()])}}" class="list-group-item list-group-item-action list-group-item-dark" > <b>{{ $product->getId() }} - {{ $product->getName() }} </b></a>
                            @endforeach    
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>              
@endsection