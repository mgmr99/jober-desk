<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Jober Desk</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- All Plugin Css --> 
	    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
		
		<!-- Style & Common Css --> 
		<link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        @notifyCss
    </head>
    <body> 	
    <nav class="navbar navbar-default navbar-sticky bootsnav">

        <div class="container">      
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}"><img src="img/logo.png" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    @can('read_job')
                    <li><a href="{{ route('user.home') }}">Home</a></li> 
                    @endcan
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse</a>
                            <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                                <li class="active">
                                    @if (Auth::user())
                                            <a href="{{ route('user.jobs') }}">Browse Jobs</a></li>
                                        @else
                                            <a href="{{ route('user.login') }}">Browse Jobs</a></li>
                                    @endif
                                {{-- <li><a href="company-detail.html">Job Detail</a></li> --}}
                                <li><a href="resume.html">Resume Detail</a></li>
                            </ul>
                        </li>
                           @if (Auth::check())
                                <li><a href="{{ route('user.companies') }}">Companies</a></li> 
                               <li><a href="{{ route('user.logout') }}">Logout</a></li>
                               @else
                                 <li><a href="{{ route('user.login') }}">Login</a></li>
                                 <li>
                                    <a href="{{ route('user.register') }}">Register</a>
                                </li> 
                           @endif   
                                            
                    </ul>
            </div><!-- /.navbar-collapse -->
        </div>   
    @include('notify::components.notify')
    </nav>
        @yield('content')
    
        <!-- footer start -->
    <footer>
        <div class="container">
            <div class="col-md-3 col-sm-6">
                <h4>Featured Job</h4>
                <ul>
                    <li><a href="{{ route('user.jobs') }}">Browse Jobs</a></li>
                    <li><a href="{{ route('user.report') }}">Report a Problem</a></li>
                    <li><a href="#">Jobs by Skill</a></li>
                </ul>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <h4>Latest Job</h4>
                <ul>
                    <li><a href="#">Browse Jobs</a></li>
                    <li><a href="#">Premium MBA Jobs</a></li>
                    <li><a href="#">Access Database</a></li>
                    <li><a href="#">Manage Responses</a></li>
                    <li><a href="#">Report a Problem</a></li>
                    <li><a href="#">Mobile Site</a></li>
                    <li><a href="#">Jobs by Skill</a></li>
                </ul>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <h4>Reach Us</h4>
                <address>
                <ul>
                <li>Sankhamool-19<br>
                Nepal</li>
                <li>Email: info@jobdesk.com</li>
                <li>Call: 091-87678765</li>
                <li>Skype: job@skype</li>
                <li>FAX: 123 456 85</li>
                </ul>
                </address>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <h4>Drop A Mail</h4>
                <form>
                    <input type="text" class="form-control input-lg" placeholder="Your Name">
                    <input type="text" class="form-control input-lg" placeholder="Email...">
                    <textarea class="form-control" placeholder="Message"></textarea>
                    <button type="submit" class="btn btn-primary">Message</button>
                </form>
            </div>
            
            
        </div>
        <div class="copy-right">
        <p>&copy;Copyright 2023 Jober Desk | Design By <a href="#">Jober-Desk</a></p>
        </div>
    </footer>
    <!-- Modal Container -->
		<div id="flash-message-modal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-top-right">
				<div class="modal-content">
					<!-- Message content will be inserted here dynamically -->
				</div>
			</div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/bootsnav.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @notifyJs
</body>
</html>