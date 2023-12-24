@extends('app')
@section('content')

    <h2>Add New Product</h2>
    <div class="col-sm-12">
        <form id="insert-form1" method="post" action="{{url('api/store')}}" enctype="multipart/form-data">
            @csrf 
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="product_name"  placeholder="Enter Product Name" autofocus required/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="product_price"  placeholder="Enter Product Price" required/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <textarea class="form-control" name="product_description" id="" cols="10" rows="5" placeholder="Enter Product Description" required></textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="file" name="product_image[]" id="" multiple required>
                </div>
            </div>
            <button class="btn btn-success" type="submit" onclick="submitForm();">Add Product</button>
        </form>
    </div>

@endsection