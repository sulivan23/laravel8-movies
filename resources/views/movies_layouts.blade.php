<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>{{ $title }}</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="{{ url('movies_themes') }}/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{ url('css') }}/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>
	<body>
		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="{{ url('') }}" id="branding">
						<img src="{{ url('movies_themes') }}/images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">{{__("messages.web_title")}}</h1>
							<small class="site-description">{{__("messages.web_desc")}}</small>
						</div>
					</a> <!-- #branding -->
					

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							@if(session()->has('is_loggedin') == false)
								<li class="menu-item"><a href="{{ url('') }}">{{__("messages.login")}}</a></li>
							@endif
							@if(session()->has('is_loggedin') == true)
								<li class="menu-item"><a href="{{ url('movies') }}">{{__("messages.list_movie")}}</a></li>
								<li class="menu-item"><a href="{{ url('favorit_movies') }}">{{__("messages.fav_movie")}}</a></li>
								<li class="menu-item"><a href="{{ url('logout') }}">{{ __("messages.logout") }}</a></li>
							@endif
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
					
				</div>
			</header>
        
            @yield('content')

			<footer class="site-footer">
				<div class="container" style="text-align:center">
					<div class="filters">
						<form class="search-form">
							<select id="language">
								<option value="en" {{ session('lang_code') == 'en' ? 'selected' : null }}>English</option>
								<option value="id" {{ session('lang_code') == 'id' ? 'selected' : null }}>Indonesia</option>
							</select>
						</form>
					</div>
					{!! '<p class="">Copyright &copy;'. date('Y'). ' All Rights Reserved by Irvan Sulistio</p>' !!}
				</div> <!-- .container -->
			</footer>
		</div>
		<!-- Default snippet for navigation -->		
		<script>
			var token_access =  "{{ session('token_access') }}";
			var url = "{{ url('') }}";
		</script>
		<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script src="{{ url('movies_themes') }}/js/plugins.js"></script>
		<script src="{{ url('movies_themes') }}/js/app.js"></script>
		<!-- SweetAlert -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
		<!-- Lazy Load -->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
		<!-- Custom JS -->
		<script src="{{ url('') }}/js/movie.js"></script>
	</body>
</html>