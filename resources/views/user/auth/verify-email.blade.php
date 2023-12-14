@extends('layouts.user.guest')
@section('content')

<img class="w-50 mx-auto pb-4" src="{{asset('user/images/logo-top-1.png')}}" alt="Logo">

    <div class="mb-4 text-sm text-center text-gray-600 dark:text-gray-400">
        {{ __('Please Varified Your Email') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-center text-sm text-green-600 dark:text-green-400">
            {{ __('verification link has been sent to the email') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <input type="submit" class="btn btn-submit" value="Send Varification Email" name="submit">
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <input type="submit" class="btn btn-submit" value="Logout" name="submit">
        </form>
    </div>
    @endsection
