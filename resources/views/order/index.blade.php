@extends('layouts.app1')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 style="margin: 20px 0"> Danh Sach Provider</h4>
        <a href="{{ route('providers.create') }}" class="btn btn-dark">Add</a>
    </div>

    <table class="table">
        <thead style="background-color: #0dcaf0">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Shipping Method</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Status</th>
                <th scope="col">Create</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody style="background-color: #cccccc">
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $item -> id}}</td>
                    <td>{{ $item -> shipping_method }}</td>
                    <td>{{ $item -> payment_method }}</td>
                    <td>{{ $item -> status }}</td>
                    <td>{{ $item -> created_at }}</td>
                    <td>
                        <a style="text-decoration: none"
                            href="{{ Route('orders.show', ['order' =>$item->id]) }}">Show</a>
                        <form style="display: inline-block" action="{{ route('orders.destroy', ['order' => $item->id]) }}"
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
