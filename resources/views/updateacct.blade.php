@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Add your withdrawal info</h3>
				
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
                
				<div class="sign-up-row widget-shadow">
					<form method="post" action="{{action('UsersController@updateacct')}}">
					
					<h5>Withdrawal account : <small>Ensure you fill in your correct details, you cannot edit this after now.</small></h5>
					@if($settings->payment_mode=="Bank transfer")
						@if(Auth::user()->account_no=="")
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Bank Name* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="bank_name" value="{{Auth::user()->bank_name}}" required>
							</div>
							<div class="clearfix"> </div>
						</div>					
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Account Name* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="account_name" value="{{Auth::user()->account_name}}" required>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Account Number* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="account_number" value="{{Auth::user()->account_no}}" required>
							</div>
							<div class="clearfix"> </div>
						</div>
						@else
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Bank Name* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="bank_name" value="{{Auth::user()->bank_name}}" disabled>
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Account Name* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="account_name" value="{{Auth::user()->account_name}}" disabled>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Account Number* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="account_number" value="{{Auth::user()->account_no}}" disabled>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endif
					@elseif($settings->payment_mode=="BTC")
						@if(Auth::user()->btc_address=="")
						<div class="sign-u">
							<div class="sign-up1">
								<h4>BTC Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="btc_address" value="{{Auth::user()->btc_address}}" required>
							</div>
							<div class="clearfix"> </div>
						</div>
						@else
						<div class="sign-u">
							<div class="sign-up1">
								<h4>BTC Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="btc_address" value="{{Auth::user()->btc_address}}" disabled>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endif
					@elseif($settings->payment_mode=="ETH")
						@if(Auth::user()->eth_address=="")
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Eth Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="eth_address" value="{{Auth::user()->eth_address}}" required>
							</div>
							<div class="clearfix"> </div>
						</div>
						@else
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Eth Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="eth_address" value="{{Auth::user()->eth_address}}" disabled>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endif
					@endif
					
					<div class="sub_home">
						<input type="submit" value="Submit">  &nbsp; &nbsp; 
						<a href="{{ url('dashboard/skip_account') }}" style="color:red;">Skip</a>
						<div class="clearfix"> </div>
					</div>
					<input type="hidden" name="id" value="{{Auth::user()->id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
				</form>
				</div>
			</div>
		</div>
		@include('footer')