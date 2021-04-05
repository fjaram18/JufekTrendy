@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.create_product')}}</div>
                </h1>        
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" class="form-group" action="{{ route('admin.product.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_name')}}</label>
                            <input required type="text" class="form-control" placeholder="Tshirt LSD" name="name" value="{{ old('name') }}" />
                        </div>                
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_size')}}</label>
                            <select required class="form-control" name="size" >
                                <option value="XL">XL</option>
                                <option value="L">L</option>  
                                <option value="M">M</option>  
                                <option value="S">S</option>  
                                <option value="XS">XS</option>  
                            </select>
                        </div>    
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_stock')}}</label>
                            <input required type="number" class="form-control" placeholder="5" name="stock" value="{{ old('stock') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_price')}}</label>
                            <input required type="number" class="form-control" placeholder="100" name="price" value="{{ old('price') }}" min="0" max="999999.9999" step="any"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_image')}}</label>
                            <input required type="file" class="form-control"  name="image"  value="{{ old('image') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_description')}}</label>
                            <input required type="text" class="form-control" placeholder="Beautiful Tshirt" name="description" value="{{ old('description') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.product_category')}}</label>
                            <select required class="form-control" name="category_id">
                                @foreach($data["categories"] as $category)
                                    <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
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


    
    
    