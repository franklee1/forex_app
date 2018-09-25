@include('header')
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div class="col-lg-5 col-md-5 col-sm-5" style="margin-bottom:5px; padding:0px;">
						<h3 style="color:#555;">Dashboard</h3>				
					</div>
				</div>

				<div class="sign-u" style="background-color:#fff; padding:0px 15px 5px 15px;">
						<div class="sign-up1">
							<h4><i class="fa fa-bell"></i> {{$settings->update}}</h4>
						</div>
					<div class="clearfix"> </div>
				</div>

				
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


				<div class="row-one" style="margin-top:10px;">
					<div class="col-md-3 rp">
						<h4>
							@if(!empty(Auth::user()->confirmed_plan) and 7-\Carbon\Carbon::parse(Auth::user()->activated_at)->diffInDays()<1)
							<span style="color:green;" title="Due to withdraw">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</span> <br>
							<small>Current earnings</small>
							@else
							<span style="color:red;" title="Awaiting due date">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</span><br>
							<small>Current earnings</small>
							@endif
						</h4>
					</div>	

					<div class="col-md-3 col-md-offset-1 rp">
					@if(!empty($uplan) and Auth::user()->plan==Auth::user()->confirmed_plan and $settings->trade_mode=='on')
						<h4>{{$settings->currency}}{{$last_profit}}<i class="fa fa-arrow-up" style="color:green; font-size:12px;"></i><br><small>Last trade profit</small></h4>
					@else
					<h4>{{$settings->currency}}0<i class="fa fa-arrow-up" style="color:green; font-size:12px;"></i><br><small>Last trade profit</small></h4>
					@endif
					</div>
						
					
					@if(empty($uplan))
					<div class="col-md-3 col-md-offset-1 rp" style="text-align:center; color:#fa3425;">
					<h4>Activate account!<br>
					<small>
					<a style="background-color:#fa3425; color:#fff; padding:4px;" href="{{ url('dashboard/mplans') }}">Join a plan</a> 
					</small>
					</h4>
					</div>
					@else
					<div class="col-md-3 col-md-offset-1 rp">
						<h4><strong>{{$uplan->name}}</strong> <br>
							<small>Investment plan
							@if(Auth::user()->plan==Auth::user()->confirmed_plan) 
							<i title="Active" style="color:green;" class="glyphicon glyphicon-ok"></i>
							@else
							<i title="Needs activation" style="color:red;" class="fa fa-info-circle"></i>
							@endif
							</small>
						</h4>
					</div>
					@endif					
				</div>
				
				<div class="clearfix"> </div>
			</div>
			
			<div id="chart-page">
                @include('chart')
        	</div>
		</div>	
	@include('footer')
	