@extends('layouts.app')
@section('content')

    <div class=" p-4 " style="min-height: 100vh">
        <h4 >User List</h4>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                
            </tr>
            @foreach($user as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@stop