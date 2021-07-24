<div class="gap inner-bg">
  <div class="element-title">
    <h4><?php echo $title; ?></h4>
    <div class="table-styles">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive" id="myTable">
          <thead class="">
            <tr>
              <th><em>No</em></th>
              <th><em>Tgl</em></th>
              <th><em>Dari</em></th>
              <th><em>Total</em></th>
              <th><em>Tujuan</em></th>
              <th><em>Status</em></th>
              <th><em>Bukti Pembayaran</em></th>
              <th><em>Konfirmasi</em></th>
              <th><em>Detail</em></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $pro) : ?>
              <tr>
                <td><?php echo $i . '.'; ?></td>
                <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></span></td>
                <td><i><?php echo $pro['user_nama']; ?></i></td>
                <td><i><?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></i></td>
                <td><i><?php echo $pro['transaksi_tujuan']; ?></i></td>
                <td><i><?php echo ucwords($pro['transaksi_status']); ?></i></td>
                <td>
                  <center><img width="200px" src="<?php echo base_url('assets_home/img/buktipembayaran/' . $pro['buktipembayaran']) ?>"><br><br> <a class="btn btn-primary" target="_blank" href="<?php echo base_url('assets_home/img/buktipembayaran/' . $pro['buktipembayaran']) ?>">Lihat</a></center>
                </td>
                <td>
                  <?php if ($pro['transaksi_status'] == 'Sudah Upload') { ?>
                    <a href="<?php echo base_url(); ?>admin/konfirmasi_transaksi/<?php echo $pro['transaksi_id']; ?>" title="Konfirmasi" class="btn-st org-clr"><i class="fa fa-refresh"></i></a>
                  <?php } else { ?>
                    <a href="" title="Diproses" class="btn-st blu-clr"><i class="fa fa-check"></i></a>
                  <?php } ?>
                </td>
                <td>
                  <a href="<?php echo base_url(); ?>admin/detail_transaksi/<?php echo $pro['transaksi_id']; ?>" title="Detail Transaksi" class="btn-st drk-blu-clr"><i class="fa fa-search-plus"></i></a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
