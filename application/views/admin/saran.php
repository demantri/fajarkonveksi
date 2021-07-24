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
                            <th><em>Saran</em></th>
                            <!-- <th><em>Dari</em></th>
                            <th><em>Total</em></th>
                            <th><em>Tujuan</em></th>
                            <th><em>Status</em></th>
                            <th><em>Konfirmasi</em></th>
                            <th><em>Detail</em></th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($transaksi as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><i><?php echo $pro['saran']; ?></i></td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>