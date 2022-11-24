@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customers Registation
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 pt-1 p-b-116">
		<div class="container">
			<div class="row">
                <div class="col-md-5 m-auto ">
                    <form class="card shadow p-4" method="POST" action="{{ route('sign-up-store') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="form3Example3" class="form-control" />
                            <label class="form-label" for="form3Example3">Full name</label>
                            <font class="text-danger">{{ ($errors->has('name'))?($errors->first('name')):""}}</font>

                        </div>
                      
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="email" name="email" id="form3Example3" class="form-control" />
                          <label class="form-label" for="form3Example3">Email</label>
                          <font class="text-danger">{{ ($errors->has('email'))?($errors->first('email')):""}}</font>

                        </div>

                        <!-- Mobile input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="mobile" id="form3Example3" class="form-control" />
                            <label class="form-label" for="form3Example3">Mobile</label>
                            <font class="text-danger">{{ ($errors->has('mobile'))?($errors->first('mobile')):""}}</font>

                        </div>
                       

                        <div class="row mb-4">
                            <div class="col">
                              <div class="form-outline mb-4">
                              <input type="password" name="password" id="form3Example4" class="form-control" />
                              <label class="form-label"  for="form3Example4">Password</label>
                              <font class="text-danger">{{ ($errors->has('password'))?($errors->first('password')):""}}</font>
                            </div>
                            </div>
                            <div class="col">
                              <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="confirm_password" id="form3Example4" class="form-control" />
                                <label class="form-label" for="form3Example4">Confirm Password</label>
                                <font class="text-danger">{{ ($errors->has('confirm_password'))?($errors->first('confirm_password')):""}}</font>

                            </div>
                            </div>
                          </div>
                      
                        
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">                          <label class="form-check-label" for="form2Example33">
                            <p>Already registration?<a href="{{ route('customer_login') }}">log in</a></p>
                            Subscribe to our newsletter
                          </label>
                        </div>
                      
                        <!-- Submit button -->
                      
                       
                      </form>
                </div>
            </div>
		</div>
	</section>	

            
  @endsection