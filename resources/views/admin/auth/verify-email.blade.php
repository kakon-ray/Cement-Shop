@extends('layouts.admin.guest')
@section('title')
    {{ 'Admin Email' }}
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Please Verify Your Email</div>
                {{-- error and success message show start --}}
                <div class="mt-2 text-center w-75 mx-auto">
                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 text-center font-medium text-sm text-green-600 dark:text-green-400">
                        <p style="color:green">Email verification link has been sent to your email</p>
                    </div>
                @endif
                </div>

                {{-- error and success message show end --}}
                <div class="card-body px-5">
                    <form method="POST" action="{{ route('admin.verification.send') }}">
                        @csrf
                       
                        <button type="submit" class="btn btn-info w-100">Verify Your Email</button>
                        
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@endsection
