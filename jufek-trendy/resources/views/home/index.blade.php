@extends('layouts.app')

@section('content') 
    <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid" width="350" height="350" src="{{ asset('/img/logo/logoJufexTrendy.jpeg') }}" alt="" />
    </div>

    <div class="container pb-5">
            <div class="row justify-content-start"> 
                <div class="col-sm-12 mt-5 mb-5"><h1 class="text-center"><{{__('messages.top')}}</h1></div>

                @foreach ($dataTop as $t)
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <p>$. {{$t->name}}</p>
                        </div>
                        <div class="card-body">
                            <p>$. {{$t->price}}</p>
                        </div>
                        <div class="card-body">
                            <p>$. {{$t->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
