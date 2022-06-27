@extends('layouts.base')

@section('title')
User Profile
@stop

@section('content')

<div class="container-fluid bg-primary text-white">
    <div class="row px-4 py-5 text-center">
        <i class="fas fa-user fa-4x"></i>
        <h1 class="display-5 fw-bold">{{$user['name']}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{$user['email']}}</p>
        </div>
    </div>
</div>
<div class="container mt-4 mb-4">
    <h3 class="text-center py-2 text-white bg-danger">All Products</h3>
    @foreach($products as $product)
        <div class="row mt-2 py-3 px-5 bg-danger text-white" align="center">
            <div class="col-3">
                <img src="{{'/uploads/'.$product['image']}}" height="200px" />
            </div>
            <div class="col-9 mt-3" align="start">
                <h3>{{$product['title']}}</h3>
                <p>{{$product['description']}}</p>
                <p>&#8377;{{$product['price']}}</p>
            </div>
        </div>
    @endforeach
</div>

@stop
