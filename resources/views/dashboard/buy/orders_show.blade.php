@extends('dashboard.master')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
              Order Details
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-8 invoice-col">
              Buyer Info
              <address>
                @if (!empty($order->buyer))
                  <strong>{{$order->buyer->first_name.' '.$order->buyer->last_name}}</strong><br>
                  {{$order->buyer->address_line1}}<br>
                  {{$order->buyer->address_line2}}<br>
                  {{$order->buyer->city.','.$order->buyer->post_code}}<br>
                  {{$order->buyer->country}}<br>
                  Phone: {{$order->buyer->telephone_number}}
                @endif
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
             Order Contact Method
              <address>
                Method : {{$order->contact_method}}<br>
                Contact : {{$order->contact_info}}
              </address>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Size</th>
                  <th>Price</th>
                </tr>
                </thead>
                <tbody>
               @if(!empty($order->product))
               <tr>
                <td><img src="{{$order->product->image}}" width="180" height="120" alt=""></td>
                <td>{{$order->product->category->name}}</td>
                <td>{{$order->product->name}}</td>
                <td>{{$order->product->size}}</td>
                <td>$ {{$order->product->price}}</td>
              </tr>
                   
               @endif
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-12">
              <strong class="lead">Product Details:</strong>
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
              @if($order->product)
              {{$order->product->description}}
              @endif
              </p>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <button type="button" class="btn btn-success float-left" disabled>
               Status: {{$order->seller_side_status}}
              </button>
              @if ($order->seller_side_status == 'accept')
              <form action="{{route('order.status.update')}}" method="POST">
                @csrf
                <input type="hidden" name="status" value="Shipping">
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <button type="submit" class="btn btn-info float-right" style="margin-right: 5px;">
                  Shipping
                </button>
               </form>
               @elseif ($order->is_completed)
               <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" disabled>
                Completed
              </button>
              @elseif ($order->seller_side_status == 'Requested') 
              <form action="{{route('order.status.update')}}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <input type="hidden" name="status" value="accept">
                <button type="submit" class="btn btn-info float-right" style="margin-right: 5px;">
                  Accept
                </button>
               </form>           
              @endif
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
</div>
@endsection