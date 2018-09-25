<!DOCTYPE HTML>
<html>
<head>
<title>{{$settings->site_name}} | {{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('js/modernizr.custom.js')}}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{ asset('css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<style>
	.custom_card {
		/* Add shadows to create the "card" effect */
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		transition: 0.3s;
	}

	/* On mouse-over, add a deeper shadow */
	.custom_card:hover {
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
	}

	/* Add some padding inside the card container */
	.custom_container {
		padding: 2px 16px;
	}
	.custom_button {
		border: none;
		outline: 0;
		display: inline-block;
		padding: 8px;
		color: white;
		background-color: #000;
		text-align: center;
		cursor: pointer;
		width: 100%;
		font-size: 18px;
	}
    /* Style the tab */
    .custom_tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .custom_tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .custom_tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .custom_tab button.active {
        background-color: #ccc;
    }

    /* Style the custom_tab content */
    .custom_tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        animation: fadeEffect 1s; /* Fading effect takes 1 second */
    }

    @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    .custom_table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    .custom_table th, .custom_table td {
        text-align: center;
        padding: 16px;
    }

    .custom_table th:first-child, .custom_table td:first-child {
        text-align: left;
    }

    .custom_table tr:nth-child(even) {
        background-color: #f2f2f2
    }

    .fa-check {
        color: green;
    }

    .fa-remove {
        color: red;
    }
</style>
<script src="{{ asset('js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->

<!-- Metis Menu -->
<script src="{{ asset('js/metisMenu.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<link href="{{ asset('css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	
<!-- facebook sdk -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=642791809168417";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- /facebook sdk -->

	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="{{ url('/dashboard') }}" class="active"><i class="fa fa-dashboard nav_icon"></i>Dashboard</a>
						</li>
						
						<li class="">
							<a href="#"><i class="fa fa-user nav_icon"></i>Account <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="{{ url('dashboard/changepassword') }}">Change Password</a>
									<a href="{{ url('dashboard/accountdetails') }}">Update Account</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>

						@if(Auth::user()->type =='0')
						
						<li>
							<a href="{{ url('dashboard/support') }}"><i class="fa fa-ticket nav_icon"></i>Support</a>
						</li>

						<li>
							<a href="{{ url('dashboard/signals') }}"><i class="fa fa-ticket nav_icon"></i>Free Signals</a>
						</li>

						<li>
							<a href="{{ url('dashboard/deposits') }}"><i class="fa fa-money nav_icon"></i>Deposits</a>
						</li>

						<li>
							<a href="{{ url('dashboard/withdrawals') }}"><i class="fa fa-dollar nav_icon"></i>Withdrawals</a>
						</li>

						<li>
							<a href="{{ url('dashboard/mplans') }}"><i class="fa fa-cog nav_icon"></i>Investment plans</a>
						</li>

						@endif
						
						@if(Auth::user()->type =='1' or Auth::user()->type =='2')
						<li>
							<a href="{{ url('dashboard/plans') }}"><i class="fa fa-cog nav_icon"></i>Investment plans</a>
						</li>

						<li>
							<a href="{{ url('dashboard/manageusers') }}"><i class="fa fa-users nav_icon"></i>Manage users</a>
						</li>
						<li>
							<a href="{{ url('dashboard/mwithdrawals') }}"><i class="fa fa-th-list nav_icon"></i>Manage withdrawals</a>
						</li>
						<li>
							<a href="{{ url('dashboard/mdeposits') }}"><i class="fa fa-money nav_icon"></i>Deposits</a>
						</li>
						<li>
							<a href="{{ url('dashboard/settings') }}"><i class="fa fa-gear nav_icon"></i>Settings</a>
						</li>

						<li>
							<a href="{{ url('dashboard/agents') }}"><i class="fa fa-users nav_icon"></i>View Agents</a>
						</li>
						
						@endif
						
					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo" style="padding:6px; width:200px;">
					<a href="{{ url('/') }}" style="padding-left:15px !important;">
						<h4>{{$settings->site_name}}</h4>
						
					</a>
				</div>
				<!--//logo-->
				
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details" style="padding:8px; margin-top:15px;">		
					<a href="{{ url('dashboard') }}"><span class="prfil-img"><img style="width:30px; height:30px; border-radius:100%;" src="{{asset('images/'.Auth::user()->photo)}}" alt=""> </span> {{ Auth::user()->name }}</a>
					| <a href="{{ url('dashboard/changepassword') }}"><i class="fa fa-key"></i> Change Password</a>
					| <a href="{{ url('dashboard/accountdetails') }}"><i class="fa fa-edit"></i> Update Account</a>
					| <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    	</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->