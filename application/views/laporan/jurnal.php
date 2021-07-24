<div class="gap inner-bg">
  <div class="element-title">
    <h4><?php echo $title; ?></h4>

    <div class="table-styles">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <form action="<?php echo base_url(); ?>laporan/lihat_transaksi" method="post">
        <br>
        <div class="row">
          <div class="col-md-5">
            <label>Mulai</label>
            <input type="date" name="start" class="form-control" required="">
          </div>
          <div class="col-md-5">
            <label>Sampai</label>
            <input type="date" name="end" class="form-control" required="">
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary mt-4">Lihat</button>
          </div>
        </div>
      </form>
      <?php if ($start == '') { ?>
        <br>
        <a href="<?php echo base_url(); ?>laporan/pdf_trx" target="_blank" class="btn-st rd-clr"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>
      <?php } else { ?>
        <br>
        <a href="<?php echo base_url(); ?>laporan/pdf_transaksi/<?php echo $start; ?>/<?php echo $end; ?>" target="_blank" class="btn-st rd-clr"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>
      <?php } ?>
      <div class="widget">
        <table class="table table-bordered">
			<thead class="">
				<tr>
					<th rowspan="2"><em>Tanggal</em></th>
					<th rowspan="2"><em>Keterangan</em></th>
					<th colspan="2" class="text-center"><em>Saldo</em></th>
				</tr>
				<tr>
					<th class="text-center"><em>Debit</em></th>
					<th class="text-center"><em>Kredit</em></th>
				</tr>
			</thead>
			<tbody>
			<?php
			$debit = 0;
			$kredit = 0;
			foreach ($list as $key => $value) { ?>
				<tr>
					<?php if ($value->posisi_dr_cr == 'd') { ?>
						<td><?= $value->tgl_jurnal?></td>
						<td><?= $value->nm_akun?></td>
						<td class="text-right"><?= $value->nominal?></td>
						<td></td>
						<?php $debit += $value->nominal ; ?>
					<?php } else { ?>
						<td></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<?=  $value->nm_akun?></td>
						<td></td>
						<td class="text-right"><?= $value->nominal?></td>
						<?php $kredit += $value->nominal ; ?>
					<?php } ?>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="2">Total</th>
					<th class="text-right"><?= $debit?></th>
					<th class="text-right"><?= $kredit?></th>
				</tr>
			</tfoot>
        </table>
      </div>

    </div>
  </div>
