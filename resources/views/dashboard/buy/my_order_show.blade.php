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
              Seller Info
              <address>
                @if (!empty($order->seller))
                  <strong>{{$order->seller->first_name.' '.$order->seller->last_name}}</strong><br>
                  {{$order->seller->address_line1}}<br>
                  {{$order->seller->address_line2}}<br>
                  {{$order->seller->city.','.$order->seller->post_code}}<br>
                  {{$order->seller->country}}<br>
                  Phone: {{$order->seller->telephone_number}}
                @endif
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
             Order Info
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
               Status: {{$order->buyer_side_status}}
              </button>
              @if ($order->seller_side_status == 'Shipping')
              <form action="{{route('my.order.received')}}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <button type="submit" class="btn btn-info float-right" style="margin-right: 5px;">
                  Received
                </button>
               </form>
               @elseif ($order->is_completed)
               <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" disabled>
                Completed
              </button>            
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