
@extends('layouts.app1')
@section('content')
    <div class="profile-user">
        <h3 class="names-user" style="margin: 20px 0">Account User</h3>
        <p class="name-user">User Name : {{$user -> name}}</p>
        <p class="email-user"> Mail : {{$user -> email}} </p>
        <p class="id-user"> Id : {{$user -> id}} </p>
        @if ($profile == null)
            <a class="btn btn-dark" href="{{ route("create-profile", ['id'=>$user->id])}}">Create profile</a>
        @else
            <h3 class="names-user" style="margin: 20px 0">Profile User</h3>
            <p class="name-user1"> Full Name : {{$profile -> full_name}}</p>
            <p class="Address-user"> Address : {{$profile -> address}} </p>
            <p class="birthday-user"> birthday : {{$profile -> birthday}} </p>
            <p class="gender-user"> gender : {{$profile -> gender}} </p>
            <p class="avatar-user"> avatar : {{$profile -> avatar}} </p>

            <button type="button" class="btn btn-secondary">
                <a style="text-decoration: none; color: black" href="/users">Back</a>
            </button>
            <button type="button" class="btn btn-secondary">
                <a style="text-decoration: none; color: black" href="/profiles/{{$profile->id}}/edit">Edit</a>
            </button>
        @endif
    </div>
@endsection

