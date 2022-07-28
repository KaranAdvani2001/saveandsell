@extends('frontend.master')
{{-- @section('post_head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style type="text/css">
       .panel-title {
       display: inline;
       font-weight: bold;
       }
       .display-table {
       display: table;
       }
       .display-tr {
       display: table-row;
       }
       .display-td {
       display: table-cell;
       vertical-align: middle;
       width: 61%;
       }
       </style>
@endsection --}}
@section('main_content')

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Payment Details</h3>
              </div>
  
          <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row">
              <div class="form-outline flex-fill">
                <label class="form-label" for="form1">Name on Card</label>
                <input type="text" id="form1" class="form-control form-control-lg" />
              </div>
            </div>

            <div class="card-body p-4 d-flex flex-row">
                <div class="form-outline flex-fill">
                  <label class="form-label" for="form1">Card Number</label>
                  <input type="text" id="form1" class="form-control form-control-lg" />
                </div>
            </div>

            <div class="card-body p-4 d-flex flex-row">
                <div class="form-outline flex-fill">
                  <label class="form-label" for="form1">CVC</label>
                  <input type="text" id="form1" class="form-control form-control-lg" />
                </div>
                <div class="form-outline flex-fill">
                    <label class="form-label" for="form1">Expiration Month</label>
                    <input type="text" id="form1" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline flex-fill">
                    <label class="form-label" for="form1">Expiration Year</label>
                    <input type="text" id="form1" class="form-control form-control-lg" />
                  </div>
            </div>
          </div>
          
  
          <div class="card">
            <div class="card-body">
              <button type="button"  class="btn btn-warning btn-block btn-lg">Pay Now ($100)</a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </section>
@endsection