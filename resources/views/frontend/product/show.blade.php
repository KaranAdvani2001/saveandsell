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
                <div class="fs-5 mb-5">
                    <span class=>${{ $product->price }}</span>
                </div>
                <p class="lead">{{ $product->description }}</p>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <div class="d-flex">
                    
                        <input class="form-control text-center me-3" id="inputQuantity" type="quantity" name="quantity" value="1" style="max-width: 3rem" required/>
                        <span class="text-danger">{{$errors->first('quantity')}}</span>
                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </form>

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