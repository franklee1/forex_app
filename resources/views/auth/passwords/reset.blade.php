<!DOCTYPE html>
<html lang="en">
<head>
	@include('home/assetss')
</head>

<body class="auth-page">
	
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px;">
				<!-- Logo Starts -->
				<a class="visible-xs" href="{{url('/')}}">
					<img id="logo" class="img-responsive mobile-logo" src="{{ asset('home/images/logo-dark.png')}}" alt="logo">
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>

						<!-- Section Title Starts -->
						<div class="row text-center">

							<h2 class="title-head hidden-xs">Password <span>Reset</span></h2>
							 <p class="info-form">Seamless forex trading with KayFX</p>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                        
						<!-- Form Ends -->
					</div>
				</div>
			
			</div>
		</div>
         <!-- Template JS Files -->
         <script src="{{ asset('home/js/jquery-2.2.4.min.js')}}"></script>
        <script src="{{ asset('home/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('home/js/select2.min.js')}}"></script>
        <script src="{{ asset('home/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('home/js/custom.js')}}"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="{{ asset('home/js/styleswitcher.js')}}"></script>

    </div>
    <!-- Wrapper Ends -->
</body>

</html>

