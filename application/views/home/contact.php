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

<!-- Contact Page -->
<div class="contact_page_area fix">
	<div class="container">
		<div class="row">
			<div class="contact_frm_area text-left col-lg-6 col-md-12 col-xs-12">
				<h3>Kirim Pesan</h3>
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
				<form action="" method="post">
					<div class="form-row">
						<div class="form-group col-sm-6"><input type="text" name="nama" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" placeholder="Name*" /><small class="text-danger"><?php echo form_error('nama'); ?></small></div>
						<div class="form-group col-sm-6"><input type="text" name="mail" value="<?php echo $this->session->userdata('usermail'); ?>" class="form-control" placeholder="Email*" /><small class="text-danger"><?php echo form_error('mail'); ?></small></div>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="subject" placeholder="Subject" />
					</div>

					<div class="form-group">
						<textarea name="message" class="form-control" placeholder="Message"></textarea><small class="text-danger"><?php echo form_error('message'); ?></small>
					</div>

					<div class="input-area submit-area"><button class="btn border-btn" type="submit">Kirim</button></div>

				</form>
			</div>

			<div class="contact_info col-lg-6 col-md-12 col-xs-12">
				<h3>Kontak Kami</h3>
				<!-- <p class="subtitle">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p> -->
				<div class="single_info">
					<div class="con_icon"><i class="fa fa-map-marker"></i></div>
					<p>Alamat :<br /><?php echo $profil['profil_alamat']; ?> </p>
				</div>
				<div class="single_info">
					<div class="con_icon"><i class="fa fa-phone"></i></div>
					<p>Telp / WhatsApp :</p>
					<p><?php echo $profil['profil_telp']; ?> / <?php echo $profil['profil_wa']; ?></p>
				</div>
				<div class="single_info">
					<div class="con_icon"><i class="fa fa-envelope"></i></div>
					<a>Email :</a> <br />
					<a href="#"><?php echo $profil['profil_email']; ?> </a>
				</div>

			</div>
		</div>
	</div>


	<!-- <div class="fix">
		<div id="contact_map_area"></div>
	</div> -->

</div>