@extends('layouts.app')

@section('content')
<div class="conteiner">
    <div class="d-grid gap-2 col-6 mx-auto">
        @foreach ($data["routes"] as $route)
        <a href="{{route($route["route"])}}" class="btn btn-primary btn-lg text-uppercase mb-4" type="button" > {{$route["tittle"]}} </a> 
        @endforeach
    </div>
</div>
@endsection 