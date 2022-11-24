@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">product</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">product</li>
      </ol>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Approve 
                 
                 
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Si</td>
                                <td>Order number</td>
                                <td>Total Amount</td>
                                <td>Payment</td>
                                <td>Order status</td>
                                <td>Action</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <th>{{ $order->order_no }}</th>
                                    <th>{{ $order->order_total }}</th>
                                    <th>{{ $order->payment->payment_method }}
                                        @if ($order->payment->payment_method == 'bkash')
                                            Bkash no : {{ $order->payment->transaction_no }}
                                        @endif
                                    </th>
                                    <th>
                                        @if ($order->status == '0')
                                            <span class="btn btn-danger">Unapprove</span>
                                        @elseif ($order->status == '1')
                                            <span class="text-success">Approve</span>
                                        @endif
                                    </th>
                                    <th>
                                       <a href="{{ route('customer_order_details',$order->id) }}" class="btn btn-info">Details</a>    
                                    </th>                                               
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