@extends('layouts.master')

@section('content')
<!-- Author: Katherin Valencia -->
@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.currency')}}</div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td colspan="3" style="background-color: #62a9af; color:#000000"><strong>{{__('messages.value_dolar')}}</strong></td>
                            </tr>
                            <tr>
                                <th>{{__('messages.date')}}</th>
                                <th>{{__('messages.dolar')}}/th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $dolar['data']['validityTo'] }}</td>
                                <td>{{ $dolar['data']['value'] }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td colspan="3" style="background-color: #62a9af; color:#ffffff"><strong>{{__('messages.value_euro')}}</strong></td>
                            </tr>
                            <tr>
                                <th>{{__('messages.date')}}</th>
                                <th>{{__('messages.eur')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $euro['response']['date'] }}</td>
                                <td>{{ $euro['response']['rates']['COP'] }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td colspan="3" style="background-color: #62a9af; color:#ffffff"><strong>{{__('messages.value_mxn')}}</strong></td>
                            </tr>
                            <tr>
                                <th>{{__('messages.date')}}</th>
                                <th>{{__('messages.mxn')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $mxn['response']['date'] }}</td>
                                <td>{{ $mxn['response']['rates']['COP'] }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
<br><br>
<div class="container d-flex align-items-center flex-column">
    <img class="img-fluid" width="350" height="350" src="{{ asset('/img/logo/logoJufexTrendy.jpeg') }}" alt="" />
</div>
@endsection