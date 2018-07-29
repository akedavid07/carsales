<?php $this->load->view('public/partials/view_public_header.php'); ?>
<div class="banner">
	<div class="container">
		<script src="<?= base_url('assets/js/responsiveslides.min.js'); ?>"></script>
		<script>
		$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
		namespace: "callbacks",
		pager: true,
		});
		});
		</script>
					<div class="col col-md-12" style="margin-top:10em;">
						<form action="search" method="POST">
							<div class="col col-md-4">
								<input class="form form-control" type="text" name="" placeholder="Enter Vehicle Manufaturer or Model e.g Toyota" />
							</div>
							<div class="col col-md-3">
								<select name="" class="form form-control">
										<option class="active">Min Price</option>
										<option>₦ 12,000,000</option>
										<option>₦ 10,000,000</option>
										<option>₦ 5,000,000</option>
										<option>₦ 2,000,000</option>
										<option>₦ 1,000,000</option>
										<option>₦ 500,000</option>
								</select>								
							</div>
							<div class="col col-md-3">
								<select name="" class="form form-control">
									<option class="active">Max Price</option>
									<option>₦ 50,000,000</option>
									<option>₦ 30,000,000</option>
									<option>₦ 20,000,000</option>
									<option>₦ 15,000,000</option>
									<option>₦ 1,000,000</option>
									<option>₦ 500,000</option>
								</select>								
							</div>
							<div class="col col-md-2">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</form>		
					</div>
				<!--li>
					
					<div class="banner-text">

						<h3>There are many  </h3>
						<p>Popular belief Contrary to , Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
						
					</div>
					
				</li>
				<li>
					<div class="banner-text">
						<h3>Sed ut perspiciatis</h3>
						<p>Lorem Ipsum is not simply random text. Contrary to popular belief, It has roots in a piece of classical Latin literature from 45 BC.</p>
						
					</div>
					
				</li-->
			</div>
		</div>
	</div>
</div>
<!--content-->
<div class="container">
	<div class="cont">
		<div class="content">
			<div class="content-top-bottom">
				<h2>Featured Cars</h2>
				<?php foreach($featured as $feature) : ?>
					<div class="col-md-4 men">
						<a href="<?php echo base_url('pages/show') . '/' . $feature['vehicle_id']; ?> " class="b-link-stripe b-animate-go  thickbox">
							<img style="height: 260px;" class="img-responsive" src="<?= base_url('uploads'); ?>/<?php echo $feature['image']; ?>" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-top top-in   b-delay03 ">
								<span><?php echo $feature['model_name']; ?></span>
								</h3>
							</div>
						</a>
							<p><a href="pages/show/<?php echo $feature['vehicle_id']; ?>"><?php echo $feature['model_name']; ?></a><br/>₦<?php echo number_format($feature['buying_price']); ?>.00</p>
					</div>
				<?php endforeach; ?>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top">
				<h1>New Cars</h1>
				
				<div class="grid-in">
					{vehicles}
						<div class="col-md-3 grid-top simpleCart_shelfItem">
							<a href="<?= base_url(); ?>pages/show/{vehicle_id}" class="b-link-stripe b-animate-go  thickbox">
							<img class="img-responsive" src="<?= base_url('uploads/'); ?>/{image}" alt="">
								<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
									<span>{model_name}</span>
									<p>₦{buying_price}</p>				
									</h3>
								</div>
							</a>
							
							<p><a href="pages/show/{vehicle_id} ?>">{model_name}</a><br/>₦{buying_price}</p>
						</div>
					{/vehicles}
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		
	</div>
	
</div>
<div class="clearfix"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php $this->load->view('public/partials/view_public_footer.php'); ?>