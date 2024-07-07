@extends('layouts.app')
@section('content')
<div class="" style="min-height:95vh">
 <div class="p-5">
     <div class="d-flex  gap-4">
      <img style='width:150px;height:150px' class="" src="./image/profile_icon/profile_1.png" alt="">
      <div class="mt-auto mb-2">
          <p class="fs-2 m-0">{{$user->name}} </p>
          <p class="text-xs m-0">{{$user->email}} </p>
          <p class="text-xs m-0">{{$user->created_at}} </p>
         <button class="btn-sm btn-warning">Edit</button>
         
      </div>
     </div>
 </div>
</div>
@stop