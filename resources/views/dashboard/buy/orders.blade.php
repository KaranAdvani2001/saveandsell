@extends('dashboard.master')
@section('main_content')

<div class="row">
    <div class="col-12">
      {{-- <div class="card card-info"> --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Orders</h3>
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
                @if(isset($orders[0]))
                @foreach ($orders as $order )                    
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$order->product->image}}" alt="" width="30" height="30"></td>
                    <td>{{$order->product->name}}</td>
                    <td>{{!empty($order->buyer) ? $order->buyer->first_name.' '.$order->buyer->last_name : null}}</td>
                    <td>{{!empty($order->buyer) ? $order->buyer->telephone_number : null}}</td>
                    <td>{{!empty($order->buyer) ? $order->buyer->address_line1.','.$order->buyer->city.','.$order->buyer->country : null}}</td>
                    
                    <td>{{$order->seller_side_status}}</td>
                    <td>
                      <a type="button" name="edit" href="{{route('trading.details', encrypt($order->id))}}" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                      {{-- <a type="button" name="delete" href="{{route('order.delete', encrypt($order->id))}}" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> --}}
                      
                    </td>
                </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          {!! $orders->links() !!}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection