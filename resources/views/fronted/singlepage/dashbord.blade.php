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
				<div class="col-md-4 my-5">
					<ul>
						<li><a class="btn btn-success mb-2" href="{{ route('dashbord') }}">My profile</a></li>
						<li><a class="btn btn-success mb-2" href="{{ route('change_password') }}">Change password</a></li>
						<li><a class="btn btn-success mb-2" href="{{ route('my_order') }}">My order</a></li>
					</ul>
				</div>
				<div class="col-md-8">
					<div class="row">
						
						<div class="col-md-8 bordered">
							<div class="card p-5">
								<h4 class="mb-3">Customer Profile</h4>
								<div class="row">
									
									<div class="col-md-4">
										<img style="width: 100px;height:100px; margin-bottom:20px; border:4px solid #000;" src="{{($user)?url('upload/user_image/'.$user->image) : url('image/avatar.png')}}" alt="" class="img img-round">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<table class="table">
											<thead>
												<tr>
													<td style="width: 30%">User name</td>
													<td style="width: 70%">{{ $user->name }}</td>
												</tr>
												
												<tr>
													<td style="width: 30%">Email</td>
													<td style="width: 70%">{{ $user->email }}</td>
												</tr>
												<tr>
													<td style="width: 30%">Mobile</td>
													<td style="width: 70%">{{ $user->mobile }}</td>
												</tr>
												<tr>
													<td style="width: 30%">Address</td>
													<td style="width: 70%">{{ $user->address }}</td>
												</tr>

											</thead>
										</table>
										<a href="{{ route('dashbord_edit') }}"class="btn btn-info">Edit</a>
									</div>
								</div>
							</div>
						   </div>
						</div>
					</div>
			</div>
		</div>
	</section>	

            
  @endsection