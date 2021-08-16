@extends('layouts.app1')
@section('content')

    <h3 style="margin: 20px 0"> Create Profile User</h3>
    <form class="user" action="{{ route('profiles.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">User Name</label>
                <input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name" value="{{$profile->full_name}}">
            </div>
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">Address</label>
                <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address" value="{{$profile->address}}">
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">Avatar</label>
                <input type="text" name="avatar" class="form-control form-control-user" id="avatar" placeholder="Avatar" value="{{$profile->avatar}}">
            </div>
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">Gender</label>
                <input type="text" name="gender" class="form-control form-control-user" id="gender" placeholder="Gender" value="{{$profile->gender}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputCity">Birthday</label>
                <input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday" value="{{$profile->birthday}}">
            </div>
        </div>
        <button type="button" class="btn btn-secondary" style="margin-top: 8px">
            <a style="text-decoration: none; color: #000000" href="/users">Back</a>
        </button>
        <input style="margin-top: 8px" type="submit" class="btn btn-primary" value="Create">
    </form>
@endsection
