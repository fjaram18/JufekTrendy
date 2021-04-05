@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.create_customization')}}</div>
                </h1>        
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" class="form-group" action="{{ route('admin.customization.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.customization_name')}}</label>
                            <input required type="text" class="form-control" placeholder="Dragon" name="name" value="{{ old('name') }}" />
                        </div>                                        
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.customization_size')}}</label>
                            <input required type="number" class="form-control" placeholder="30" name="size" value="{{ old('size') }}" />
                        </div>                                        
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.customization_location')}}</label>
                            <input required type="text" class="form-control" placeholder="Up-Right" name="location" value="{{ old('location') }}" />
                        </div>                                        
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.customization_price')}}</label>
                            <input required type="number" class="form-control" placeholder="100" name="price" value="{{ old('price') }}" min="0" max="999999.9999" step="any" />
                        </div> 
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.customization_product')}}</label>
                            <select required class="form-control" name="product_id">
                                @foreach($data["products"] as $product)
                                    <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
                                @endforeach
                            </select>
                        </div>                                       
                        <button type="submit" class="btn btn-primary my-1"> {{__('messages.send')}}  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection