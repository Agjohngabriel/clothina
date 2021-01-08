@extends('layouts.main')
@section('content')
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('landingPage')}}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a>Search Result</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		@if(session()->has('success_msg'))
            <div class="alert alert-success">
                {{ session()->get('success_msg') }}
            </div>
        @endif
        <div class="alert alert-success">
                <p>{{$products->count()}} result(s) for '{{request()->input('query')}}</p>
        </div>
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										@foreach($varieties as $variety)
											<li><a href="{{route('shop.index', ['variety' => $variety->slug])}}">{{$variety->name}}</a></li>
										@endforeach
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<strong>Sort By :</strong>
											<a href="{{route('shop.index', ['variety' => request()->variety, 'sort' => 'low_high'])}}">Low to High</a> | 
											<a href="{{route('shop.index', ['variety' => request()->variety, 'sort' => 'high_low'])}}">High to Low</a>
											
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
							@forelse($products as $product)
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="{{route('shop.show', $product->slug)}}">
											<img class="default-img" src="{{asset('storage/' . $product->image)}}" alt="{{$product->slug}}">
											<img class="hover-img" src="{{asset('storage/' . $product->image)}}
											" alt="{{$product->slug}}">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="{{route('shop.show', $product->id)}}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
											</div>
											<div class="product-action-2">
												<form action="{{ route('cart.add') }}" method="POST">
                                                    {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                                        <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                                                        <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                                        <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                                        <button type="submit" title="add to cart" onclick="submit">
                                                            <i class="fa fa-shopping-cart"></i> add to cart
                                                        </button>
                                                   </form>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="product-details.html">{{$product->name}}</a></h3>
										<div class="product-price">
											<span>${{Str::currency($product->price)}}</span>
										</div>
									</div>
								</div>
							</div>
							@empty
								<div class="single-product">
								<p style="text-align: center;">No item Found</p>
							</div>
							@endforelse
						</div>
						<div class="single-product">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

		
@endsection