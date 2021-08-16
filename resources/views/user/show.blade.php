@extends('layouts.app1')
@section('content')
    <div class="profile-user" >
        <h3 class="title" style="margin: 20px 0">Thong tin User</h3>
        <p class="id-name"> Name: {{$user -> name}} </p>
        <p class="id-user"> Id : {{$user -> id}} </p>
        <p class="email-user"> Mail : {{$user -> email}} </p>
        <p>Day Create Account : {{$user -> created_at}}</p>
    </div>
    <button type="button" class="btn btn-secondary">
        <a style="text-decoration: none; color: black" href="{{asset('users')}}">Back</a>
    </button>
@endsection

