@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Dashbord
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 pt-2 p-b-116">
		<div class="container">
			<div class="row py-5">
				<div class="col-md-2 my-5">
					<ul>
						<li><a class="btn btn-success mb-2" href="{{ route('dashbord') }}">My profile</a></li>
						<li><a class="btn btn-success mb-2" href="{{ route('change_password') }}">Change password</a></li>
						<li><a class="btn btn-success mb-2" href="{{ route('my_order') }}">My order</a></li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="row">
						
						<div class="col-md-12 bordered">
							<div class="card p-5">
								<h4 class="mb-3">Customer Profile</h4>
							
                                
                                	
							</div>
						   </div>
						</div>
					</div>
			</div>
		</div>
	</section>	

            
  @endsection