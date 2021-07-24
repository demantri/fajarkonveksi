<!-- Start Slider Area -->
		<section id="slider_area" class="text-center">
			<div class="slider_active owl-carousel">
				<?php foreach($slider as $lide): ?>
				<div class="single_slide" style="background-image: url(<?php echo base_url(); ?>assets_home/img/slider/<?php echo $lide['slider_gambar']; ?>); background-size: cover; background-position: center;">
					<div class="container">	
						<div class="single-slide-item-table">
							<div class="single-slide-item-tablecell">
								<div class="slider_content <?php echo $lide['slider_gaya_text']; ?> slider-animated-1">						
									<p class="animated"><?php echo $lide['slider_text_1']; ?></p>
									<h1 class="animated"><?php echo $lide['slider_text_2']; ?></h1>
									<h4 class="animated"><?php echo $lide['slider_text_3']; ?></h4>
									<a href="<?php echo base_url(); ?>shops" class="btn main_btn animated">Belanja Sekarang</a>
								</div>
							</div>
						</div>						
					</div>
				</div>
				
				<?php endforeach; ?>
			</div>
		</section>
		<br>
		<!-- End Slider Area -->		