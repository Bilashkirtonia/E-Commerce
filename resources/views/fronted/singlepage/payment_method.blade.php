@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
        <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Payment method
		</h2>
	</section>
	@php
		$contents = Cart::content();
		$total = 0;
	@endphp
	
		
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
	 <form action="{{ route('payment_store') }}" method="post">
			@csrf
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2">Name</th>
								<th class="column-2">Color</th>
								<th class="column-2">Size</th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>
							@foreach ($contents as $content)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{ url('upload/product_img',$content->options->image) }}" alt="IMG">
									</div>
								</td>
								<td class="column-2">{{ $content->name  }}</td>
								
								<td class="column-2">{{ $content->options->color_name}}</td>
								<td class="column-3">{{ $content->options->size_name }}</td>
								<td class="column-3">{{ $content->price }} Tk</td>
								<td class="column-4">
									<div class="wrap-num-product flex-w m-l-auto m-r-0">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="{{ $content->qty }}">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<input type="hidden" name="rowId" value="{{ $content->rowId }}">
								</td>
								<td class="column-5">{{ $content->subtotal }} Tk</td>
								<td class="column-5">
									<a class="btn btn-danger" href="{{ route('delete_to_cart',$content->rowId) }}">X</a>
								</td>
							</tr>
							
							@php
								$total +=$content->subtotal;
							@endphp
							@endforeach
							
                            <tr>
                                <td colspan="6" style="text-align: left"><strong>Grand total</strong></td>
                                <td colspan="1" ><strong>{{ $total }}</strong></td>
                            </tr>
							
						</table>
					</div>
				</div>

				
					<div class="col">
						<div class="row">
							
							<div class="col-md-6 m-auto ">
								<h3 class="text-center my-3">Payment methods</h3>
								@foreach ($contents as $content)
								<input type="hidden" name="product_id" value="{{ $content->id }}">
								@endforeach

								<div class="col-md-12">
									<label for="payment_method" >Payment method</label>
									<select name="payment_method" id="payment_method" class="form-control">
										<option value="cash">Cash on delivery</option>
										<option value="bkash">Bkash</option>
	
									</select>
									<div class="show_field mt-3" style="display: none">
										<span>Bkash : 01222236582 </span>
										<input type="text" name="transcation_no" class="form-control" placeholder="Enter transcation no" >
									</div>
								</div>
								<input type="hidden" name="order_total" value="{{ $total }}">
								<div class="col-md-12 mt-2">
									<input class="btn btn-info" type="submit" name="submit" value="Send">
								</div>
								
							</div>
							
						   
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
<script>
    $(document).on('change','#payment_method',function(){
        var payment_method = $(this).val();
        if(payment_method == 'bkash') {
            $('.show_field').show();
        }else{
            $('.show_field').hide();
        }
    });
   
    
</script>   
  @endsection