@extends('/layout')

@section('content')
<div class="customer_login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="account_form">
                    <h2>Register</h2>
                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group row">
                            <p>
                                <label>Name <span>*</span></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                        </div>

                        <div class="form-group row">
                            <p>
                                <label>E-Mail Address <span>*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                        </div>

                        <div class="form-group row">
                            <p>
                                <label>Password <span>*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                        </div>

                        <div class="form-group row">
                            <p>
                                <label>Password <span>*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="login_submit">
                                <a type="button" href="/login">Have an Account?</a>
                                <button type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection