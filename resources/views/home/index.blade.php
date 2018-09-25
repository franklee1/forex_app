
@include('home.assets')
		<div class="w3layouts-banner-info">
			<div class="container">
				<div class="w3layouts-banner-slider">
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>
									<div class="agileits-banner-info">
										<h3>Trade in the moment Invest in the future</h3>
										<p>Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. </p>
									</div>
								</li>
								<li>
									<div class="agileits-banner-info">
										<h3>Trade over 250 cryptocurrencies from one account</h3>
										<p>Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. </p>
									</div>
								</li>
								<li>
									<div class="agileits-banner-info">
										<h3>We process withdrawal requests promptly.</h3>
										<p>Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. </p>
									</div>
								</li>
								<li>
									<div class="agileits-banner-info">
										<h3>Trade on the best binary option platform.</h3>
										<p>Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. </p>
									</div>
								</li>
							</ul>
						</div>
						<script src="{{asset('home/js/responsiveslides.min.js')}}"></script>
						<script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 4
							  $("#slider4").responsiveSlides({
								auto: true,
								pager:true,
								nav:false,
								speed: 500,
								namespace: "callbacks",
								before: function () {
								  $('.events').append("<li>before event fired.</li>");
								},
								after: function () {
								  $('.events').append("<li>after event fired.</li>");
								}
							  });
						
							});
						 </script>
						<!--banner Slider starts Here-->
					</div>
				</div>
			</div>
		</div>
		<div class="bounce animated">
			<a href="#welcome" class="scroll">
				<div class="mouse"></div>
			</a>
		</div>
	</div>
	<!-- //banner -->
	<!-- welcome -->
	<div class="welcome" id="welcome">
		<div class="container">
			<div class="w3-welcome-heading">
				<h2>Welcome</h2>
			</div>
			<div class="w3l-welcome-info">
				<div class="col-sm-6 welcome-grids">
					<div class="welcome-img">
						<img src="{{asset('home/images/4.jpg')}}" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 welcome-grids">
					<div class="welcome-img">
						<img src="{{asset('home/images/6.jpg')}}" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3l-welcome-text">
				<p>Nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus omnis optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae </p>
			</div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- about -->
	<div class="about" id="about">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>About Us</h3>
			</div>
			<div class="w3ls-about-grids">
				<div class="col-md-6 about-right">
					<img src="{{asset('home/images/9.jpg')}}" alt="">
				</div>
				<div class="col-md-6 about-left"> 
					<h4>Sed tincidunt lorem </h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt lorem sed velit fermentum lobortis, eget placerat mauris sed lectus tellus
					<span> Fusce eu semper lacus, sodales id elit a, feugiat porttitor nulla. Sed porta magna vitae nisl vulputate lacinia.</span></p>
					<ul> 
						<li><span class="glyphicon glyphicon-share-alt"></span> Duis aute irure dolor in reprehenderit voluptate </li>
						<li><span class="glyphicon glyphicon-share-alt"></span> Excepteur sint occaecat cupidatat non proident</li>
						<li><span class="glyphicon glyphicon-share-alt"></span> Sunt in culpa qui officia deserunt mollit </li>
						<li><span class="glyphicon glyphicon-share-alt"></span> Duis aute irure dolor in reprehenderit voluptate </li>
						<li><span class="glyphicon glyphicon-share-alt"></span> Excepteur sint occaecat cupidatat non proident</li> 
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- services -->
	<div class="services" id="services">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Payment methods</h3>
			</div>
			<div class="agileits-services-grids">
				<div class="col-md-8 agileits-services-left">
					<h4>At a glance</h4>
					<div class="agileits-services-text">
						<p>Nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus omnis optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.</p>
					</div>
					<div class="credit-grids">
						<h5>Credit Cards:</h5>
						<div class="credit-grid-left">
							<div class="credit-grid">
								<img src="{{asset('home/images/c2.jpg')}}" alt="" />
								<h6>Visa</h6>
								<p>Nam libero tempore cum soluta nobis est</p>
							</div>
							<div class="credit-grid">
								<img src="{{asset('home/images/c3.jpg')}}" alt="" />
								<h6>MasterCard</h6>
								<p>Nam libero tempore cum soluta nobis est</p>
							</div>
							<div class="credit-grid">
								<img src="{{asset('home/images/c4.jpg')}}" alt="" />
								<h6>MasterCard</h6>
								<p>Nam libero tempore cum soluta nobis est</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="credit-grids debit-grids">
						<h5>Debit Cards:</h5>
						<div class="debit-grids-text">
							<p>Morbi nec justo ut ex rhoncus luctus. Duis id ex egestas, tempus lorem sed, porta urna. Duis sodales eleifend laoreet. Vestibulum luctus venenatis massa, in vulputate mi porta ac.</p>
						</div>
						<div class="w3-services-grids">
							<div class="col-md-4 w3l-services-grid">
								<div class="w3ls-services-img">
									<i class="fa fa-money" aria-hidden="true"></i>
								</div>
								<div class="agileits-services-info">
									<h4>Praesent tempor</h4>
								</div>
							</div>
							<div class="col-md-4 w3l-services-grid">
								<div class="w3ls-services-img">
									<i class="fa fa-credit-card" aria-hidden="true"></i>
								</div>
								<div class="agileits-services-info">
									<h4>Praesent tempor</h4>
								</div>
							</div>
							<div class="col-md-4 w3l-services-grid">
								<div class="w3ls-services-img">
									<i class="fa fa-line-chart" aria-hidden="true"></i>
								</div>
								<div class="agileits-services-info">
									<h4>Praesent tempor</h4>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileits-services-right">
					<h4>Recent withdrawals</h4>
					<div class="services-two-grids">
						<div class="agileinfo-services-right">
							<img src="{{asset('home/images/10.jpg')}}" alt="" />
							<h6>Maecenas sollicitudin eros lectus, a rutrum nisi vulputate quis. Proin tempus, lectus vitae gravida suscipit</h6>
						</div>
						<!-- date -->
						<div id="design" class="date">
										<div id="cycler">   
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i> Lorem ipsum dolor sit amet,</a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i> Cras vestibulum dapibus <span class="blinking"><img src="images/new.png" alt="" /></span></a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i> Fusce id molestie mauris</a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i> Aliquam vulputate arcu enim <span class="blinking"><img src="images/new.png" alt="" /></span></a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i> Donec ac turpis aliquet</a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i> Morbi nec justo ut ex rhoncus luctus</a>
											</div>
										</div>
										<script>
										function blinker() {
											$('.blinking').fadeOut(500);
											$('.blinking').fadeIn(500);
										}
										setInterval(blinker, 1000);
										</script>
										<script>
											function cycle($item, $cycler){
												setTimeout(cycle, 2000, $item.next(), $cycler);
												
												$item.slideUp(1000,function(){
													$item.appendTo($cycler).show();        
												});
												}
											cycle($('#cycler div:first'),  $('#cycler'));
										</script>
						</div>
						<!-- //date -->
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
	
	<!-- news -->
	<div class="news" id="news">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Our blog posts</h3>
			</div>
			<div class="w3ls-news-grids">
				<div class="news-right">
					<div class="col-md-4 news-right-grid">
						<div class="agile-news-info">
							<img src="{{asset('home/images/n1.jpg')}}" alt=" " class="img-responsive">
							<h4><a href="#" data-toggle="modal" data-target="#myModal">Sunt in culpa qui officia velit</a></h4>
							<span>19th June | 10:00 - 12:00</span>
							<p> Integer interdum eros vitae sem ultrices, sed eleifend tellus tincidunt. Nam nisl arcu, porttitor sit amet</p>
							<div class="agileinfo-news-button">
								<a href="#" class="hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal">More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 news-right-grid">
						<div class="agile-news-info">
							<img src="{{asset('home/images/n2.jpg')}}" alt=" " class="img-responsive">
							<h4><a href="#" data-toggle="modal" data-target="#myModal">Neque porro quisquam est</a></h4>
							<span>24th Sept | 09:00 - 11:00</span>
							<p> Integer interdum eros vitae sem ultrices, sed eleifend tellus tincidunt. Nam nisl arcu, porttitor sit amet</p>
							<div class="agileinfo-news-button">
								<a href="#" class="hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal">More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 news-right-grid">
						<div class="agile-news-info">
							<img src="{{asset('home/images/n3.jpg')}}" alt=" " class="img-responsive">
							<h4><a href="#" data-toggle="modal" data-target="#myModal">Etiam ut nibh quis magna</a></h4>
							<span>04th Oct | 12:00 - 02:00</span>
							<p> Integer interdum eros vitae sem ultrices, sed eleifend tellus tincidunt. Nam nisl arcu, porttitor sit amet</p>
							<div class="agileinfo-news-button">
								<a href="#" class="hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal">More</a>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- modal -->
				<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header"> 
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
								<h4 class="modal-title"><span>Banking</span></h4>
							</div> 
							<div class="modal-body">
								<div class="agileits-w3layouts-info">
									<img src="{{asset('home/images/g2.jpg')}}" alt="" />
									<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. Suspendisse ultrices hendrerit massa. Nam id metus id tellus ultrices ullamcorper.  Cras tempor massa luctus, varius lacus sit amet, blandit lorem. Duis auctor in tortor sed tristique. Proin sed finibus sem.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- //modal --> 
		</div>
	</div>
	<!-- //news -->
	<!-- feedback -->
	<div class="jarallax feedback" id="feedback">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Clients Feedback</h3>
			</div>
			<div class="agileits-feedback-grids">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Sed semper leo metus, a lacinia eros semper at. Etiam sodales orci sit amet vehicula pellentesque. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="{{asset('home/images/f1.jpg')}}" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Mary Jane</h5>
									<p>Vestibulum</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Sed semper leo metus, a lacinia eros semper at. Etiam sodales orci sit amet vehicula pellentesque. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="{{asset('home/images/f2.jpg')}}" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Peter guptill</h5>
									<p>Vestibulum</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Sed semper leo metus, a lacinia eros semper at. Etiam sodales orci sit amet vehicula pellentesque. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="{{asset('home/images/f3.jpg')}}" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Steven Wilson</h5>
									<p>Vestibulum</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Sed semper leo metus, a lacinia eros semper at. Etiam sodales orci sit amet vehicula pellentesque. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="{{asset('home/images/f1.jpg')}}" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Mary Jane</h5>
									<p>Vestibulum</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Sed semper leo metus, a lacinia eros semper at. Etiam sodales orci sit amet vehicula pellentesque. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/f2.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Peter guptill</h5>
									<p>Vestibulum</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Sed semper leo metus, a lacinia eros semper at. Etiam sodales orci sit amet vehicula pellentesque. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/f3.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Steven Wilson</h5>
									<p>Vestibulum</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //feedback -->
	
	<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Contact Us</h3>
			</div>
			<div class="agile-contact-grids">
				<div class="col-md-7 contact-form">
					<form action="{{action('UsersController@sendcontact')}}" method="post">
						<input type="text" name="name" placeholder="Enter your full name" required="">
						<input type="email" class="email" name="email" placeholder="Enter your Email" required="">
						<textarea name="nessage" placeholder="Enter Message" required=""></textarea>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="SUBMIT">
					</form>
				</div>
				<div class="col-md-5 agileits-w3layouts-address">
					<div class="agileits-w3layouts-address-top">
						<h5>Get in touch</h5>
						<ul>
							<li>+1 234 567 8901</li>
							<li>+1 234 567 8902</li>
						</ul>
					</div>
					<div class="agileits-w3layouts-address-top">
						<h5>Address</h5>
						<ul>
							<li>123 Fourth Avenue,</li>
							<li>lacinia eros 98104,</li>
							<li>New Jersey,</li>
							<li>United States.</li>
						</ul>
					</div>
					<div class="agileits-w3layouts-address-top">
						<h5>Email</h5>
						<ul>
							<li><a href="mailto:info@example.com"> mail@example.com</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact -->
	<!-- footer -->
	<div class="jarallax footer">
		<div class="container">
			<div class="footer-logo">
				<h3><a href="/">{{$settings->site_name}}</a></h3>
			</div>
			<div class="agileinfo-social-grids">
				<h4>We are social</h4>
				<div class="border"></div>
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-rss"></i></a></li>
					<li><a href="#"><i class="fa fa-vk"></i></a></li>
				</ul>
			</div>
			<div class="copyright">
				<p>© 2018 {{$settings->site_name}}. All rights reserved</p>
			</div>
		</div>
	</div>
	<!-- //copyright -->
	<script src="{{asset('home/js/jarallax.js')}}"></script>
	<script src="{{asset('home/js/SmoothScroll.min.js')}}"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
<script type="text/javascript" src="{{asset('home/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/easing.js')}}"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{asset('home/js/owl.carousel.js')}}"></script>  
</body>	
</html>