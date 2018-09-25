@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Your deposits</h3>
				
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

                <a class="btn btn-default" href="#" data-toggle="modal" data-target="#withdrawalModal"><i class="fa fa-plus"></i> Request withdrawal</a>

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>ID</th> 
								<th>Amount</th>
                                <th>Recieving mode</th>
								<th>Status</th> 
                                <th>Date created</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($withdrawals as $withdrawal)
							<tr> 
								<th scope="row">{{$withdrawal->id}}</th>
								 <td>{{$withdrawal->amount}}</td> 
								 <td>{{$withdrawal->payment_mode}}</td> 
                                 <td>{{$withdrawal->status}}</td> 
								 <td>{{$withdrawal->created_at}}</td> 
							</tr> 
							@endforeach
						</tbody> 
					</table>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')