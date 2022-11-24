@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Draft Customer</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Draft Customer</li>
      </ol>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Draft Customer</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <table class="table table-striped table-hover" border="2">
                      <thead>
                          <tr>
                              <th>Si</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Sign up status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $key=> $user)
                          @php
                              $new = new Carbon\Carbon($user->created_at);
                              $now = Carbon\Carbon::now();
                              $difference = ($new->diff($now)->days < 1)?'Today':$new->diffForHumans($now);
                          @endphp
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->mobile }}</td>
                              <td>{{ $difference }}</td>
                              <td>
                                <a href="{{ route('delete_customer',$user->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </td>
                          </tr>  
                          @endforeach
                          
                      </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
    </div>



</div>


@endsection