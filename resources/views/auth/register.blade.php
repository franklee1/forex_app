<!DOCTYPE html>
<html lang="en">
<head>
	@include('home/assetss')
</head>

<body class="auth-page" style="background-color:#f8f8f8;">
	
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container user-auth" style="padding:20px;">
			<div class="row">
			<div class="col-sm-5 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-md-5 col-lg-5">
				<!-- Logo Starts -->
				<a class="visible-xs" href="{{url('/')}}" style="text-align:center; color:#555;">
				<h3>{{$settings->site_name}}</h3>
				<!-- <img id="logo" class="img-responsive" src="{{ asset('images/'.$settings->logo)}}" alt="logo">-->
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h3 class="title-head" style="font-size:1.5em; color:#555;">member registration</h3>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						<form  class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{csrf_field()}}   
                        <!-- Input Field Starts -->
							<div class="form-group">
								<input style="background:transparent; color:#555;" class="form-control" id="name" placeholder="ENTER YOUR FULL NAME" name="name" type="text" value="{{ old('name') }}" required autofocus>
                            
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
							<!-- Input Field Ends -->
                        
                        <!-- Input Field Starts -->
							<div class="form-group">
								<input style="background:transparent; color:#555;" class="form-control" id="email" placeholder="ENTER YOUR EMAIL" name="email" type="email" value="{{ old('email') }}" required>
                            
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
								<input style="background:transparent; color:#555;" class="form-control" id="password" name="password" id="password" placeholder="ENTER PASSWORD" type="password" required>
							</div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
							<div class="form-group">
								<input style="background:transparent; color:#555;" class="form-control" id="password" placeholder="RE-ENTER YOUR PASSWORD" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required>
                                
							</div>
							<!-- Input Field Ends -->
                            <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" value="{{$user_country}}" name="country" type="text" disabled style="background:transparent; color:#555;">
                            </div>
							<!-- Input Field Ends -->

							 <!-- Input Field Starts -->
							 <!--<div class="form-group">
								<input name="sign" type="checkbox"  required> 
								I have read and agreed to the <a href="{{ route('terms') }}">Terms of Service</a> and 
								<a href="{{ route('privacy') }}">Privacy Policy</a>
                            </div>-->
							<!-- Input Field Ends -->

							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Create account</button>
                                
								<p class="text-center">Already a member?  <a href="{{route('login')}}">Login now</a></p>
							</div>
							<!-- Submit Form Button Ends -->
                        </form>
                        
						<!-- Form Ends -->
					</div>
				</div>
				<!-- Copyright Text Starts -->
				<p class="text-center copyright-text">Copyright © 2018 {{$settings->site_name}} All Rights Reserved</p>
				<!-- Copyright Text Ends -->
			</div>
			</div>
		</div>

    </div>
    <!-- Wrapper Ends -->
</body>

</html>

