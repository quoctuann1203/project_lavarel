@extends('layouts.app1')
@section('content')
    <h1>Danh sach User</h1>
    <ul>
        @foreach($users as $user)
            <li>{{$user->name}}
            </li>
        @endforeach
    </ul>
@endsection
