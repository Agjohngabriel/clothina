@extends('layouts.main')
@section('content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
		@if(session()->has('success_msg'))
            <div class="alert alert-success">
                {{ session()->get('success_msg') }}
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					@if(\Cart::getTotalQuantity()>0)
                    	<h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
                    	<a href="{{route('cart.clear')}}" class="continue">Empty Cart</a>
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
			   				@foreach($cartCollection as $item)
							<tr>
								<td class="image" data-title="No"><img src="{{asset('storage/' . $item->model->image)}}" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></p>
									<p class="product-des">{{$item->model->details}}</p>
								</td>
								<td class="price" data-title="Price"><span>${{Str::currency($item->price)}} </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="{{$item->quantity}}">
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>${{Str::currency($item->price * $item->quantity)}}</span></td>
								<td class="action" data-title="Remove">
									<form method="POST" action="{{route('cart.remove')}}">
										@csrf
										<input type="hidden" name="id" value="{{$item->id}}">
										<button type="submit"><i class="ti-trash remove-icon"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									@if(!session()->has('coupon'))
										<div class="coupon">
											<form action="{{route('coupon.store')}}" method="POST">
												@csrf
												<input type="text" name="coupon_code" id="coupon_code" placeholder="Enter Your Coupon">
												<button class="btn">Apply</button>
											</form>
										</div>
									@endif
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>${{Str::currency(Cart::getsubtotal())}}</span></li>
										@if(session()->has('coupon'))
											<li>Discount({{ session()->get('coupon')['name']}}) 
												<form method="POST" action="{{route('coupon.destroy')}}" style="display: inline;">
													@csrf
													{{ method_field('delete')}}
													<button type="submit" ><i class="ti-trash remove-icon"></i></button>
												</form>
												<span>${{ Str::currency($discount)}}</span>
											</li>
											<li>New Subtotal<span>${{ Str::currency($newSubtotal)}}</span></li>
										@endif
										<li class="last">Total<span>${{Str::currency($newTotal)}}</span></li>
									</ul>
									<div class="button5">
										<a href="{{route('checkout')}}" class="btn">Checkout</a>
										<a href="{{route('shop.index')}}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
			@else
                <h4>No Product(s) In Your Cart</h4><br>
                <div class="button5">
					<a href="{{route('shop.index')}}" class="btn">Continue shopping</a>
				</div>
            @endif
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section><br><br>
	<!-- End Shop Newsletter -->
@endsection