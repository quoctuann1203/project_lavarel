@php
$formAction = $type == 'add' ? route('phones.store') : route('phones.update', ['phone' => $item->id]);
$formMethod = $type == 'add' ? 'post' : 'put';
@endphp

@extends('layouts.app1')
@section('content')
    <h3 style="margin: 20px 0">{{ Str::ucfirst($type) }} Form</h3>
    <!-- lấy thông tin thông báo đã thêm vào session để hiển thị -->
    <x-alert></x-alert>
    <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
    <x-show-error></x-show-error>
    <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($formMethod)
        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name"
                    value="{{ old('name') ?? $item->name }}">
            </div>
        </div>

        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="description">Price</label>
                <input type="text" name="price" class="form-control form-control-user" id="name" placeholder="Name"
                    value="{{ old('price') ?? $item->price }}">
            </div>
        </div>

        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="description">Provider</label>
                <select class="custom-select" name="provider_id" id="">
                    <option value="{{$item->proivder}}"></option>
                </select>
            </div>

            <div class="form-row" style="margin-bottom: 4px">
                <div class="form-group col-md-6" style="margin-bottom: 4px">
                    <label for="description">Inventory Qty</label>
                    <input type="text" name="inventory_quantity" class="form-control form-control-user" id="name"
                        placeholder="Name" value="{{ old('inventory_quantity') ?? $item->inventory_quantity }}">
                </div>
            </div>

            <div class="form-row" style="margin-bottom: 4px">
                <div class="form-group col-md-6" style="margin-bottom: 4px">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control form-control-user" id="name"
                        placeholder="Name" value="{{ old('description') ?? $item->description }}">
                </div>
            </div>
            <button type="button" class="btn btn-secondary" style="margin-top: 8px">
                <a style="text-decoration: none; color: #000000" href="{{ route('phones.index') }}">Back</a>
            </button>
            <input style="margin-top: 8px" type="submit" class="btn btn-primary"
                value="{{ $type == 'add' ? 'Create' : 'Update' }}" />
    </form>
@endsection

@section('js')
    <script>
        $('#avatar').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection('js')
