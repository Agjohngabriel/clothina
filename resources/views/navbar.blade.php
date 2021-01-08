@extends('layouts.main')

@section('content')
<div class="header-bottom-w3ls">
	<div class="container">
		<div class="col-md-7 navigation-agileits">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#navbarSupportedContent">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="nav navbar-nav ">
						<li class=" active"><a href="{{route('landingPage')}}" class="hyper "><span>Home</span></a></li>	
						<li><a href="{{route('shop.index')}}" class="hyper"><span>Shop</span></a></li>
						<li><a href="#" class="hyper"><span>Beauty</span></a></li>
						<li><a href="#" class="hyper"><span>Accessories</span></a></li>
						<li><a href="about.html" class="hyper"><span>About</span></a></li>
						<li><a href="contact.html" class="hyper"><span>Contact Us</span></a></li>
						<!-- <li>
							<a href="{{route('cart.index')}}" class="hyper">Cart
								<span style="color:red;"><sup>{{ \Cart::getTotalQuantity()}}</sup></span>
							</a>
						</li> -->
						<li>
            				<a class="nav-link waves-effect">
              					<span class="badge red z-depth-1 mr-1">{{ \Cart::getTotalQuantity()}}</span>
				              <i class="fa fa-shopping-cart"></i><span> Cart </span>
				            </a>
				          </li>
					</ul>
				</div>
			</nav>
		</div>
				
				<div class="col-md-5 search-agileinfo">
					<div class="contain">
  						<input type="text" placeholder="Search...">
  						<div class="search"></div>
					</div>
</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection