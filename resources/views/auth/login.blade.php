@extends('layouts.main')

@section('content')
<!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{route('landingPage')}}">Home<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{route('register')}}">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
                
        <!-- Shop Login -->
        <section class="shop login section">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-7 col-12">
                        <div class="login-form">
                            <h2>{{ __('Login') }}</h2>
                            <p>{{ __('Please Login in order to checkout more quickly') }}</p>
                            @if (count($errors))
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <!-- Form -->
                            <form class="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('Your Email') }}<span>*</span></label>
                                            <input type="text" name="email" class="@error('email') is-invalid @enderror" placeholder="" required="required">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('Your Password') }}<span>*</span></label>
                                            <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="" required="required">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <label class="checkbox-inline" for="remember"><input name="remember" id="remember" type="checkbox">{{ __('Remember Me') }}</label>
                                        </div>
                                        <div class="form-group login-btn">
                                            <button class="btn" type="submit">{{ __('Login') }}</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        @if (Route::has('password.request'))
                                            <a  href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <a href="{{route('register')}}" class="btn">{{ __('Register') }}</a>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <a href="{{route('guestCheckout.index')}}" class="btn">{{ __('Checkout as Guest') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Login -->
@endsection
