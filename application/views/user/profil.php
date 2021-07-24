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
							<li><span><?php echo $title; ?></span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
		<!-- Cart Page -->
		<div class="cart_page_area">
			<div class="container">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
				<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
				<div class="cart-actions cart-button-cuppon">
					<div class="cuppon-wrap text-center">
						<h3><?php echo $title; ?></h3>
						<div class="row">
							<div class="col-md-6 text-left">
								<tr>
									<td>Nama : <?php echo $profilanda['user_nama']; ?></td><br>
							    	<td>Email : <?php echo $profilanda['user_email']; ?></td><br>
							    	<td>User Sejak : <?php echo date('d-m-Y H:i:s', strtotime($profilanda['user_created'])); ?></td>
								</tr>
							</div>
							<div class="col-md-6 text-left">
								<form action="" method="post">
									<div class="form-group">
										<input type="text" name="nama" class="form-control" value="<?php echo $profilanda['user_nama']; ?>">
										<small class="text-danger"><?php echo form_error('nama'); ?></small>
									</div>
									<div class="form-group">
										<input type="text" name="email" class="form-control" value="<?php echo $profilanda['user_email']; ?>">
										<small class="text-danger"><?php echo form_error('email'); ?></small>
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Konfirmasi password anda">
										<small class="text-danger"><?php echo form_error('password'); ?></small>
									</div>
									<div class="form-group">
										<button type="submit" class="btn border-btn">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
