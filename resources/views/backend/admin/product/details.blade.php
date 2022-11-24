@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Details</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Product details 
                  {{-- @if ($logo == 1)
                    
                  @else
                  <a href="{{ route('add_Details') }}" style="float: right;"  class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add
                  </a>
                  @endif --}}
                  <a href="{{ route('view_product') }}" style="float: right;"  class="btn btn-primary">
                    <i class="fas fa-plus"></i> View
                  </a>
                 
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <table class="table table-striped table-hover" border="2">
                      <thead>
                        <tr>
                          <td style="width: 50%">Category</td>
                          <td style="width: 50%">{{ $details->category->name }}</td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Brand</td>
                          <td style="width: 50%">{{ $details->brand->name }}</td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Product name</td>
                          <td style="width: 50%">{{ $details->name }}</td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Short text</td>
                          <td style="width: 50%">{{ $details->short_desc }}</td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Long text</td>
                          <td style="width: 50%">{{ $details->long_desc }}</td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Image</td>
                          <td style="width: 50%">
                            <div class="text-center">
                              <img class="profile-user-img img-fluid" style="width: 80px;height:50px;"
                                  src="{{url('upload/product_img',$details->image)}}"
                                  
                                  alt="User profile picture">
                              </div>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Colors</td>
                          <td style="width: 50%">
                            @foreach ( $colorId as $color)
                            {{ $color->color->name.' ' }}
                            @endforeach
                         </td>
                        </tr>
                        <tr>
                          <td style="width: 50%">Size</td>
                          <td style="width: 50%">
                              @foreach ( $sizeId as $size)
                              {{ $size->size->name.' ' }}
                              @endforeach
                           
                          </td>
                        </tr>
                        
                        <tr>
                          <td style="width: 50%"> Sub Image</td>
                          <td style="width: 50%">
                              @foreach ( $subImageId as $image)
                               <div class="text-center">
                                <img class="profile-user-img img-fluid d-inline" style="width: 80px;height:50px;"
                                    src="{{url('upload/product_sub_img',$image->sub_image)}}"
                                    
                                    alt="User profile picture">
                                </div>
                              @endforeach
                           
                          </td>
                        </tr>

                      </thead>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
    </div>



</div>

<!-- Button trigger modal -->


{{-- <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add form</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">...</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
@endsection