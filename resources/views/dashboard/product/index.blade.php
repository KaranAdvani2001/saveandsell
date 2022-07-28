@extends('dashboard.master')
@section('main_content')

<div class="row">
    <div class="col-12">
      {{-- <div class="card card-info"> --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <a href="{{route('product.create')}}" type="button" class="btn btn-block btn-info">Add New</a>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 400px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Nmae</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($products[0]))
                @foreach ($products as $product )                    
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$product->image}}" alt="" width="30" height="30"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->price}} $</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->type}}</td>
                    <td>
                      <a type="button" name="edit" href="{{route('product.edit', encrypt($product->id))}}" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      <a type="button" name="delete" href="{{route('product.delete', encrypt($product->id))}}" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      
                    </td>
                </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          {!! $products->links() !!}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection