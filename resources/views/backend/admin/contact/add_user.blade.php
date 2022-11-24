@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> {{ (@$editSlide)?"Edit Contact":"Add Contact " }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"> {{ (@$editSlide)?"Edit Contact":"Add Contact " }}</li>
      </ol>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>

                  {{ (@$editSlide)?"Edit Contact":"Add Contact " }}
                  
                  <a href="{{ route('view_contact') }}" style="float: right;"  class="btn btn-primary">
                    <i class="fas fa-list"></i> View
                  </a>
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <div class="card p-4">
                      <form action="{{ (@$editSlide)?route('update_contact',$editSlide->id):route('store_contact') }}" method="post" enctype="multipart/form-data" id="quickForm">
                        @csrf              
                        <div class="row"> 
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" value="{{ @$editSlide->address }}" name="address" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                                <input type="text" value="{{ @$editSlide->mobile }}" name="mobile" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" value="{{ @$editSlide->email }}" name="email" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                                <input type="text" value="{{ @$editSlide->facebook }}" name="facebook" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Twitter</label>
                                <input type="text" value="{{ @$editSlide->twitter }}" name="twitter" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Youtube</label>
                                <input type="text" value="{{ @$editSlide->youtube }}" name="youtube" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Google</label>
                                <input type="text" value="{{ @$editSlide->google }}" name="google" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>

                          
                        </div>
                        <div class="col-2">
                          <div class="mb-3">
                              <input type="submit" class="btn btn-success" value="Send" >
                           </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection