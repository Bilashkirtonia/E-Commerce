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
							<form action="{{ route('update_dashbord') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card p-5">
                                    <h4 class="mb-3">Customer Profile Edit</h4>
                                    <div class="row">
                                        
                                        <div class="col-4">
                                            <label for="exampleFormControlInput1" class="form-label">Old image</label>
                                              <div class="mb-3" style="width: 200px;height:150px;">
                                                  <img style="width: 150px;height:150px;" id="showImage" class="profile-user-img img-fluid img-circle"
                                                    src="{{($user)?url('upload/user_image/'.$user->image) : url('image/avatar.png')}}"
                                                    
                                                    alt="User profile picture">
                                                  
                                               </div>
                                          </div>
                                          
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="name">Email</label>
                                            <input id="email" type="email" name="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="Mobile">Mobile</label>
                                            <input id="Mobile" type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="address">Address</label>
                                            <input id="address" type="text" name="address" class="form-control" value="{{ $user->address }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option {{ ($user->gender == 'male')?'selected':'' }} value="male">Male</option>
                                                <option {{ ($user->gender == 'female')?'selected':'' }}  value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="exampleFormControlInput1" class="form-label">Image</label>
                                            <input id="image" type="file" value="" name="image" class="form-control" id="exampleFormControlInput1">      
                                        </div>

                                        <div class="col-md-12">
                                            
                                            <input type="submit" name="submit" class="btn btn-info form-control mt-3" value="Update">
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