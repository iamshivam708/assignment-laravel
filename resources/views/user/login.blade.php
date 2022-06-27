@extends('layouts.base')

@section('title')
User Login
@stop

@section('content')

<div class="container-fluid py-5" style="background-image: url('/signup.jpg');background-size:100% 100%;height:100vh;width:100vw;background-repeat:no-repeat">
        @if(Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{Session::get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="container mt-5 py-5 px-5 d-flex justify-content-center">
        <form class="mt-4" action="{{url('/login')}}" method="post" style="font-family: 'Poppins', sans-serif;">@csrf
            <h3 class="text-center">Login</h3>
            <div class="form-group mb-2">
                <label>Email</label>
                <input type="text" class="form-control  @error('email')
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
                <input type="password" class="form-control  @error('password')
                is-invalid
                @enderror" name="password" />
                @error('password')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
    <div class="container flex-column d-flex justify-content-center">
        <h3 class="text-center" style="font-family: 'Rubik', sans-serif;">Don't have an account? </h3>
        <p class="text-center" style="font-family: 'Poppins', sans-serif;">Click here to <a href="/">Signup</a></p>
    </div>
</div>

@stop
