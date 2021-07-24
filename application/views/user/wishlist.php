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
				<div class="cart-actions cart-button-cuppon">
					<div class="cuppon-wrap text-center">
						<h3><?php echo $title; ?></h3>
						<div class="table-responsive mt-5">
						  <table class="table table-sm">
						    <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Nama Produk</th>
							      <th scope="col">Harga</th>
							      <th scope="col">Stok</th>
							      <th scope="col">Masukan Keranjang</th>
							      <th scope="col">Hapus</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php if(count($wishlist) == 0) { ?>
							  		<tr>
							  			<td colspan="5">Wishlist belum ada</td>
							  		</tr>
							  	<?php }else { ?>
							  		<?php $i = 1; ?>
								  	<?php foreach($wishlist as $list): ?>
								    <tr>
								      <th scope="row"><?php echo $i.'.'; ?></th>
								      <td><?php echo $list['produk_name']; ?></td>
								      <td><?php echo number_format($list['produk_price'],0,',','.'); ?></td>
								      <td><?php echo $list['produk_stok']; ?></td>
								      <td><a href="<?php echo base_url(); ?>cart/add/<?php echo $list['produk_id']; ?>" class="btn border-btn">add to cart</a></td>
								      <td><a href="<?php echo base_url(); ?>user/delete_wishlist/<?php echo $list['list_id']; ?>" class="btn btn-default"><i class="fa fa-trash"></i></a></td>
								    </tr>
								    <?php $i++; ?>
									<?php endforeach; ?>
							  	<?php } ?>
							  </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
