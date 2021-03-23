@extends('layouts.app')

@section('content') 
<div class="container">
    <div class="row gx-5">
      <div class="d-grid gap-2 d-md-block mx-auto text-uppercase mb-4" >
        <a href="{{route('product.menu')}}" class="btn btn-primary btn-lg" type="button">{{__('messages.product')}}</a>
        <a href="{{route('order.menu')}}" class="btn btn-primary btn-lg" type="button">{{__('messages.order')}}</a>
        <a href="{{route('category.menu')}}" class="btn btn-primary btn-lg" type="button">{{__('messages.category')}}</a>
        <a href="{{route('item.menu')}}" class="btn btn-primary btn-lg" type="button">{{__('messages.item')}}</a>
        <a href="{{route('customization.menu')}}" class="btn btn-primary btn-lg" type="button">{{__('messages.customization')}}</a>
      </div>
    </div>
</div>
@endsection