@extends('layouts.user.master')
@section('content')
    <style>
        .error-input {
            list-style-type: none;
            color: red;
            padding-left: 0px;
        }
    </style>
    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class="main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item ">
                                <form class="form-stl" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <fieldset class="wrap-titles">
                                        <h3 class="form-title">Create an account</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Name*</label>
                                        <input type="text" id="frm-reg-lname" name="name" placeholder="Last name*">
                                        <x-input-error :messages="$errors->get('name')" class="error-input" />
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email Address*</label>
                                        <input type="email" id="frm-reg-email" name="email" placeholder="Email address">
                                        <x-input-error :messages="$errors->get('email')" class="error-input" />
                                    </fieldset>

                                    <fieldset class="wrap-input item-width-in-half left-item ">
                                        <label for="frm-reg-pass">Password *</label>
                                        <input type="password" id="frm-reg-pass" name="password" placeholder="Password">
                                        <x-input-error :messages="$errors->get('password')" class="error-input" />
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="frm-reg-cfpass">Confirm Password *</label>
                                        <input type="password" id="frm-reg-cfpass" name="password_confirmation"
                                            placeholder="Confirm Password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="error-input" />
                                    </fieldset>
                                    <input type="submit" class="btn btn-sign" value="Register" name="register">

                                    <p class="padding-top-bottom">অ্যাকাউন্ট নেই? <a title="Register or Login" href="{{ route('login')}}">লগিন করুন</a></p>
                                </form>
                            </div>
                            
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>
    <!--main area-->
@endsection
