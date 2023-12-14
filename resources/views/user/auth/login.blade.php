@extends('layouts.user.master')
@section('content')
    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="login-form form-item form-stl">
                                <form method="POST" action="{{ route('login') }}" id="login_alert">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Log in to your account</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-uname">Email Address:</label>
                                        <input type="email" id="frm-login-uname" type="password"
                                        name="email"
                                        required autocomplete="email">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-pass">Password:</label>
                                        <input type="password" id="frm-login-pass" name="password"
                                            placeholder="************">
                                    </fieldset>

                                    <fieldset class="wrap-input">
                                        <label class="remember-field">
                                            <input class="frm-input " name="rememberme" id="rememberme" value="forever"
                                                type="checkbox"><span>Remember me</span>
                                        </label>
                                        <a class="link-function left-position" href="#"
                                            title="Forgotten password?">Forgotten password?</a>
                                    </fieldset>
                                    <input type="submit" class="btn btn-submit" value="Login" name="submit">
                                </form>
                               <div class="text-center">
                                <p class="padding-top-bottom">অ্যাকাউন্ট নেই? <a title="Register or Login" href="{{ route('register')}}">রেজিস্ট্রেশন করুন</a></p>
                               </div>
                            </div>
                           
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>
    <!--main area-->
@endsection
