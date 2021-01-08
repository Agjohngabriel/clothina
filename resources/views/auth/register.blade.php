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
                                <li class="active"><a href="{{route('register')}}">Register</a></li>
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
                            <h2>{{ __('Register') }}</h2>
                            <p>{{ __('Please register in order to checkout more quickly') }}</p>
                            @if (count($errors))
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <!-- Form -->
                            <form class="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('Your Name') }}<span>*</span></label>
                                            <input type="text" name="name" placeholder="" required="required">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                        <div class="form-group">
                                            <label>{{ __('Your Password') }}<span>*</span></label>
                                            <input type="password" name="password" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('Confirm Password') }}<span>*</span></label>
                                            <input type="password" name="password_confirmation" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group login-btn">
                                            <button class="btn" type="submit">{{ __('Register') }}</button>
                                            <a href="{{route('login')}}" class="btn">{{ __('Login') }}</a>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Sign Up for Newsletter</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Login -->
@endsection
