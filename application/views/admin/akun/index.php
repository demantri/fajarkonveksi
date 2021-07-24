<div class="gap inner-bg">
	<div class="element-title">
		<div class="table-styles">
			<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
			<a href="<?php echo base_url(); ?>admin/add_akun" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Akun</a>
			<div class="widget">
				<table class="prj-tbl striped bordered table-responsive" id="myTable">
				<thead class="">
					<tr>
					<th><em>No</em></th>
					<th><em>No Akun</em></th>
					<th><em>Nama Akun</em></th>
					<th><em>Saldo Awal</em></th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$no = 1;
				foreach ($akun as $key => $value) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $value->no_akun?></td>
						<td><?= $value->nm_akun?></td>
						<td><?= $value->saldo_awal?></td>
					</tr>
				<?php } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
