@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> {{ (@$editSlide)?"Edit brand":"Add brand " }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"> {{ (@$editSlide)?"Edit brand":"Add brand " }}</li>
      </ol>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>

                  {{ (@$editSlide)?"Edit brand":"Add brand " }}
                  
                  <a href="{{ route('view_brand') }}" style="float: right;"  class="btn btn-primary">
                    <i class="fas fa-list"></i> View
                  </a>
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <div class="card p-4">
                      <form action="{{ (@$editSlide)?route('update_brand',$editSlide->id):route('store_brand') }}" method="post" enctype="multipart/form-data" id="quickForm">
                        @csrf              
                        <div class="row">                                                 
                          <div class="col-6">
                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <input id="brand" type="text" value="{{@$editSlide->name}}" name="brand" class="form-control" >                                            
                             </div>

                          </div>
                         </div>
                         <div class="col-2">
                          <div class="mb-3">
                              <input type="submit" class="btn btn-success" value="{{ (@$editSlide)?"Update":"Send " }}" >
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
<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        brand: {
          required: true,
          brand: true,
        },
       
      },
      messages: {
        brand: {
          required: "Please enter a email address",
          brand: "Please enter a valid email address"
        },
        
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endsection