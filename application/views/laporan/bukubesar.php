<div class="gap inner-bg">
  <div class="element-title">
    <h4><?php echo $title; ?></h4>
    <div class="table-styles">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <form action="<?php echo base_url(); ?>laporan/bukubesar" method="post">
        <br>
        <div class="row">
			<div class="col-md-3">
				<label>Akun</label>
				<select name="akun" id="akun" class="form-control" required>
					<option value="">Pilih akun</option>
					<?php foreach ($akun as $value) { ?>						
					<option value="<?= $value->no_akun?>"><?= $value->nm_akun?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-3">
				<label>Periode</label>
				<input type="month" name="periode" class="form-control" required="">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-primary mt-4">Lihat</button>
			</div>
        </div>
      </form>
	  <br>
	  <center>
		  <h3 style="margin-bottom: 10px; margin-top:10px;">Buku Besar</h3>
		  <h5>Periode <?= $periode ?></h5>
	  </center>
      <div class="widget">
        <table class="table table-bordered">
			<h4>Nama Akun : <?= $nm_akun?></h4>
			<h4>No Akun : <?= $no_akun?></h4>
			<thead>
				<tr>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th>Ref</th>
					<th>Debit</th>
					<th>Kredit</th>
					<th>Saldo</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$saldo_awal = $saldo_awal->debit - $saldo_awal->kredit;
					// $saldo_awal = $saldo + $saldo_a;
					// print_r($saldo);
				?>
				<tr>
					<td>0000-00-00</td>
					<td>Saldo Awal</td>
					<td></td>
					<td></td>
					<td></td>
					<td class="text-right"><?= $saldo_awal?></td>
				</tr>
				<?php
				foreach ($list as $key => $value) { ?>
				<tr>
					<td><?= $value->tgl_jurnal?></td>
					<td><?= $value->nm_akun?></td>
					<td><?= $value->no_coa?></td>
					<?php if ($value->posisi_dr_cr == 'd') {?>
						<?php if ($value->header_akun == 1 OR $value->header_akun == 5 OR $value->header_akun == 6 ) { ?>
							<?php $saldo_awal = $saldo_awal + $value->nominal; ?>
						<?php } else { ?>
							<?php $saldo_awal = $saldo_awal - $value->nominal; ?>
						<?php } ?>
						<td class="text-right"><?= $value->nominal?></td>
						<td></td>
					<?php } else { ?>
						<?php if ($value->header_akun == 1 OR $value->header_akun == 5 OR $value->header_akun == 6 ) { ?>
							<?php $saldo_awal = $saldo_awal - $value->nominal; ?>
						<?php } else { ?>
							<?php $saldo_awal = $saldo_awal + $value->nominal; ?>
						<?php } ?>
						<td></td>
						<td class="text-right"><?= $value->nominal?></td>
					<?php } ?>
					<td class="text-right"><?= $saldo_awal?></td>
				</tr>
				<?php } ?>
				<tr>
					<td>0000-00-00</td>
					<td>Saldo Akhir</td>
					<td></td>
					<td></td>
					<td></td>
					<td class="text-right"><?= $saldo_awal?></td>
				</tr>
			</tbody>
        </table>
      </div>

    </div>
  </div>
