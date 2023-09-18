<!doctype html>
<html class="no-js"  lang="en">

	<head>
		<!-- META DATA -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<!-- TITLE OF SITE -->
		<title>Likupang</title>

		<!-- favicon img -->
		<link rel="shortcut icon" type="image/icon" href="{{ asset('assets/logo/favicon.png') }}"/>

		<!--font-awesome.min.css-->
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

		<!--animate.css-->
		<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />

		<!--hover.css-->
		<link rel="stylesheet" href="{{ asset('assets/css/hover-min.css') }}" />

		<!--datepicker.css-->
		<link rel="stylesheet"  href="{{ asset('assets/css/datepicker.css') }}" />

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}"/>

		<!-- range css-->
        <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />

		<!-- bootsnav -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css') }}"/>

		<!--style.css-->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

		<!--responsive.css-->
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

        <style>
            .line-blue{
                width:200px;
                border:2px solid #00a8a8;
                border-radius:10px;
                transition:.2s;
                margin:20px auto;
            }
            .line-blue:hover{
                width:250px;
                border:2px solid #005353;
            }
            a:hover{
                text-decoration: none;	
            }
			a{
				text-decoration: none;
			}
        </style>
	</head>

	<body>
		<!-- main-menu Start -->
        @include('layouts.partials.navbar')
		<!-- main-menu End -->
        @yield('content')
		<!-- footer-copyright start -->
		@include('layouts.partials.footer')
		<!-- footer-copyright end -->

		<script src="{{ asset('assets/js/jquery.js') }}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!--modernizr.min.js-->
		<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


		<!--bootstrap.min.js-->
		<script  src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<!-- bootsnav js -->
		<script src="{{ asset('assets/js/bootsnav.js') }}"></script>

		<!-- jquery.filterizr.min.js -->
		<script src="{{ asset('assets/js/jquery.filterizr.min.js') }}"></script>

		<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!--jquery-ui.min.js-->
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

        <!-- counter js -->
		<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

		<!--owl.carousel.js-->
        <script  src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

        <!-- jquery.sticky.js -->
		<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

        <!--datepicker.js-->
        <script  src="{{ asset('assets/js/datepicker.js') }}"></script>

		<!--Custom JS-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


	</body>

</html>