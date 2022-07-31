@extends('dashboard.master')
@section('main_content')

<div class="row">
    <div class="col-12">
      {{-- <div class="card card-info"> --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My Trade</h3>
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
                @if(isset($trades[0]))
                @foreach ($trades as $trade )                    
                <tr> 
                    <td>{{$loop->iteration}}</td>
                    <td>@if($trade->sellerProduct)<img src="{{$trade->sellerProduct->image}}" alt="" width="30" height="30">@endif</td>
                    <td>@if($trade->sellerProduct){{$trade->sellerProduct->name}}@else Product is not avaiable @endif</td>
                    <td>{{!empty($trade->seller) ? $trade->seller->first_name.' '.$trade->seller->last_name : null}}</td>
                    <td>{{!empty($trade->seller) ? $trade->seller->telephone_number : null}}</td>
                    <td>{{!empty($trade->seller) ? $trade->seller->address_line1.','.$trade->seller->city.','.$trade->seller->country : null}}</td>
                    
                    <td>{{$trade->buyer_side_status}}</td>
                    <td>
                      <a type="button" name="edit" href="{{route('trade.details', encrypt($trade->id))}}" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
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