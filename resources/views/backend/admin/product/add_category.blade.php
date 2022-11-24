@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> {{ (@$editSlide)?"Edit Product":"Add Product " }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"> {{ (@$editSlide)?"Edit Product":"Add Product " }}</li>
      </ol>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>

                  {{ (@$editSlide)?"Edit Product":"Add Product " }}
                  
                  <a href="{{ route('view_product') }}" style="float: right;"  class="btn btn-primary">
                    <i class="fas fa-list"></i> View
                  </a>
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <div class="card p-4">
                      <form action="{{ (@$editSlide)?route('update_product',$editSlide->id):route('store_product') }}" method="post" enctype="multipart/form-data" id="quickForm">
                        @csrf              
                        <div class="row">                                                 
                          <div class="col-4">
                            <div class="mb-3">
                                <label for="Product" class="form-label">Category</label>
                                <select name="category_id" id="category" class="form-control" >
                                  <option value="0">Select category</option>
                                  @foreach ( $categorys as $category)
                                  <option value="{{ $category->id }}" {{ (@$editSlide->category_id == $category->id)? "selected" :""}}>{{ $category->name }}</option>
                                  @endforeach
                                </select>                                         
                             </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="Product" class="form-label">Brand</label>
                                <select name="brand_id" id="brand" class="form-control" >
                                  <option value="0">Select category</option>
                                  @foreach ( $brands as $brand)
                                <option value="{{ $brand->id }}" {{ (@$editSlide->brand_id == $brand->id)? "selected" :""}}>{{ $brand->name }}</option>
                                @endforeach
                                </select>                                         
                             </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="Product" class="form-label">Product name</label>
                                <input id="Product" name="product" type="text" value="{{@$editSlide->name}}" class="form-control" >                                            
                             </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="Product" class="form-label">Colors</label>
                                <select name="color_id[]" multiple class="form-control select2" >
                                  <option value="0">Select category</option>
                                  @foreach ( $colors as $color)
                                <option value="{{ $color->id }}" {{(@$editSlide)?(@in_array(['color_id' => $color->id],$colorId)? "selected" :""):''}}>{{ $color->name }}</option>
                                @endforeach 
                                </select>                                         
                             </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="size" class="form-label">Sizes</label>
                                <select id="size" name="size_id[]" multiple class="form-control select2" >
                                  <option value="0">Select category</option>
                                  @foreach ( $sizes as $size)
                                <option value="{{ $size->id }}" {{(@$editSlide)?((@in_array(['size_id' => $size->id],$sizeId))? "selected" :""):''}} >{{ $size->name }}</option>
                                @endforeach
                                </select>                                         
                             </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="Product" class="form-label">Price</label>
                                <input id="Product" name="price" type="text" value="{{@$editSlide->price}}" class="form-control" >                                            
                             </div>
                          </div>

                          
                          <div class="col-12">
                            <div class="mb-3">
                                <label for="short_title" class="form-label">Short title</label>
                                <textarea name="short_title" rows="2" class="form-control">{{@$editSlide->short_desc}}</textarea>
                             </div>
                          </div>

                          <div class="col-12">
                            <div class="mb-3">
                                <label for="long_title" class="form-label">Short title</label>
                                <textarea name="long_title" rows="5" class="form-control">{{@$editSlide->long_desc}}</textarea>
                             </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Image</label>
                                <input id="image" type="file" name="image" class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>

                          <div class="col-4">
                            <label for="exampleFormControlInput1" class="form-label">Old image</label>
                              <div class="mb-3" style="width: 200px;height:150px;">
                                  <img style="width: 150px;height:150px;" id="showImage" class="profile-user-img img-fluid img-circle"
                                    src="{{(@$editSlide)?url('upload/product_img/'.$editSlide->image) : url('image/avatar.png')}}"
                                    
                                    alt="User profile picture">
                                  
                               </div>
                          </div>

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Sub Image</label>
                                <input type="file" name="sub_image[]" multiple class="form-control" id="exampleFormControlInput1">                                            
                             </div>
                          </div>
                          
                         </div>
                         <div class="col-2">
                          <div class="mb-3">
                              <input type="submit" class="btn btn-success d-block" value="{{ (@$editSlide)?"Update":"Send " }}" >
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
{{-- <script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        Product: {
          required: true,
          Product: true,
        },
       
      },
      messages: {
        Product: {
          required: "Please enter a email address",
          Product: "Please enter a valid email address"
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
</script> --}}
@endsection