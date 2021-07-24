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
		
		

	<!-- Checkout Page -->
	<section class="checkout_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title">
                            <h3>Kelengkapan Data</h3>
                        </div>
                        <form class="checkout_form" action="" method="post">
                        	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="form-row">
	                            <div class="form-group col-md-6">  
									<label for="prov">Provinsi:</label>
									<div class="custom-select-wrapper" >
										<select name="prov" id="prov" class="custom-select" >
											<option value="" disabled selected>-Pilih Provinsi-</option>
											<?php $this->load->view('home/prov'); ?>
										</select>
										<small class="text-danger"><?php echo form_error('prov'); ?></small>
									</div>
	                            </div>
	                            <div class="form-group col-md-6">  
									<label for="city">Kota/Kabupaten:</label>
									<div class="custom-select-wrapper" >
										<select name="kota" id="kota" class="custom-select" >
											<option value="" disabled selected>-Kota/Kabupaten-</option>
										</select>
										<small class="text-danger"><?php echo form_error('kota'); ?></small>
									</div>
	                            </div>
	                        </div>
							<div class="form-group">
								<label for="address">Kode POS:</label>    
								<input type="text" name="kd_pos" class="form-control" value="<?php echo set_value('kd_pos'); ?>">
								<small class="text-danger"><?php echo form_error('kd_pos'); ?></small>
                            </div>
							<div class="form-group">
								<label for="address">Kurir:</label>    
								<div class="custom-select-wrapper" >
									<select name="kurir" id="kurir" class="custom-select" >
										<option value="pos">POS</option>
										<option value="jne">JNE</option>
										<option value="tiki">TIKI</option>
									</select>
									<small class="text-danger"><?php echo form_error('kurir'); ?></small>
								</div>
                            </div>
                            <div class="form-group">
								<label for="address">Layanan:</label>    
								<div class="custom-select-wrapper" >
									<select name="layanan" id="layanan" class="custom-select" >
										<option value="" disabled selected>-Layanan-</option>
									</select>
									<small class="text-danger"><?php echo form_error('layanan'); ?></small>
								</div>
                            </div>
                            <div class="form-group">
								<label for="address">Alamat Lengkap:</label>    
								<textarea rows="3" name="alamat" id="address" placeholder="Alamat Lengkap" class="form-control"></textarea>
								<small class="text-danger"><?php echo form_error('alamat'); ?></small>
                            </div>

                            <div class="form-group">
								<label for="address">Catatan tambahan:</label>    
								<textarea rows="3" name="note" placeholder="Catatan" class="form-control"></textarea>                            
                            </div>
                        
                    </div>
					
					
                    <div class="col-md-6">
                        <div class="title">
                            <h3>Rincian Belanja</h3>
                        </div>
						
						<div class="your-order-table table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="product-name">Nama Produk</th>
										<th class="product-total">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($keranjang as $cart): ?>
									<tr>
										<td class="product-name"><?php echo $cart['name'] ?></td>
										<td class="product-total"><span><?php echo number_format($cart['subtotal'],0,',','.'); ?></span></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Subtotal</th>
										<td><span class="amount"><?php echo number_format($this->cart->total(),0,',','.'); ?></span></td>
									</tr>
								</tfoot>
							</table>
						</div>
						
                        <div class="payment_method">           
							<div class="form-group">
								<label for="nama">Ongkir:</label>
								<input type="text" class="form-control" name="ongkir" id="ongkir" readonly="" value="0">
							</div>
							<div class="form-group">
								<label for="nama">Yang harus dibayar:</label>
								<input type="text" class="form-control" name="total" id="total" readonly="" value="<?php echo number_format($this->cart->total(),0,',','.'); ?>">
							</div>    
                        </div>
						
                        <div class="qc-button">
                            <button type="submit" class="btn border-btn" tabindex="0">Lanjutkan</button>
                        </div>
                    </div>
					</form>
                </div>
            </div>
        </section>

