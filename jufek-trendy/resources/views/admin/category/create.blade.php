@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.create_category')}}</div>
                </h1>        
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" class="form-group" action="{{ route('admin.category.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.category_name')}}</label>
                            <input required type="text" class="form-control" placeholder="Tshirts" name="name" value="{{ old('name') }}" />
                        </div>                
                        <div class="mb-3">
                            <label class="form-label" >{{__('messages.category_description')}}</label>
                            <input required type="text" class="form-control" placeholder="Article of clothing" name="description" value="{{ old('description') }}"/>
                        </div>                          
                        <button type="submit" class="btn btn-primary my-1"> {{__('messages.send')}}  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    
    
    
    