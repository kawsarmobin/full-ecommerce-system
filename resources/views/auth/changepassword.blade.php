@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" value="{{ $old_password ?? old('old_password') }}" required autofocus>

                                @if ($errors->has('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy8uc6tSi0eQ_4J8NdxeLfEjlVpu7lDq3t-Q6L03cSRG-k-cPJ-Q&s"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('password.change') }}">Password change</a></li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item"><a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger btn-block">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
