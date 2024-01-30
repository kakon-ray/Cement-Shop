@extends('layouts.admin.guest')
@section('title')
    {{ 'Admin Password' }}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Please Reset Your Email</div>
                    {{-- error and success message show start --}}
                    <div class="mt-2 text-center w-75 mx-auto">
                        @if (session()->has('error'))
                            <p class="alert alert-danger small">{{ session('error') }}</p>
                        @endif

                        @if (session()->has('success'))
                            <p class="alert alert-success small text-center">{{ session('success') }}</p>
                        @endif
                    </div>

                    {{-- error and success message show end --}}
                    <div class="card-body px-5">
                        <form method="POST" action="{{ route('admin.password.reset.submit') }}">
                            @csrf
                            <input id="email" type="email" class="form-control" name="email" required
                                autocomplete="email">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info mt-4">Passowrd Reset</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
