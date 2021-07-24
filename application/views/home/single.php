<!-- Page item Area -->
	<div id="page_item_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-left">
					<h3><?php echo $title; ?></h3>
				</div>		

				<div class="col-sm-6 text-right">
					<ul class="p_items">
						<li><a href="<?php echo base_url(); ?>">home</a></li>
						<li><span><?php echo $detail['produk_name']; ?></span></li>
					</ul>					
				</div>	
					
			
				
			</div>
		</div>
	</div>

	<!-- Product Details Area  -->
	<div class="prdct_dtls_page_area">
		<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
		<div class="container">
			<div class="row">
				<!-- Product Details Image -->
				<div class="col-md-6 col-xs-12">
					<div class="pd_img fix">
						<a class="venobox" title="Klik untuk melihat lebih detail" href="<?php echo base_url(); ?>assets_home/img/product/<?php echo $detail['produk_image']; ?>"><img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $detail['produk_image']; ?>" alt="<?php echo $detail['produk_name']; ?>"/></a>
					</div>
				</div>
				<!-- Product Details Content -->
				<div class="col-md-6 col-xs-12">
					<div class="prdct_dtls_content">
						<a class="pd_title" href="#"><?php echo $detail['produk_name']; ?></a>
						<div class="pd_price_dtls fix">
							<!-- Product Price -->
							<div class="pd_price">
								<span class="new">Rp. <?php echo number_format($detail['produk_price'],0,',','.'); ?></span>
							</div>
							<!-- Product Ratting -->
							<div class="pd_ratng">
								<div class="rtngs">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</div>
							</div>
						</div>
						<div class="pd_text">
							<h4>Deskripsi :</h4>
							<p><?php echo $detail['produk_description']; ?></p>
						</div>
						<form action="<?php echo base_url(); ?>cart/add_cart" method="post">
						<div class="pd_clr_qntty_dtls fix">
							<div class="pd_qntty_area">
								<h4>Jumlah :</h4>
								<div class="pd_qty fix">
									<input value="1" name="qttybutton" min="1" max="<?php echo $detail['produk_stok']; ?>" class="cart-plus-minus-box" type="number">
									<input type="hidden" name="produkid" value="<?php echo $detail['produk_id']; ?>">
								</div>
							</div>
						</div>
						<!-- Product Action -->
						<div class="pd_btn fix">
							<button type="submit" class="btn btn-default acc_btn">Tambah Ke Keranjang</button>
							<a href="<?php echo base_url(); ?>wishlist/<?php echo $detail['produk_id']; ?>" class="btn btn-default acc_btn btn_icn"><i class="fa fa-heart"></i></a>
							<a class="btn btn-default acc_btn btn_icn"><i class="fa fa-refresh"></i></a>
						</div>
						</form>
						<!--<div class="pd_share_area fix">-->
						<!--	<h4>share this on:</h4>-->
						<!--	<div class="pd_social_icon">-->
						<!--		<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>-->
						<!--		<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>-->
						<!--		<a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>-->
						<!--		<a class="google_plus" href="#"><i class="fa fa-google-plus"></i></a>-->
						<!--		<a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>-->
						<!--		<a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>-->
						<!--	</div>-->
						<!--</div>-->
					</div>
				</div>
			</div>
			
		
		</div>
