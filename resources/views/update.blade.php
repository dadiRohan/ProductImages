@extends('app')
@section('content')

    <h2>Update Product</h2>
    <div class="col-sm-12">
        <form id="insert-form1" method="post" action="{{url('api/update')}}" enctype="multipart/form-data">
            @csrf 
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="product_name"  placeholder="Enter Product Name" value="{{$data->product_name}}" autofocus required/>
                    <input type="hidden" name="id" value="{{$data->id}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="product_price"  placeholder="Enter Product Price" value="{{$data->product_price}}" required/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <textarea class="form-control" name="product_description" id="" cols="10" rows="5" placeholder="Enter Product Description" required>{{$data->product_description}}</textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="file" name="product_image[]" id="" multiple>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Update Product</button>

            <div class="col-sm-12" >
                <h5>Previous Images</h5>
                @foreach(explode(',',$data->product_image) as $imgData)
                <div class="col-6">
                <img src="{{url('/images')."/".$imgData}}" alt="" width="30%" style="border:2px solid green;">
                </div>
                @endforeach
            </div>

        </form>
    </div>

@endsection