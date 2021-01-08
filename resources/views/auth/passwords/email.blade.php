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
                                <li class="active"><a href="{{ route('password.request') }}">Reset Password</a></li>
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
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <div class="login-form">
                            <h2>{{ __('Reset Password') }}</h2>
                            <p>{{ __('Please a valid email for password reset instructions') }}</p>
                            <!-- Form -->
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (count($errors))
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <form class="form" method="POST" action="{{ route('password.email') }}">
                            @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('Your Email') }}<span>*</span></label>
                                            <input type="text" name="email" placeholder="" required="required">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group login-btn">
                                            <button type="submit" class="btn">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
