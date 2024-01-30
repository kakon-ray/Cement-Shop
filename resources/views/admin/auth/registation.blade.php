@extends('layouts.admin.guest')
@section('title')
    {{ 'Admin Registration' }}
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Admin Login In Dashboard</div>
                    {{-- error and success message show start --}}
                    <div class="mt-2 text-center w-75 mx-auto">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger small">{{ $error }}</p>
                            @endforeach
                        @endif
                        @if (session()->has('error'))
                            <p class="alert alert-danger small">{{ session('error') }}</p>
                        @endif
                        @if (session()->has('success'))
                            <p class="alert alert-success small">{{ session('success') }}</p>
                        @endif
                    </div>

                    {{-- error and success message show end --}}
                    <div class="card-body px-5">
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="my-3">
                                <label for="" id="loginemail">Enter Your Name</label>
                                <input id="name" type="text" class="form-control" name="name" required
                                    autocomplete="Name" placeholder="Name">
                            </div>
                            <div class="my-3">
                                <label for="" id="loginemail">Enter Your Email</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                    autocomplete="email" placeholder="Email">
                            </div>


                            <div class="my-3">
                                <label for="" id="loginpassword">Enter Password</label>
                                <input id="admin_password_login" type="password" class="form-control" name="password"
                                    required autocomplete="new-password" placeholder="Password">
                
                            </div>

                            <div class="my-3">
                                <label for="" id="loginpassword">Enter Confirm Password</label>
                                <input id="admin_password_login" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                                <input type="checkbox" id="loginPassword" class="mt-4"><span class="ml-2">Show
                                    Password</span>
                            </div>



                            <button id="login" class="btn btn-info">
                                Registration
                            </button>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
