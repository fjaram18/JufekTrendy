@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.list_customizations')}}</div>
                </h1>  
                <div class="col-11" >
                    <ul id="errors">
                        @include('util.message')
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">{{__('messages.customization_id')}}</th>
                                  <th scope="col">{{__('messages.customization_name')}}</th>
                                  <th scope="col">{{__('messages.customization_price')}}</th>
                                </tr>
                            </thead>
                            @foreach($data["customizations"] as $customization)
                            <tr>
                                <th scope="row"> <a  href="{{ route('admin.customization.show', ['id' => $customization->getid()])}}" class="btn btn-primary " > {{ $customization->getId() }} </b></a></th>
                                <td> {{ $customization->getName() }}</td>             
                                <td> {{ $customization->getPrice() }}</td>             
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