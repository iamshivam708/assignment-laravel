@extends('layouts.base')

@section('title')
User Signup
@stop

@section('content')

<div class="container-fluid">
    <div class="container mt-5">
        @if(Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{Session::get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row px-5">
            <div class="col-6">
                <img src="/login.png" height="600px" />
            </div>
            <div class="col-6 mt-3">
                <div class="row mt-4 px-5">
                    <h3 class="text-center" style="font-family: 'Rubik', sans-serif;">Signup</h3>
                    <form action="/" method="post" style="font-family: 'Poppins', sans-serif;">@csrf
                        <div class="form-group mb-2">
                            <label>Full Name</label>
                            <input type="text" class="form-control @error('name')
                        is-invalid
                        @enderror" name="name" />
                            @error('name')
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email')
                        is-invalid
                        @enderror" name="email" />
                            @error('email')
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password')
                        is-invalid
                        @enderror" name="password" />
                            @error('password')
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control  @error('cpassword')
                            is-invalid
                            @enderror" name="cpassword" />
                            @error('cpassword')
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                </div>
                <div class="row mt-5">
                    <h3 class="text-center" style="font-family: 'Rubik', sans-serif;">Already have an account? </h3>
                    <p class="text-center" style="font-family: 'Poppins', sans-serif;">Click here to <a href="/login">Login</a></p>
                </div>
            </div>
        </div>

    </div>
</div>

@stop
