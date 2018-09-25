@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				
				@if(Session::has('message'))
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif

                @if(count($errors) > 0)
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach ($errors->all() as $error)
                            <i class="fa fa-warning"></i> {{ $error }}
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

					<div class="sign-u" style="background-color:#fff; padding:20px;">
						<div class="sign-up1">
							<h4>You are to make payment of <strong>{{$settings->currency}}{{$amount}}.</strong> Contact the address below. for payment details</h4>
							<div class="alert alert-danger alert-dismissable">
							<h4>Contact crediting agent at <strong>Deposit@ultradeoptions.com</strong> for payment methods.</h4>
							</div>							
						</div>
						<div class="clearfix"> </div>
					</div>
				
					<form method="post" action="{{action('HomeController@savedeposit')}}" enctype="multipart/form-data" style="background-color:#fff; padding:20px; margin-top:10px;">
					<div class="sign-u">
						<div class="sign-up1">
							<label>Upload Payment proof after payment.</label>
						</div>
						<div class="sign-up2">
							<input type="file" name="proof" required>
						</div>
						<div class="clearfix"> </div>
					</div><br>

					<div class="sub_home">
						<input type="submit" class="btn btn-default" value="Submit payment">
						<div class="clearfix"> </div>
					</div>
					<input type="hidden" name="amount" value="{{$amount}}">
					<input type="hidden" name="pay_type" value="{{$pay_type}}">
					<input type="hidden" name="plan_id" value="{{$plan_id}}">
					<input type="hidden" name="payment_mode" value="{{$payment_mode}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
				</form>
			</div>
		</div>
		@include('footer')