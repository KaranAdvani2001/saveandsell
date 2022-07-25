@extends('layouts.admin.app')
@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('admin.category.update', $category->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nameField">Name field</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameField"
                               placeholder="Category name" name="name" value="{{ $category->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection('content')
