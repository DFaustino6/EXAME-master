	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Animal Shelter : register</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('resources/assets/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('resources/assets/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('resources/assets/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('resources/assets/css/nice-select.css')}}">							
			<link rel="stylesheet" href="{{asset('resources/assets/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('resources/assets/css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{asset('resources/assets/css/main.css')}}">
		</head>
		<body>
			  <header id="header" id="home">
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="{{action('Shelter@index')}}"><img src="{{asset('resources/assets/img/logo.png')}}" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="{{action('Shelter@register')}}">Register</a></li>
				          <li><a href="{{action('Shelter@login')}}">Login</a></li>						  		              
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Register			
							</h1>	
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start Volunteer-form Area -->
			<section class="Volunteer-form-area section-gap">
				<div class="container">
					
					<div class="row justify-content-center">
						<form class="col-lg-9" action="{{action('Shelter@register_action')}}" method="POST">
						  <div class="form-group">
						    <label for="first-name">Name</label>
						    <input name="Username" type="text" class="form-control" placeholder="Name" value="{{old('Username')}}"required autofocus>
						  </div>
						   <div class="form-group">
								<label for="email">Email Address</label>
						   		<input name="Email" type="email" class="form-control" placeholder="Valid email Address" value="{{old('Email')}}" required>
							</div>	
						  
						  <div class="form-row"> 							  	
						  	<div class="col-6 mb-30">
						  		<label for="password1">Password</label>
						   		<input name="Pwd" type="password" class="form-control" placeholder="Password" required>
						  	</div>
						  	<div class="col-6 mb-30">
						  		<label for="password2">Confirm Password</label>
						   		<input name="ConfPwd" type="password" class="form-control" placeholder="Repeat Password" required>						  		
						  	</div>
						  </div>		
						  
						  <button type="submit" class="primary-btn float-right">Submit</button>
						  <div>
						  @if($errors->any())
						    <div class="card-body text-center" style="background-color: #ff9d9d;border-radius:5px">
							@foreach ($errors->all() as $error)
								<h5 style="color: red;">{{$error}}</h5>
							@endforeach
							</div>
						  @endif
						  </div>
						  <input type="hidden" name="_token" value="{{ csrf_token() }}">
						</form>
					</div>
				</div>	
			</section>
			<!-- End Volunteer-form Area -->
																							
			<!-- start footer Area -->		
			<footer class="footer-area">

				<div class="copyright-text">
					<div class="container">
						<div class="row footer-bottom d-flex justify-content-between">
							<p class="col-lg-8 col-sm-6 footer-text m-0 text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							<div class="col-lg-4 col-sm-6 footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
						</div>						
					</div>
				</div>
			</footer>
			<!-- End footer Area -->	

			<script src="{{asset('resources/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
  			<script src="{{asset('resources/assets/js/easing.min.js')}}"></script>			
			<script src="{{asset('resources/assets/js/hoverIntent.js')}}"></script>
			<script src="{{asset('resources/assets/js/superfish.min.js')}}"></script>	
			<script src="{{asset('resources/assets/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('resources/assets/js/jquery.magnific-popup.min.js')}}"></script>	
			<script src="{{asset('resources/assets/js/owl.carousel.min.js')}}"></script>						
			<script src="{{asset('resources/assets/s/jquery.nice-select.min.js')}}"></script>							
			<script src="{{asset('resources/assets/js/mail-script.js')}}"></script>	
			<script src="{{asset('resources/assets/js/main.js')}}"></script>	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>	
		</body>
	</html>