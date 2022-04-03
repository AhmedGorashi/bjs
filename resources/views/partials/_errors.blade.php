@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i> خطأ</h4>
        <h4>{{ session('error') }}</h4>
    </div>
@endif
