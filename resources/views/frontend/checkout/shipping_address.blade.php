@extends('frontend.master')
@section('main_content')

<section class="h-100" style="background-color: #eee;">
  <form action="{{route('shipping.address.store')}}" method="POST">
    @csrf
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Shipping Address</h3>
              </div>
  
          <div class="card mb-4">
            <div class="card-body px-4 py-2 d-flex flex-row">
              <div class="form-outline flex-fill">
                <label class="form-label" for="form1">Addreses Line 1</label>
                <input type="text" id="form1" name="address_line1" class="form-control" required/>
              </div>
            </div>

            <div class="card-body px-4 py-2 d-flex flex-row">
                <div class="form-outline flex-fill">
                  <label class="form-label" for="form1">Address Line 2</label>
                  <input type="text" id="form1" name="address_line2" class="form-control" required/>
                </div>
            </div>
            
            <div class="card-body px-4 py-2 d-flex flex-row">
              <div class="form-outline flex-fill">
                <label class="form-label" for="form1">Post Code</label>
                <input type="text" id="form1" name="post_code" class="form-control" required/>
              </div>
          </div>
          <div class="card-body px-4 py-2 d-flex flex-row">
              <div class="form-outline flex-fill">
                <label class="form-label" for="form1">City</label>
                <input type="text" id="form1" name="city" class="form-control" required/>
              </div>
          </div>
          
          <div class="card-body px-4 py-2 d-flex flex-row">
            <div class="form-outline flex-fill">
              <label class="form-label" for="form1">Country</label>
              <input type="text" name="country" id="form1" class="form-control" required/>
            </div>
        </div>

            
          </div>
          
  
          <div class="card">
            <div class="card-body">
              <button type="submit"  class="btn btn-warning btn-block btn">Checkout</a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </form>
  </section>
@endsection