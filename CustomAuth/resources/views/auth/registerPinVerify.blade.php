@extends('layouts.app')

@section('content')
<!-- Advanced login -->
<form method="POST" action="{{ route('registerVerifyAction') }}">
    @csrf
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group">Verify your account<small class="display-block">Your credentials</small></h5>
        </div>


        <div class="form-group has-feedback has-feedback-left">
            <input id="pin" type="pin" class="form-control @error('pin') is-invalid @enderror" name="pin" value="{{ old('pin') }}" required autocomplete="pin" autofocus>

            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
            @error('pin')
                <strong style="color:red;">{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn bg-blue btn-block">Submit <i
                    class="icon-arrow-right14 position-right"></i></button>

        </div>

    </div>
</form>
<!-- /advanced login -->
@endsection

