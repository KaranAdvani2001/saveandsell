@extends('dashboard.master')
@section('main_content')

<div class="row">
    <div class="col-12">
      {{-- <div class="card card-info"> --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>Trading
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 400px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Product Image</th>
                <th>Product</th>
                <th>Buyer Name</th>
                <th>Buyer Contact</th>
                <th>Buyer Address</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($trades[0]))
                @foreach ($trades as $trade )                    
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$trade->product->image}}" alt="" width="30" height="30"></td>
                    <td>{{$trade->product->name}}</td>
                    <td>{{!empty($trade->buyer) ? $trade->buyer->first_name.' '.$trade->buyer->last_name : null}}</td>
                    <td>{{!empty($trade->buyer) ? $trade->buyer->telephone_number : null}}</td>
                    <td>{{!empty($trade->buyer) ? $trade->buyer->address_line1.','.$trade->buyer->city.','.$trade->buyer->country : null}}</td>
                    
                    <td>{{$trade->seller_side_status}}</td>
                    <td>
                      <a type="button" name="edit" href="{{route('trading.details', encrypt($trade->id))}}" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          {!! $trades->links() !!}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection