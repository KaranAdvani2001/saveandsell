@extends('dashboard.master')
@section('main_content')

<div class="row">
    <div class="col-12">
      {{-- <div class="card card-info"> --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 400px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Product Image</th>
                <th>Product</th>
                <th>Seller Name</th>
                <th>Seller Contact</th>
                <th>Seller Address</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($orders[0]))
                @foreach ($orders as $order )                    
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$order->product->image}}" alt="" width="30" height="30"></td>
                    <td>{{$order->product->name}}</td>
                    <td>{{!empty($order->seller) ? $order->seller->first_name.' '.$order->seller->last_name : null}}</td>
                    <td>{{!empty($order->seller) ? $order->seller->telephone_number : null}}</td>
                    <td>{{!empty($order->seller) ? $order->seller->address_line1.','.$order->seller->city.','.$order->seller->country : null}}</td>
                    
                    <td>{{$order->buyer_side_status}}</td>
                    <td>
                      <a type="button" name="edit" href="{{route('my.order.details', encrypt($order->id))}}" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                      
                    </td>
                </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          {{-- {!! $orders->links() !!} --}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection