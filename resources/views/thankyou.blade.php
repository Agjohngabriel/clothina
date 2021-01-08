@extends('layouts.main')
@section('content')
	<!-- Mail Success-->
	@if(session()->has('success_msg'))
        <div class="alert alert-success">
            {{ session()->get('success_msg') }}
        </div>
    @endif
	<section class="mail-success section page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-12">
					<div class="mail-inner">
						<h2><span>Thank</span> You</h2>
						<p>Thank you so much for your Order. Check Your mail for your receipt</p>
						<div class="button">
							<a class="btn primary" href="{{route('landingPage')}}">Go Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Mail Success -->		
@endsection