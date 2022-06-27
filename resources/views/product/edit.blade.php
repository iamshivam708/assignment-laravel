@extends('layouts.base')
@section('content')

<div class="container-fluid mt-2">
    <div class="container">
        <div class="row">
            <h3 class="text-center py-2 px-5 bg-danger text-white mb-3">Edit Product</h3>
            <form enctype="multipart/form-data" action="{{url('/product/edit/'.$product['id'])}}" method="post">@csrf
                <div class="form-group mb-2">
                    <div class="row" align="center">
                        <div class="col-3 offset-2">
                            <img src="{{'/uploads/'.$product['image']}}" height="200px" />
                        </div>
                        <div class="col-7" align="start">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" />
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" class="form-control" name="title" value="{{$product['title']}}" />
                </div>
                <div class="form-group mb-2">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" value="{{$product['description']}}"  />
                </div>
                <div class="form-group mb-2">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{$product['price']}}"  />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@stop
