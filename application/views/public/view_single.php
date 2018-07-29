<?php $this->load->view('public/partials/view_public_header.php'); ?>
	
	{vehicle}
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>{model_name}</h2>
		</div>
	</div>
	<!-- grow -->
	<div class="product">
		<div class="container">
			
			<div class="product-price1">
				<div class="top-sing">
					<div class="col-md-7 single-top">
						<div class="flexslider">
							<ul class="slides list-unstyled">
								<li data-thumb="images/si.jpg">
									<div class="thumb-image"> <img src="<?= base_url(); ?>uploads/{image}" data-imagezoom="true" class="img-responsive"> </div>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						<!-- slide -->
					</div>
					<div class="col-md-5 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
							<h4>{model_name}</h4>
							<p>₦{buying_price}</p>
							<hr>
							<p>{model_description}</p>
							<form method="POST" action="<?php echo base_url('send_message'); ?>">
								<input class="form form-control" name="name" type="text" placeholder="Name" required /><br/>
								<input class="form form-control" name="email" type="email" placeholder="Email" required /><br/>
								<input class="form form-control" name="phone_number" type="text" placeholder="Phone Number" required /><br/>
								<input class="form form-control" name="vehicle_id" type="hidden" value="{vehicle_id}" required /><br/>
								<textarea class="form form-control" name="message" placeholder="Message" required>Hi! I am interested in your vehicle posted on this page <?php echo base_url('pages/show/{vehicle_id}'); ?>. Please attached are my contact details. I await your quick response.</textarea><br/>
								<button class="btn btn-primary">Send a Request to Dealer</button>
							</form>
							</div>
						</div>
						<div class="clearfix"> </div>
						<hr>
						<div class="available">
							<ul>
								<li>
									Manufacturer: 
									<span>{manufacturer_name}</span>
								</li>
								<li>
									Color:
									<span>{color}</span>
								</li>
								<li>
									Category:
									<span>{category}</span>
								</li>
								<li class="size-in">
									Mileage:
									<span>{mileage}</span>
								</li>
								<li class="size-in">
									Gear:
									<span>{gear}</span>
								</li>
								<li class="size-in">
									Doors:
									<span>{doors}</span>
								</li>
								<li class="size-in">
									Seats:
									<span>{seats}</span>
								</li>
								<li class="size-in">
									Fuel:
									<span>{tank} Litre</span>
								</li>
								<li class="size-in">
									Registration Year:
									<span>{registration_year}</span>
								</li>
								<div class="clearfix"> </div>
							</ul>
						</div>
					</div>
					
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
{/vehicle}
<?php $this->load->view('public/partials/view_public_footer.php'); ?>