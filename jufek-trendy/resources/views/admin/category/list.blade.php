@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>
                    <div class="card-header">{{__('messages.list_categories')}}</div>
                </h1>  
                <div class="col-11" >
                    <ul id="errors">
                        @include('util.message')
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">{{__('messages.category_id')}}</th>
                                  <th scope="col">{{__('messages.category_name')}}</th>
                                </tr>
                            </thead>
                            @foreach($data["categories"] as $category)
                            <tr>
                                <th scope="row"> <a  href="{{ route('admin.category.show', ['id' => $category->getid()])}}" class="btn btn-primary " > {{ $category->getId() }} </b></a></th>
                                <td> {{ $category->getName() }}</td>             
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
    
    
    
    