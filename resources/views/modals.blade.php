			<!-- Deposit Modal -->
			<div id="depositModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Make new deposit</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('HomeController@deposit')}}">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter amount here" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Continue">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /deposit Modal -->


            			<!-- Withdrawal Modal -->
			<div id="withdrawalModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Payment will be sent to your recieving address.</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('HomeController@withdrawal')}}">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter amount here" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /Withdrawals Modal -->

			       			<!-- Plans Modal -->
			<div id="plansModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Add new plan / package</h4>
			      </div>
			      <div class="modal-body">
              <form style="padding:3px;" role="form" method="post" action="{{action('Controller@addplan')}}">
							<label>Plan name</label><br/>	
							<input style="padding:5px;" class="form-control" placeholder="Enter Plan name" type="text" name="name" required><br/>
								 <label>Plan price</label><br/>
								 <input style="padding:5px;" class="form-control" placeholder="Enter Plan price" type="text" name="price" required><br/>
								 <label>Plan expected return (ROI)</label><br/>
								 <input style="padding:5px;" class="form-control" placeholder="Enter expected return for this plan" type="text" name="return" required><br/>						 
															 <label>top up interval</label><br/>
                               <select class="form-control" name="t_interval">
																		<option>Monthly</option>
																		<option>Weekly</option>
																		<option>Daily</option>
																		<option>Hourly</option>
															 </select><br>
															 <label>top up type</label><br/>
                               <select class="form-control" name="t_type">
																		<option>Percentage</option>
																		<option>Fixed</option>
															 </select><br>
															 <label>top up amount (in % or $ as specified above)</label><br/>
															 <input style="padding:5px;" class="form-control" placeholder="top up amount" type="text" name="t_amount" required><br/>
															 <label>Investment duration</label><br/>
                               <select class="form-control" name="expiration">
																		<option>One week</option>
																		<option>One month</option>
																		<option>Six months</option>
																		<option>One year</option>
															 </select><br>
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /plans Modal -->
