@extends('layouts.app')
<!-- Author: Juan Camilo Echeverri -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Breadcrumbs::render("listcategory") }}
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
                        <div class="row justify-content-center">
                            <div  style="padding-right: 100px;">
                                <a href="{{route('admin.category.sort', ['sort' => "id"])}}" class="btn btn-primary" type="button"> {{__('messages.sort_id')}}  </a>
                            </div>
                            <div  style="padding-right: 100px;">
                                <a href="{{route('admin.category.sort', ['sort' => "name"])}}" class="btn btn-primary " type="button"> {{__('messages.sort_name')}}  </a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>              
@endsection
    
    
    
    