@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Set up site basic info</h3>
				
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
					<form method="post" action="{{action('HomeController@updatesettings')}}" enctype="multipart/form-data">
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Site Name* :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" name="site_name" value="{{$settings->site_name}}" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Site Description :</h4>
						</div>
						<div class="sign-up2">
							<textarea name="description" class="form-control" rows="1">{{$settings->description}}</textarea>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Site Title :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" name="site_title" value="{{$settings->site_title}}" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Site Keywords :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" name="keywords" value="{{$settings->keywords}}" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Site URL* :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" name="site_address" value="{{$settings->site_address}}" required>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>My currency:</h4>
						</div>
						<div class="sign-up2">
							<select name="currency" class="form-control" style="height:40px;">
							<option>{{ $settings->currency }}</option>
							@foreach($currencies as $key=>$currency)
							<option value="<?php echo htmlentities($currency); ?>">{{$key .' ('.$currency.')'}}</option>
							@endforeach
						</select>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>Payment mode:</h4>
						</div>
						<div class="sign-up2">
						<select name="payment_mode" class="form-control" style="height:40px;">
							<option>{{ $settings->payment_mode }}</option>
							<option>Bank transfer</option>
							<option>ETH</option>
							<option>BTC</option>
							<option value="PM">Perfect money</option>
						</select>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>BTC address :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" name="btc_address" value="{{$settings->btc_address}}" required>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>Announcement :</h4>
						</div>
						<div class="sign-up2">
							<textarea name="update" class="form-control" rows="1">{{$settings->update}}</textarea>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>Site Logo :</h4>
						</div>
						<div class="sign-up2">
							<input style="padding-bottom:39px;" name="logo" class="form-control" type="file">
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>Referral Commission (%) :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" name="ref_commission" value="{{$settings->referral_commission}}" required>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>Turn on/off trade:</h4>
						</div>
						<div class="sign-up2">
							<input name="trade_mode" id="check" type="checkbox" value="on"> Check to enable trading
						</div>
						<div class="clearfix"> </div>
					</div>

					@if($settings->trade_mode=='on')
						<script>document.getElementById("check").checked= true;</script>
					@endif
					
					<div class="sub_home">
						<input type="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<input type="hidden" name="id" value="1">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
				</form>
				</div>
			</div>
		</div>
		@include('footer')