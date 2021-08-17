@if (count($errors) > 0)
    <div class="alert alert-danger">
        <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
  
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
