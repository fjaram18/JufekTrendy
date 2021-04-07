@extends('layouts.app')
<!-- Author: Juan Camilo Echeverri -->
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.create_order')}}</div>
                </h1>        
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" class="form-group" action="{{ route('admin.order.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.order_date')}}</label>
                            <input required type="date" class="form-control"  name="order_date" value="{{ old('order_date') }}" />
                        </div>                
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.order_total')}}</label>
                            <input required type="number" class="form-control" placeholder="100" name="total" value="{{ old('total') }}" min="0" max="999999.9999" step="any"/>
                        </div>                          
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.order_shipping_date')}}</label>
                            <input required type="date" class="form-control" name="shipping_date" value="{{ old('shipping_date') }}"/>
                        </div>                          
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.order_state')}}</label>
                            <input required type="text" class="form-control" placeholder="Delivered" name="order_state" value="{{ old('order_state') }}"/>
                        </div>                          
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.order_payment_type')}}</label>
                            <input required type="text" class="form-control" placeholder="PSE" name="payment_type" value="{{ old('payment_type') }}"/>
                        </div>                          
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.order_user')}}</label>
                            <select required class="form-control" name="user_id">
                                @foreach($data["users"] as $user)
                                    <option value="{{ $user->getId() }}">{{ $user->getName() }}</option>
                                @endforeach
                            </select>
                        </div>                          
                        <button type="submit" class="btn btn-primary my-1"> {{__('messages.send')}}  </button>
                        <div class="mx-auto" style="padding-right: 550px;">
                            <a href="{{route('admin.order.menu')}}" class="btn btn-secondary " type="button"> {{__('messages.go_back')}}  </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    
    
    
    