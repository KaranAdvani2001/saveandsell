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
              Seller Info
              <address>
                @if (!empty($trade->seller))
                  <strong>{{$trade->seller->first_name.' '.$trade->seller->last_name}}</strong><br>
                  {{$trade->seller->address_line1}}<br>
                  {{$trade->seller->address_line2}}<br>
                  {{$trade->seller->city.','.$trade->seller->post_code}}<br>
                  {{$trade->seller->country}}<br>
                  Phone: {{$trade->seller->telephone_number}}
                @endif
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
             Trade Info
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
                  <th>My Product</th>
                  <th>Seller Product</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                    @if(!empty($trade->buyerProduct))
                    <strong>Name  : </strong> {{$trade->buyerProduct->name}} <br>
                    <strong>Size  : </strong> {{$trade->buyerProduct->size}} <br>
                    <strong>Description  : </strong> {{$trade->buyerProduct->description}} <br>
                    <strong>Image : </strong> <img src="{{$trade->buyerProduct->image}}" width="90" height="80" alt=""> <br>
                    @endif
                  </td>
                  <td>
                    @if(!empty($trade->sellerProduct))
                    <strong>Name  : </strong> {{$trade->sellerProduct->name}} <br>
                    <strong>Size  : </strong> {{$trade->sellerProduct->size}} <br>
                    <strong>Description  : </strong> {{$trade->sellerProduct->description}} <br>
                    <strong>Image : </strong> <img src="{{$trade->sellerProduct->image}}" width="90" height="80" alt=""> <br>
                 
                    @endif
                  </td>
                </tr>
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
               Status: {{$trade->buyer_side_status}}
              </button>
              @if ($trade->seller_side_status == 'Shipping')
              <form action="{{route('my.trade.received')}}" method="POST">
                @csrf
                <input type="hidden" name="trade_id" value="{{$trade->id}}">
                <button type="submit" class="btn btn-info float-right" style="margin-right: 5px;">
                  Received
                </button>
               </form>
               @elseif ($trade->is_completed)
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