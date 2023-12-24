@extends('app')
@section('content')
<a target="__blank"  href="{{ url('add-product') }}"><button class="btn btn-primary">Add Product</button></a>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Product Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <span style="display:none;">{{$sr_no = 1}}</span>

            @foreach($data as $prd)
            <tr>
                <td>{{$sr_no++}}</td>
                <td>{{$prd->product_name}}</td>
                <td>{{$prd->product_price}}</td>
                <td>{{$prd->product_description}}</td>
                <td>
                    @foreach(explode(',',$prd->product_image) as $imgData)
                    <img src="{{url('/images')."/".$imgData}}" alt="" style="width:80px;height:80px;border:2px solid green;">
                    @endforeach
                </td>
                <td>
                    <a target="__blank"  class="btn btn-warning" href="{{url('alter-product')."/".$prd->id}}">Edit</a>
                    <a id="#delete" class="btn btn-danger" href="{{url('api/delete')."/".$prd->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection