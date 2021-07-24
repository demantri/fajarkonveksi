<div class="gap inner-bg">
                  <div class="element-title">
                  <div class="table-styles">
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <a href="<?php echo base_url(); ?>admin/add_slider" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Slider</a>
                    <div class="widget">
                      <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                          <tr>
                            <th><em>No</em></th>
                            <th><em>Teks 1</em></th>
                            <th><em>Teks 2</em></th>
                            <th><em>Teks 3</em></th>
                            <th><em>Foto</em></th>
                            <th><em>Urutan</em></th>
                            <th><em>Animasi</em></th>
                            <th><em>Opsi</em></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($slider as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><span><?php echo $pro['slider_text_1']; ?></span></td>
                            <td><span><?php echo $pro['slider_text_2']; ?></span></td>
                            <td><span><?php echo $pro['slider_text_3']; ?></span></td>
                            <td><img src="<?php echo base_url(); ?>assets_home/img/slider/<?php echo $pro['slider_gambar']; ?>" width="40" alt="slider"></td>
                            <td><i><?php echo $pro['slider_urutan']; ?></i></td>
                            <td><i><?php echo $pro['slider_gaya_text']; ?></i></td>
                            <td>
                              <a href="<?php echo base_url(); ?>admin/hapus_slider/<?php echo $pro['slider_id']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>