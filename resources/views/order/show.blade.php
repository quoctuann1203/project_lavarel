@extends('layouts.app1')
@section('content')
    <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
    <x-show-error></x-show-error>
    <div class="order_details" style="display: flex">
        <div class="user" style="width: 50%">
            <h3 class="names-user" style="margin: 20px 0">Account User</h3>
            <p class="id-user"> User Id : {{ $order->user->id }} </p>
            <p class="name-user">User Name : {{ $order->user->name }}</p>
            <p class="email-user"> Mail : {{ $order->user->email }} </p>
            <p class="name-user1"> Full Name : {{ $order->user->profile->full_name }}</p>
            <p class="Address-user"> Address : {{ $order->user->profile->address }} </p>
            <p class="birthday-user"> birthday : {{ $order->user->profile->birthday }} </p>
            <p class="gender-user"> gender : {{ $order->user->profile->gender }} </p>
        </div>
        <div class="order">
            <h3 style="margin: 20px 0">Order Details</h3>
            <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="post">
                @csrf
                @method('put')
                <p class="order_status"> Status </p>
                <div class="d-flex">
                    {!! MyHelper::getSelect('status', MyHelper::getConfig()['order']['status'], $order->status) !!}
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->phones as $index => $phone)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $phone->name }}</td>
                                <td>{{ MyHelper::priceFormat($phone->pivot->price ) }}</td>
                                <td>{{ $phone->pivot->quantity }}</td>
                                <td>{{ MyHelper::priceFormat($phone->pivot->price * $phone->pivot->quantity) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"></td>
                            @php
                                $total = array_reduce(
                                    json_decode(json_encode($order->phones), true),
                                    function ($prev, $phone) {
                                        return $prev + $phone['pivot']['price'] * $phone['pivot']['quantity'];
                                    },
                                    0,
                                );
                            @endphp
                            <td>Total: {{ MyHelper::priceFormat($total) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-secondary">
                <a style="text-decoration: none; color: black" href="{{ route('orders.index') }}">Back</a>
            </button>
        </div>
    </div>

@endsection
