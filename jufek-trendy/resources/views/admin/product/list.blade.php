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
                        @include('util.message')
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">{{__('messages.product_id')}}</th>
                                  <th scope="col">{{__('messages.product_name')}}</th>
                                  <th scope="col">{{__('messages.product_price')}}</th>
                                </tr>
                            </thead>
                            @foreach($data["products"] as $product)
                            <tr>
                                <th scope="row"> <a  href="{{ route('admin.product.show', ['id' => $product->getid()])}}" class="btn btn-primary " > {{ $product->getId() }} </b></a></th>
                                <td> {{ $product->getName() }}</td>             
                                <td> {{ $product->getPrice() }}</td>             
                            </tr>
                            @endforeach    
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <div style="padding-right: 50px;" >
                                <a href="{{route('admin.product.menu')}}" class="btn btn-secondary " type="button"> {{__('messages.go_back')}}  </a>
                            </div>
                            <div  style="padding-right: 30px;">
                                <a href="{{route('admin.product.sort', ['sort' => "id"])}}" class="btn btn-primary" type="button"> {{__('messages.sort_id')}}  </a>
                            </div>
                            <div  style="padding-right: 30px;">
                                <a href="{{route('admin.product.sort', ['sort' => "name"])}}" class="btn btn-primary " type="button"> {{__('messages.sort_name')}}  </a>
                            </div>
                            <div  style="padding-right: 50px;">
                                <a href="{{route('admin.product.sort', ['sort' => "price"])}}" class="btn btn-primary " type="button"> {{__('messages.sort_price')}}  </a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>              
@endsection