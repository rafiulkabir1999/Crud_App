@extends('layouts.dashboard')
@section('content')
 
    <div class="">
        <div class="bg-secondary p-2  text-white">Provide Showrooms Information</div>
        <form class=" p-5 border shadow rounded-b-3" action="{{route('showrooms.update',$showroom->id)}}" method='POST'>
            @csrf
            @method('put')
            <div class="pt-3">
                <label for="" class="form-label">ShowroomName</label>
                <input type="text" class="form-control" name='showroomname' value={{old('showroomname',$showroom->ShowroomName)}}>
            </div>
            <div class="pt-3">
                <label for="" class="form-label">ShowroomAddress</label>
                <input type="text" class="form-control" name='showroomaddress' value={{old('showroomaddress',$showroom->ShowroomAddress)}}>
            </div>
            <div class="pt-3">
                <label for="" class="form-label">PhoneNumber</label>
                <input type="number" class="form-control" name='phonenumber' value={{old('phonenumber',$showroom->PhoneNumber)}}>
            </div>
            <div class="pt-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name='email' value={{old('email',$showroom->Email)}}>
            </div>
            <div class="pt-3">
                <label for="" class="form-label">Remarks</label>
                <input type="text" class="form-control" name='remarks' value={{old('remarks',$showroom->Remarks)}}>
            </div>
            <div class="pt-3">
                <label for="" class="form-label">MapAddress</label>
                <input type="text" class="form-control" name='mapaddress' value={{old('mapaddress',$showroom->MapAddress)}}>
            </div>
            <div class="pt-3">
                <label for="" class="form-label">Area</label>
                <input type="text" class="form-control" name='area' value={{old('area',$showroom->Area)}}>
            </div>
            
            <div class="pt-4 d-flex justify-content-end">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
     </div>

@endsection