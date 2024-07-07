@extends('layouts.dashboard')
@section('content')
 <div class="">
    <div class="bg-dark p-2  text-white">Provide Showrooms Information</div>
    <form class=" p-5 border shadow rounded-b-3" action="{{route('showrooms.store')}}" method='POST'>
        @csrf
        <div class="pt-3">
            <label for="" class="form-label">ShowroomName</label>
            <input type="text" class="form-control" name='ShowroomName'>
            @error('ShowroomName')
            @if ($message == 'validation.min.string')
                <span class="text-danger text-xs">Showroom name must be at least 3 characters.</span>
            @elseif ($message == 'validation.max.string')
                <span class="text-danger text-xs">Showroom name may not be greater than 50 characters.</span>
            @else
                <span class="text-danger text-xs">{{ $message }}</span>
            @endif
            @enderror
        </div>
        <div class="pt-3">
            <label for="" class="form-label">ShowroomAddress</label>
            <input type="text" class="form-control" name='ShowroomAddress'>
            @error('ShowroomAddress')
            @if ($message == 'validation.min.string')
                <span class="text-danger text-xs">Showroom name must be at least 3 characters.</span>
            @elseif ($message == 'validation.max.string')
                <span class="text-danger text-xs">Showroom name may not be greater than 50 characters.</span>
            @else
                <span class="text-danger text-xs">{{ $message }}</span>
            @endif
            @enderror
        </div>
        <div class="pt-3">
            <label for="" class="form-label">PhoneNumber</label>
            <input type="number" class="form-control" name='PhoneNumber'>
            @error('PhoneNumber')
            @if ($message == 'validation.min.string')
                <span class="text-danger text-xs">Showroom name must be at least 3 characters.</span>
            @elseif ($message == 'validation.max.string')
                <span class="text-danger text-xs">Showroom name may not be greater than 50 characters.</span>
            @else
                <span class="text-danger text-xs">{{ $message }}</span>
            @endif
            @enderror
        </div>
        <div class="pt-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name='Email'>
            @error('Email')
            @if ($message == 'validation.min.string')
                <span class="text-danger text-xs">Showroom name must be at least 3 characters.</span>
            @elseif ($message == 'validation.max.string')
                <span class="text-danger text-xs">Showroom name may not be greater than 50 characters.</span>
            @else
                <span class="text-danger text-xs">{{ $message }}</span>
            @endif
            @enderror
        </div>
        <div class="pt-3">
            <label for="" class="form-label">Remarks</label>
            <input type="text" class="form-control" name='Remarks'>
        </div>
        <div class="pt-3">
            <label for="" class="form-label">MapAddress</label>
            <input type="text" class="form-control" name='MapAddress'>
            @error('MapAddress')
            @if ($message == 'validation.min.string')
                <span class="text-danger text-xs">Showroom name must be at least 3 characters.</span>
            @elseif ($message == 'validation.max.string')
                <span class="text-danger text-xs">Showroom name may not be greater than 50 characters.</span>
            @else
                <span class="text-danger text-xs">{{ $message }}</span>
            @endif
            @enderror
        </div>
        <div class="pt-3">
            <label for="" class="form-label">Area</label>
            <input type="text" class="form-control" name='Area'>
            @error('Area')
            @if ($message == 'validation.min.string')
                <span class="text-danger text-xs">Showroom name must be at least 3 characters.</span>
            @elseif ($message == 'validation.max.string')
                <span class="text-danger text-xs">Showroom name may not be greater than 50 characters.</span>
            @else
                <span class="text-danger text-xs">{{ $message }}</span>
            @endif
            @enderror
        </div>
        
        <div class="pt-4 d-flex justify-content-end">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
 </div>
@endsection