@extends('frontend.layouts.master')

@section('title','E-SHOP || Login Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ GoogleTranslate::trans('Home',app()->getLocale()) }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ GoogleTranslate::trans('Login',app()->getLocale()) }}</a></li>
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
                        <h2>{{ GoogleTranslate::trans('Login',app()->getLocale()) }}</h2>
                        <p>{{ GoogleTranslate::trans('Please register in order to checkout more quickly',app()->getLocale()) }}</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ GoogleTranslate::trans('Your Email',app()->getLocale()) }}<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ GoogleTranslate::trans('Your Password',app()->getLocale()) }}<span>*</span></label>
                                        <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ GoogleTranslate::trans('Google reCaptcha',app()->getLocale()) }}<span>*</span></label>
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                 @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">{{ GoogleTranslate::trans('Login',app()->getLocale()) }}</button><br>
                                        <a href="{{route('register.form')}}" class="">{{ GoogleTranslate::trans('Register',app()->getLocale()) }}</a>
                                        
                                       

                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">{{ GoogleTranslate::trans('Remember Me',app()->getLocale()) }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="lost-pass" href="{{ route('password.request') }}">
                                        {{ GoogleTranslate::trans('Lost your password?',app()->getLocale()) }}
                                        </a>
                                    @endif
                           
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
@push('styles')
<style>
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    /* .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    } */
    .shop.login .form .lost-pass {
        color: #4e73df;
    }
</style>
@endpush
