@extends('layouts.app1')
@section('content')
    <h4 style="margin: 20px 0"> Danh Sach User</h4>
    <table class="table">
        <thead style="background-color: #0dcaf0">
        <tr>
            <th scope="col">#</th>
            <th scope="col">UserName</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody style="background-color: #cccccc">
                @foreach($users as $user)
                    <tr>
                        <td>{{$user-> id}}</td>
                        <td><a style="text-decoration: none" href="/users/{{$user->id}}">{{$user->name}}</a></td>
                        <td>{{$user -> email}}</td>
                        <td>
                            <a style="text-decoration: none" href="/profiles/{{$user-> id}}">profile</a>
                            <form style="display: inline-block" action="{{route("users.destroy", ["user" => $user-> id])}}" method="POST">
                                {{@method_field("DELETE")}}
                                {{@csrf_field()}}
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $users->withQueryString()->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
