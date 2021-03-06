@extends('layouts.app1')
@section('content')
    <h3 style="margin: 20px 0"> Edit User</h3>
    <!-- lấy thông tin thông báo đã thêm vào session để hiển thị -->
    <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
    <x-show-error></x-show-error>
    <form class="user" action="{{ route('profiles.update', ['profile' => $profile->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">User Name</label>
                <input type="text" name="full_name" class="form-control form-control-user" id="full_name"
                    placeholder="Full Name" value="{{ $profile->full_name }}">
            </div>
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">Address</label>
                <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address"
                    value="{{ $profile->address }}">
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 4px">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputEmail4">Gender</label>
                <input type="text" name="gender" class="form-control form-control-user" id="gender" placeholder="Gender"
                    value="{{ $profile->gender }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6" style="margin-bottom: 4px">
                <label for="inputCity">Birthday</label>
                <input type="date" class="form-control form-control-user" name="birthday" id="birthday"
                    placeholder="Birthday" value="{{ $profile->birthday }}">
            </div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input " id="avatar" name="avatar">
            <label for="avatar" class="custom-file-label">{{ $profile->avatar }}</label>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6" style="margin: 4px 0">
                <img src="{{ $profile->avatar }}" alt="" width="300px" height="300px">
            </div>
        </div>
        <button type="button" class="btn btn-secondary" style="margin-top: 8px">
            <a style="text-decoration: none; color: #000000" href="{{ url() -> previous() }}">Back</a>
        </button>
        <input style="margin-top: 8px" type="submit" class="btn btn-primary" value="Update">
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
