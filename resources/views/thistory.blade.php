@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Today trading history</h3>
				
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

				<!-- TradingView Widget BEGIN -->
				<div class="tradingview-widget-container">
				<div class="tradingview-widget-container__widget"></div>
				<div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Quotes</span> by TradingView</a></div>
				<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
				{
				"symbols": [
					{
					"title": "S&P 500",
					"proName": "INDEX:SPX"
					},
					{
					"title": "Nasdaq 100",
					"proName": "INDEX:IUXX"
					},
					{
					"title": "EUR/USD",
					"proName": "FX_IDC:EURUSD"
					},
					{
					"title": "BTC/USD",
					"proName": "BITFINEX:BTCUSD"
					},
					{
					"title": "ETH/USD",
					"proName": "BITFINEX:ETHUSD"
					}
				],
				"locale": "en"
				}
				</script>
				</div>
				<!-- TradingView Widget END -->

                <a class="btn btn-default" href="#" data-toggle="modal" data-target="#depositModal"><i class="fa fa-plus"></i> New deposit</a>

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>ID</th> 
								<th>Amount</th>
                                <th>Profit/Loss</th>
                                <th>Date created</th>
							</tr> 
						</thead> 
						<tbody> 
						@if(!empty($uplan) and Auth::user()->plan==Auth::user()->confirmed_plan)
							<tr> 
								<th scope="row">{{$id}}</th>
								 <td>{{$settings->currency}}{{$amount}}</td> 
                                 <td>{{$profitloss}}</td> 
								 <td>{{date ('M-d-Y',strtotime($date)) }}</td> 
							</tr> 
						@endif
						</tbody> 
					</table>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')