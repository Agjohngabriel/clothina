<!-- Header -->
		<header class="header shop">
			<!-- Topbar -->
			<div class="topbar">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-4 col-md-12 col-12">
	                        <!-- Top Left -->
	                        <div class="top-left">
	                            <ul class="list-main">
	                                <li><i class="ti-headphone-alt"></i> +(63) 961 624 1132</li>
	                                <li><i class="ti-email"></i> support@clothinaph.com</li>
	                            </ul>
	                        </div>
	                        <!--/ End Top Left -->
	                    </div>
	                    <div class="col-lg-8 col-md-12 col-12">
	                        <!-- Top Right -->
	                        <div class="right-content">
	                            <ul class="list-main">
                                <li><i class="ti-location-pin"></i> <a href="{{route('contact')}}">Store location</a></li>
                                <!-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> -->
                                @guest
                                    <li>
                                        <i class="ti-power-off"></i>
                                        <a href="{{route('login')}}">Login</a>
                                    </li>
                                    <li>
                                        <i class="ti-power-off"></i>
                                        <a href="{{route('register')}}">Register</a>
                                    </li>
                                @else
                                	<li><i class="ti-user"></i> <a href="#">Dashboard</a></li>
                                    <li><i class="ti-power-off"></i>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                             Logout
                                         </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                @endguest  
                            </ul>
	                        </div>
	                        <!-- End Top Right -->
	                    </div>
	                </div>
	            </div>
	        </div>
			<!-- End Topbar -->
			<div class="middle-inner">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-2 col-md-2 col-12">
	                        <!-- Logo -->
	                        <div class="logo">
	                            <a href="{{route('landingPage')}}"><img src="images/logo9.png" alt="logo" style="width: 300px; height: 32px;"></a>
	                        </div>
	                        <!--/ End Logo -->
	                         <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form method="POST" action="{{route('searchProduct')}}" class="search-form">
                                    @csrf
                                    <input type="text" placeholder="Search here..." name="query" value="{{request()->input('query')}}">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <form method="POST" action="{{route('searchProduct')}}">
                                @csrf
                                <div class="search-bar">
                                    <select name="variety">
                                        <option>All Category</option>
                                        @foreach($varieties as $variety)
                                            <option value="{{$variety->name}}">{{$variety->name}}</option>
                                        @endforeach
                                    </select>
                                    <input name="query" type="text" placeholder="Search Products here ...." value="{{request()->input('query')}}">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
	                    <div class="col-lg-2 col-md-3 col-12">
	                        <div class="right-bar">
	                            <!-- Search Form -->
	                            <div class="sinlge-bar">
	                                <!-- <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a> -->
	                            </div>
	                            <div class="sinlge-bar">
	                                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
	                            </div>
	                            <div class="sinlge-bar shopping">
	                                <a href="#" class="single-icon"><i class="fa fa-shopping-cart"></i> <span class="total-count">{{ \Cart::getTotalQuantity()}}</span></a>
	                                <!-- Shopping Item -->
	                                <div class="shopping-item">
	                                    <div class="dropdown-cart-header">
	                                        <span>{{ \Cart::getTotalQuantity()}} Items</span>
	                                        <a href="{{route('cart.index')}}">View Cart</a>
	                                    </div>
	                                    @if(count(\Cart::getContent()) > 0)
	                                    <ul class="shopping-list">
	                                        @foreach(\Cart::getContent() as $item)
	                                        <li>
	                                            <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
	                                            <a class="cart-img" href="#"><img src="{{asset('storage/' . $item->model->image)}}" alt="{{$item->model->slug}}"></a>
	                                            <h4><a href="#">{{$item->name}}</a></h4>
	                                            <p class="quantity">{{$item->quantity}} - <span class="amount">${{Str::currency(\Cart::get($item->id)->getPriceSum()) }}</span></p>
	                                        </li>
	                                        @endforeach
	                                    </ul>
	                                    <div class="bottom">
	                                        <div class="total">
	                                            <span>Total</span>
	                                            <span class="total-amount">${{ Str::currency(\Cart::getTotal()) }}</span>
	                                        </div>
	                                        <a href="{{route('cart.clear')}}" class="btn animate">Empty Cart</a>
	                                        <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
	                                    </div>
	                                    @else
	                                        <li class="list-group-item">Your Cart is Empty</li>
	                                        <div class="bottom">
	                                        	<div class="total">
	                                        		<a  href="{{route('shop.index')}}" class="btn animate"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
	                                        	</div>
	                                        </div>
	                                    @endif
	                                </div>
	                                <!--/ End Shopping Item -->
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
        	</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="{{route('landingPage')}}">Home</a></li>
													<li><a href="{{route('about')}}">About Us</a></li>
													<li><a href="{{route('shop.index')}}">Shop</a></li>
													<li><a href="#">Service</a></li>
													<li><a href="{{route('contact')}}">Contact Us</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->
		