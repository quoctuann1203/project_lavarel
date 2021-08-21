@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
        <li>{{ $message }} </li>
        @if ($message = Session::get('file'))
            <li>{{ $message }} </li>
        @endif
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
        <li>{{ $message }} </li>
        @if ($message = Session::get('file'))
            <li>{{ $message }} </li>
        @endif
    </div>
@endif
