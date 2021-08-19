@php
$formAction = $type == 'add' ? route('providers.store') : route('providers.update', ['provider' => $item->id]);
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
            <button type="button" class="btn btn-secondary" style="margin-top: 8px">
                <a style="text-decoration: none; color: #000000" href="{{ route('providers.index') }}">Back</a>
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
