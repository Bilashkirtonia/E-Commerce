@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Varify your Email 
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 pt-1 p-b-116">
		<div class="container">
			<div class="col-md-4 m-auto">
                <form method="post" action="{{ route('varify_code_update') }}" class="card shadow p-4">
                    @csrf           
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example2" value="{{ $email }}" class="form-control" />
                        <label class="form-label" for="form2Example2">Email</label>
                      </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="code" id="form2Example2" class="form-control" />
                      <label class="form-label" for="form2Example2">Code</label>
                    </div>
                  
                  
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                </form>
            </div>
		</div>
	</section>	

            
  @endsection