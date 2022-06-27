@extends('layouts.base')

@section('title')
Admin Dashboard
@stop

@section('content')

<div class="container-fluid">
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{Session::get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-4">
                <h3 class="text-center py-2 px-5 bg-danger text-white">Create Product</h3>
                <form class="mt-3" enctype="multipart/form-data" action="{{url('/admin/dashboard')}}" method="post">@csrf
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" />
                        @error('image')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" class="form-control" name="title" />
                        @error('title')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" />
                        @error('description')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" />
                        @error('price')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{$message}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-8">
                <h3 class="text-center py-2 px-5 bg-danger text-white">All Products</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product['id']}}</td>
                                <td><img src="{{'/uploads/'.$product['image']}}" height="100px" width="100px" /></td>
                                <td>{{$product['title']}}</td>
                                <td>{{$product['description']}}</td>
                                <td>&#8377;{{$product['price']}}</td>
                                <td><a href="{{url('/product/edit/'.$product['id'])}}" class="btn btn-success">Edit</a></td>
                                <td><a href="{{url('/product/delete/'.$product['id'])}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row" align="center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
