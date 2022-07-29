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
              Trade Details
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-8 invoice-col">
              Buyer Info
              <address>
                @if (!empty($trade->buyer))
                  <strong>{{$trade->buyer->first_name.' '.$trade->buyer->last_name}}</strong><br>
                  {{$trade->buyer->address_line1}}<br>
                  {{$trade->buyer->address_line2}}<br>
                  {{$trade->buyer->city.','.$trade->buyer->post_code}}<br>
                  {{$trade->buyer->country}}<br>
                  Phone: {{$trade->buyer->telephone_number}}
                @endif
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
             Trade Contact Method
              <address>
                Method : {{$trade->contact_method}}<br>
                Contact : {{$trade->contact_info}}
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
               @if(!empty($trade->product))
               <tr>
                <td><img src="{{$trade->product->image}}" width="180" height="120" alt=""></td>
                <td>{{$trade->product->category->name}}</td>
                <td>{{$trade->product->name}}</td>
                <td>{{$trade->product->size}}</td>
                <td>$ {{$trade->product->price}}</td>
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
              @if($trade->product)
              {{$trade->product->description}}
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
               Status: {{$trade->seller_side_status}}
              </button>
              @if ($trade->seller_side_status == 'accept')
              <form action="{{route('trading.status.update')}}" method="POST">
                @csrf
                <input type="hidden" name="status" value="Shipping">
                <input type="hidden" name="trade_id" value="{{$trade->id}}">
                <button type="submit" class="btn btn-info float-right" style="margin-right: 5px;">
                  Shipping
                </button>
               </form>
               @elseif ($trade->is_completed)
               <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" disabled>
                Completed
              </button>
              @elseif ($trade->seller_side_status == 'Requested') 
              <form action="{{route('trading.status.update')}}" method="POST">
                @csrf
                <input type="hidden" name="trade_id" value="{{$trade->id}}">
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