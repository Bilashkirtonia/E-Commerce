@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
    	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Password change
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
							<form action="{{ route('update_password') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card p-5">
                                    <h4 class="mb-3">Password change</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="name">Old password</label>
                                            <input id="oldpassword" type="password" name="oldpassword" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="name">New password</label>
                                            <input id="newpassword" type="password" name="newpassword" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="Mobile">Confirm password</label>
                                            <input id="Mobile" type="password" name="confirm_password" class="form-control">
                                        </div>
                                    

                                        <div class="col-md-12">
                                            
                                            <input type="submit" name="submit" class="btn btn-info form-control mt-3" value="Set password">
                                        </div>
                                    </div>
                                </div>
                            </form>
						   </div>
						</div>
					</div>
			</div>
		</div>
	</section>	

            
  @endsection