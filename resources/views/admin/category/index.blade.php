@extends('layouts.admin.app')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category<code>.list</code></h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Category Name
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>
                                {{++$key}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                May 15, 2015
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
