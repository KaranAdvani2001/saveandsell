@extends('dashboard.master')
@section('main_content')

<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Product Create</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="card-body">

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <select type="text" name="category_id" class="form-control" required>
              <option value="{{null}}">Select Category</option>
              @if(isset($categories[0]))
                @foreach ($categories as $category )
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              @endif
            </select>
            <span class="text-danger">{{$errors->first('category_id') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
            <span class="text-danger">{{$errors->first('name') }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Size</label>
          <div class="col-sm-10">
            <input type="text" name="size" class="form-control">
            <span class="text-danger">{{$errors->first('size') }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Price<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="number" step="any" name="price" class="form-control" required>
            <span class="text-danger">{{$errors->first('price') }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="number" name="quantity" class="form-control" required>
            <span class="text-danger">{{$errors->first('quantity') }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Product Type <span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <select type="text" name="type" class="form-control" required>
              <option value="{{null}}">Select Product Type</option>
              <option value="trade">Trade</option>
              <option value="for sale">For Sale</option>
            </select>
            <span class="text-danger">{{$errors->first('type') }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <textarea  name="description" class="form-control" cols="30" rows="5"></textarea>
            <span class="text-danger">{{$errors->first('description') }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Product Image<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="file" name="image" class="form-control" required>
            <span class="text-danger">{{$errors->first('image') }}</span>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info float-right">Submit</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
@endsection