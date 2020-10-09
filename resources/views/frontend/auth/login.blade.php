@extends('layouts.app')

@section('content')

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 offset-md-3">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Login</h3>
                    <form action="{{ route('frontend.login') }}" method="POST">
                        @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label>Username <span>*</span></label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input__box">
                                <label>Password<span>*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form__btn">
                                <button type="submit">Login</button>
                                <label class="label-for-checkbox">
                                    <input id="rememberme" class="input-checkbox" name="remember" value="forever" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="{{ route('password.request') }}">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- End My Account Area -->


@endsection
