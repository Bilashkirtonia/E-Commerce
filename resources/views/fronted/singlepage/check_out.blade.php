@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer checkout
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="row">
                <div class="col-md-8 m-auto">
                    <form action="{{ route('customer-check-out') }}" method="post" class="card p-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Email</label>
                                <input id="email" type="email" name="email" class="form-control" >
                            </div>
                            <div class="col-md-6">
                                <label for="Mobile">Mobile</label>
                                <input id="Mobile" type="text" name="mobile" class="form-control" >
                            </div>
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input id="address" type="text" name="address" class="form-control">
                            </div>
                            
        
                            <div class="col-md-12">
                                
                                <input type="submit" name="submit" class="btn btn-info form-control mt-3" value="Send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</section>	

            
  @endsection