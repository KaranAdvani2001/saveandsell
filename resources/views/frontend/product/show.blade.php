@extends('frontend.master')
@section('main_content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{$product->image}}" alt="" /></div>
            <div class="col-md-6">
                <div class="small mb-1">{{ $product->category->name }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                @if($product->size) 
                <p class="small mb-1">Size: {{ $product->size }}</p>
                @endif
               @if($product->price > 0)
               <div class="fs-5 mb-5">
                    <span class=>${{ $product->price }}</span>
                </div>
               @endif
                <p class="lead">{{ $product->description }}</p>
                <h3>Seller Contact Details</h3>
                <p>Telephone Number : {{$product->seller->telephone_number}}</p> 

               @if($product->seller_id != Auth::id())
                @if ($product->type == 'trade')
                    @if(isset($tradable_products[0]))                    
                    <div class="page-wrapper">
                        <div class="wrapper wrapper--w900">
                            <div class="card card-6">
                                <div class="card-heading">
                                    <h2 class="title">{{$product->type == 'trade' ? "Trading Contact From" : "Buying Contact From"}}</h2>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action = "{{ $product->type == 'trade' ? route('trade') : route('buy')}}" >
                                        @csrf
                                        <div class="form-row">
                                            <div class="name">Contact Method</div>
                                            <div class="value">
                                                <select class="input--style-12" type="select" name="contact_method" required>
                                                    <option value="{{null}}">Select Contact Method</option>
                                                    <option value="whatsapp">Whatsapp</option>
                                                    <option value="facebook">Facebook</option>
                                                    <option value="email">Email</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="name">Contact Info</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <input class="input--style-12" type="string" name="contact_info" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="name">Tradeable Product</div>
                                            <div class="value">
                                                <select class="input--style-12" type="select" name="buyer_product" required>
                                                    <option value="{{null}}">Select Tradeable Product</option>
                                                    @if (isset($tradable_products[0]))
                                                        @foreach ($tradable_products as $trading_p )
                                                        <option value="{{$trading_p->id}}">{{$trading_p->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="seller_product" value="{{$product->id}}">
                                        <input type="hidden" name="seller_id" value="{{$product->seller_id}}">
                                        <div class="card-footer">
                                            <button class="btn btn-info" type="submit">{{$product->type == 'trade' ? "Trade" : "Buy Now"}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <h3 class="text-danger">You have no tradeable products</h3>
                    @endif
                @else                    
                <div class="page-wrapper">
                    <div class="wrapper wrapper--w900">
                        <div class="card card-6">
                            <div class="card-heading">
                                <h2 class="title">{{$product->type == 'trade' ? "Trading Contact From" : "Buying Contact From"}}</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" action = "{{ $product->type == 'trade' ? route('trade') : route('buy')}}" >
                                    @csrf
                                    <div class="form-row">
                                        <div class="name">Contact Method</div>
                                        <div class="value">
                                            <select class="input--style-12" type="select" name="contact_method" required>
                                                <option value="{{null}}">Select Contact Method</option>
                                                <option value="whatsapp">Whatsapp</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="email">Email</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="name">Contact Info</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-12" type="string" name="contact_info" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="seller_id" value="{{$product->seller_id}}">
                                    <div class="card-footer">
                                        <button class="btn btn-info" type="submit">{{$product->type == 'trade' ? "Trade" : "Buy Now"}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
               @endif

            </div>
        </div>
    </div>
</section>
@endsection

@section('after_script')
<script>
  //   $('document').ready(function () {

        function addCart(product_id) {
            alert(product_id)
        var quantity =   $('#product_quantity').val();
        
        $.ajax({
            url: "{{URL::route('cart.add')}}",
            method: "POST",
            data: {
                'product_id': product_id,
                'quantity': quantity ? quantity : 1,
                '_token': "{{csrf_token()}}"
            },
            success: function (data) {
                document.getElementById('cartlist_count').innerHTML = data['data'].item_number;
                document.getElementById('mobile_cartlist_count').innerHTML = data['data'].item_number;
                document.getElementById('cart_amount').innerHTML = "<b>My Cart </b> - $" +data['data'].total_price.toFixed(2);
                if (data['success'] == true) {
                    var toastMixin = Swal.mixin({
                         toast: true,
                         icon: 'success',
                        title: 'General Title',
                         animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                         }
                    });
                toastMixin.fire({
                animation: true,
                title:data['message']
             });
                } else {
                    var toastMixin = Swal.mixin({
                         toast: true,
                         icon: 'success',
                        title: 'General Title',
                         animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                         }
                    });
                     toastMixin.fire({
                     title: data['message'],
                    icon: 'error'
                     });
                }
            }
        });
    }
//})
   
</script>

@endsection