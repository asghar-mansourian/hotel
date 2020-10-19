
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <ol>{{ $error }}</ol>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
                <ol>{{ session()->get('error') }}</ol>
        </ul>
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        <ul>
            <ol>{{ session()->get('success')}}</ol>
        </ul>
    </div>

@endif

