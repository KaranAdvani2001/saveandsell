@extends('dashboard.master')
@section('main_content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$data['products']}}</h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$data['my_trade']}}</h3>

              <p>My Trade</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('my.trade')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$data['trading']}}<sup style="font-size: 20px"></sup></h3>

              <p>Trading</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('trading.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>0</h3>

              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Latest Trading</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>#</th>
                <th>Product Image</th>
                <th>Product</th>
                <th>Buyer Name</th>
                <th>Buyer Contact</th>
                <th>Buyer Address</th>
                <th>Trade Method</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                @if(isset($data['recent_trades'][0]))
                @foreach ($data['recent_trades'] as $trade )                    
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$trade->product->image}}" alt="" width="30" height="30"></td>
                    <td>{{$trade->product->name}}</td>
                    <td>{{!empty($trade->buyer) ? $trade->buyer->first_name.' '.$trade->buyer->last_name : null}}</td>
                    <td>{{!empty($trade->buyer) ? $trade->buyer->telephone_number : null}}</td>
                    <td>{{!empty($trade->buyer) ? $trade->buyer->address_line1.','.$trade->buyer->city.','.$trade->buyer->country : null}}</td>
                    
                    <td>{{$trade->contact_method}}</td>
                    <td>{{$trade->seller_side_status}}</td>
                </tr>
              @endforeach
              @endif
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{route('trading.list')}}" class="btn btn-sm btn-secondary float-right">View All Trades</a>
        </div>
        <!-- /.card-footer -->
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Recently Added Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">Samsung TV
                  <span class="badge badge-warning float-right">$1800</span></a>
                <span class="product-description">
                  Samsung 32" 1080p 60Hz LED Smart HDTV.
                </span>
              </div>
            </li>
            <!-- /.item -->
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">Bicycle
                  <span class="badge badge-info float-right">$700</span></a>
                <span class="product-description">
                  26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                </span>
              </div>
            </li>
            <!-- /.item -->
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">
                  Xbox One <span class="badge badge-danger float-right">
                  $350
                </span>
                </a>
                <span class="product-description">
                  Xbox One Console Bundle with Halo Master Chief Collection.
                </span>
              </div>
            </li>
            <!-- /.item -->
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">PlayStation 4
                  <span class="badge badge-success float-right">$399</span></a>
                <span class="product-description">
                  PlayStation 4 500GB Console (PS4)
                </span>
              </div>
            </li>
            <!-- /.item -->
          </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Products</a>
        </div>
        <!-- /.card-footer -->
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection