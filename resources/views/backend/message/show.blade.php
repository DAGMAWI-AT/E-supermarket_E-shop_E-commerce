@extends('backend.layouts.master')
@section('main-content')
<div class="card">
  <h5 class="card-header">Message</h5>
  <div class="card-body">
    @if ($message)
        @if ($message->photo)
        <img src="{{$message->photo}}" class="rounded-circle " style="margin-left:44%;">
        @else
        <img src="{{asset('backend/img/avatar.png')}}" class="rounded-circle " style="margin-left:44%;">
        @endif
        <div class="py-4">
           <h5><strong style="text-decoration:underline">From:</strong><br></h5>
           - Name : {{$message->name}}<br>
           - Email : {{$message->email}}<br>
           - Phone : {{$message->phone}}
        </div>
        <hr/>
        <h5 class="text-left"><strong style="text-decoration:underline">Subject:</strong> {{$message->subject}}</h5>
        <p class="py-5">{{$message->message}}</p>
    @endif

  </div>
</div>
@endsection
