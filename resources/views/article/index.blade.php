@extends('layouts.app1')
@section('content')
    <h4 style="margin: 20px 0"> Danh Sach Don Hang</h4>
    <table class="table">
        <thead style="background-color: #0dcaf0">
        <tr>
{{--            <th scope="col">#</th>--}}
            <th scope="col">User ID</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>

        </tr>
        </thead>
        <tbody style="background-color: #cccccc">
        @foreach($articles as $article)
            <tr>
                <td>{{$article-> user_id}}</td>
{{--                <td><a style="text-decoration: none" href="/users/{{$user->id}}">{{$user->name}}</a></td>--}}
                <td>{{$article -> title}}</td>
                <td>{{$article -> body}}</td>
{{--                <td>--}}
{{--                    <a style="text-decoration: none" href="/profiles/{{$user-> id}}">profile</a>--}}
{{--                    <form style="display: inline-block" action="{{route("users.destroy", ["user" => $user-> id])}}" method="POST">--}}
{{--                        {{@method_field("DELETE")}}--}}
{{--                        {{@csrf_field()}}--}}
{{--                        <button type="submit">Delete</button>--}}
{{--                    </form>--}}
{{--                </td>--}}

            </tr>
        @endforeach
        </tbody>
    </table>

{{--    <ul>--}}
{{--        @foreach($articles as $article)--}}
{{--            <h3>{{$article -> title}}</h3>--}}
{{--            @foreach($article -> tags as $tag)--}}
{{--                <li>{{$tag -> name}} ---------{{$tag -> pivot -> quantity}}</li>--}}
{{--            @endforeach--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection
