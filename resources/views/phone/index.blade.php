@extends('layouts.app1')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 style="margin: 20px 0"> Danh Sach Phone</h4>
        <a href="{{ route('phones.create') }}" class="btn btn-dark">Add</a>
    </div>

    <table class="table">
        <thead style="background-color: #0dcaf0">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Provider</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody style="background-color: #cccccc">
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->provider->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a style="text-decoration: none"
                            href="{{ Route('phones.edit', ['phone' => $item->id]) }}">Edit</a>
                        <form style="display: inline-block" action="{{ route('phones.destroy', ['phone' => $item->id]) }}"
                            method="POST">
                            {{ @method_field('DELETE') }}
                            {{ @csrf_field() }}
                            <button type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $items->withQueryString()->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection
