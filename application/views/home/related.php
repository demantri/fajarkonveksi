<!-- Related Product Area -->
	<div class="related_prdct_area text-center">
		<div class="container">		
				<!-- Section Title -->
				<div class="rp_title text-center"><h3>Produk Terkait</h3></div>
				
				<div class="row">
					<?php foreach($related as $rel): ?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $rel['produk_image']; ?>" alt="<?php echo $rel['produk_name']; ?>"/>
								<div class="box-content">
									<a href="<?php echo base_url(); ?>wishlist/<?php echo $rel['produk_id']; ?>"><i class="fa fa-heart-o"></i></a>
									<a href="<?php echo base_url(); ?>cart/add/<?php echo $rel['produk_id']; ?>"><i class="fa fa-cart-plus"></i></a>
									<a href="<?php echo base_url(); ?>p/<?php echo $rel['produk_id']; ?>/<?php echo $rel['url']; ?>/<?php echo $rel['produk_url']; ?>"><i class="fa fa-search"></i></a>
								</div>										
							</div>

							<div class="product_btm_text">
								<h4><a href="<?php echo base_url(); ?>p/<?php echo $rel['produk_id']; ?>/<?php echo $rel['url']; ?>/<?php echo $rel['produk_url']; ?>"><?php echo $rel['produk_name']; ?></a></h4>
								<span class="price"><?php echo number_format($rel['produk_price'],0,',','.'); ?></span>
							</div>
						</div>								
					</div> <!-- End Col -->			

					<?php endforeach; ?>
			</div>
		</div>
	</div>
