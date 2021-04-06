@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.list_orders')}}</div>
                </h1>  
                <div class="col-11" >
                    <ul id="errors">
                        @include('util.message')
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">{{__('messages.order_id')}}</th>
                                  <th scope="col">{{__('messages.order_date')}}</th>
                                  <th scope="col">{{__('messages.order_total')}}</th>
                                  <th scope="col">{{__('messages.order_user')}}</th>
                                </tr>
                            </thead>
                            @foreach($data["orders"] as $order)
                            <tr>
                                <th scope="row"> <a  href="{{ route('admin.order.show', ['id' => $order->getid()])}}" class="btn btn-primary " > {{ $order->getId() }} </a></th>
                                <td> {{ $order->getDate() }}</td>
                                <td>{{ $order->getTotal() }}</td>
                                <td>{{ $order->getUserId() }}</td>
                            </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>              
@endsection