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

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-6 col-md-offset-4">
                            <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
