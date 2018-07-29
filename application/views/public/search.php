<div class="banner" style="background:#dedede;min-height:0px">
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
					<div class="col col-md-12" style="margin-top:5em;margin-bottom:2em">
						<form action="search" method="POST">
							<div class="col col-md-4">
								<input class="form form-control" type="text" name="car_type" placeholder="Enter Vehicle Manufaturer or Model e.g Toyota" />
							</div>
							<div class="col col-md-3">
								<select name="minimum_price" class="form form-control">
										<option class="active">Min Price</option>
										<option value="120000000">₦ 12,000,000</option>
										<option value="10000000">₦ 10,000,000</option>
										<option value="5000000">₦ 5,000,000</option>
										<option value="2000000">₦ 2,000,000</option>
										<option value="1000000">₦ 1,000,000</option>
										<option value="500000">₦ 500,000</option>
								</select>								
							</div>
							<div class="col col-md-3">
								<select name="maximum_price" class="form form-control">
									<option class="active">Max Price</option>
									<option value="50000000">₦ 50,000,000</option>
									<option value="30000000">₦ 30,000,000</option>
									<option value="20000000">₦ 20,000,000</option>
									<option value="15000000">₦ 15,000,000</option>
									<option value="1000000">₦ 1,000,000</option>
									<option value="500000">₦ 500,000</option>
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
				<div class="clearfix"> </div>
<br/><br/><br/>
<div class="container">
	<div class="cont">
		<div class="content">
			<div class="content-top-bottom">
				<h2>Search Results:</h2>
					<?php foreach($vehicles as $vehicle){ 
                        $vehicle_id = $vehicle['model_id'];
/*                        $query = $this->db->query("SELECT * FROM manufacturers WHERE id='$vehicle_id'");
                        $row = $query->row();*/
                        $q = $this->db->query("SELECT * FROM models WHERE id='$vehicle_id'");
                        $r = $q->row();
                    ?>
					<div class="col-md-4 men">
						<a href="<?php echo base_url('pages/show') . '/' . $vehicle['vehicle_id']; ?> " class="b-link-stripe b-animate-go  thickbox">
							<img style="height: 260px;" class="img-responsive" src="<?= base_url('uploads'); ?>/<?php echo $vehicle['image']; ?>" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-top top-in   b-delay03 ">
								<span><?php echo $r->model_name; ?></span>
								</h3>
							</div>
						</a>
							<p><a href="pages/show/<?php echo $vehicle['vehicle_id']; ?>"><?php echo $r->model_name; ?></a><br/>₦<?php echo number_format($vehicle['buying_price']); ?>.00</p>
					</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>

		
	</div>
	
</div>
<div class="clearfix"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
