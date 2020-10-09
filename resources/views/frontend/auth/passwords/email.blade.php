@extends('layouts.app')

@section('content')

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 offset-md-3">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Reset Password</h3>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="account__form">

                            <div class="input__box">
                                
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="form__btn">
                                <button type="submit">Send Password Reset Link</button>
                                
                            </div>
                            <a class="forget_pass" href="{{ route('frontend.show_login_form') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- End My Account Area -->


@endsection
