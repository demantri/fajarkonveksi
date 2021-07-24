<!-- Start product Area -->
		<section id="product_area" class="section_padding">
			<div class="container">		
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">						
							<h2>Produk <span>Kami</span></h2>
							<div class="divider"></div>							
						</div>
					</div>
				</div>
			
				<div class="text-center">
					<div class="product_item">
						<div class="row">					
							<?php foreach($produk as $pro): ?>
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale">
								<div class="single_product">
									<div class="product_image">
										<img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $pro['produk_image']; ?>" alt="<?php echo $pro['produk_name']; ?>"/>
										<div class="new_badge"><?php echo $pro['produk_status']; ?></div>
										<div class="box-content">
											<a href="<?php echo base_url(); ?>wishlist/<?php echo $pro['produk_id']; ?>"><i class="fa fa-heart-o"></i></a>
											<a href="<?php echo base_url(); ?>cart/add/<?php echo $pro['produk_id']; ?>"><i class="fa fa-cart-plus"></i></a>
											<a href="<?php echo base_url(); ?>p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>"><i class="fa fa-search"></i></a>
										</div>										
									</div>

									<div class="product_btm_text">
										<h4><a href="<?php echo base_url(); ?>p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>"><?php echo $pro['produk_name']; ?></a></h4>
										<!-- <div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>										 -->
										<span class="price"><?php echo number_format($pro['produk_price'],0,',','.'); ?></span>
			
									</div>
								</div>
								
							</div> <!-- End Col -->	

							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End product Area -->