<div class="gap inner-bg">
                  <div class="element-title">
                    <h4><?php echo $title; ?></h4>
                
                  <div class="table-styles">
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <?php 
        function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
         ?>
                    <div class="widget">
                      <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                          <tr>
                            <th><em>No</em></th>
                            <th><em>Nama</em></th>
                            <th><em>Email</em></th>
                            <th><em>Status</em></th>
                            <th><em>Tgl Registrasi</em></th>
                            <th><em>Member Sejak</em></th>
                            <th><em>Opsi</em></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($member as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><span><?php echo $pro['user_nama']; ?></span></td>
                            <td><i><?php echo $pro['user_email']; ?></i></td>
                            <td>
                              <?php if($pro['user_status'] == 0) { ?>
                                Belum Aktif
                              <?php }elseif($pro['user_status'] == 1) { ?>
                                Aktif
                              <?php }else { ?>
                                Terblokir
                              <?php } ?>
                            </td>
                            <td><i><?php echo date('d-m-Y H:i:s', strtotime($pro['user_created'])); ?></i></td>
                            <td><?php echo waktu_lalu($pro['user_created']); ?></td>
                            <td>
                              <?php if($pro['user_status'] == 0) { ?>
                                Belum Aktif
                              <?php }elseif($pro['user_status'] == 1) { ?>
                                <a href="<?php echo base_url(); ?>admin/blokir_user/<?php echo $pro['user_id']; ?>" class="btn-st rd-clr bdel">Blokir</a>
                              <?php }else { ?>
                                <a href="<?php echo base_url(); ?>admin/aktifkan_user/<?php echo $pro['user_id']; ?>" class="btn-st org-clr">Aktifkan</a>
                              <?php } ?>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>