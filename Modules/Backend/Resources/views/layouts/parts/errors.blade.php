@if ($errors->any())
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session('status'))
    <div class="col-xs-12">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
@endif
@if (session('danger'))
    <div class="col-xs-12">
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    </div>
@endif

@if (session('success'))
    <div class="col-xs-12">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif