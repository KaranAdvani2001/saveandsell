@extends('frontend.master')
@section('main_content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
         @foreach ($products as $product)   
        <div class="col mb-5">
                
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" width="450" height="300" src="{{$product->image}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product price-->
                           @if($product->price > 0) ${{ $product->price }} @endif
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('product.details',encrypt($product->id)) }}">View details</a></div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {!! $products->links() !!}

        {{-- @if (isset($menu) && $menu == 'shop')
            {!! $products->links() !!}
        @endif --}}
    </div>
</section>
@endsection