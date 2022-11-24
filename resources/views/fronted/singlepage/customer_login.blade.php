@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customers login
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 pt-1 p-b-116">
		<div class="container">
			<div class="col-md-4 m-auto">
             <form method="POST" action="{{ route('login') }}" class="card shadow p-4">
                  @csrf 
                  <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="form2Example1" class="form-control" />
                      <label class="form-label" for="form2Example1">Email address</label>
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example2" class="form-control" />
                      <label class="form-label" for="form2Example2">Password</label>
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                          <label class="form-check-label" for="form2Example34"> Remember me </label>
                        </div>
                      </div>
                  
                      <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                      </div>
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                  
                    <!-- Register buttons -->
                    <div class="text-center">
                      <p>Not a member? <a href="{{ route('customer_reg') }}">Register</a></p>
                      
                                          
                    </div>
                </form>
            </div>
		</div>
	</section>	

            
  @endsection