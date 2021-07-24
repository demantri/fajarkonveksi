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
                            <th><em>Nama Kategori</em></th>
                            <th><em>Url Kategori</em></th>
                            <th><em>Opsi</em></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($kategori as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><span><?php echo $pro['kategori']; ?></span></td>
                            <td><i><?php echo $pro['url']; ?></i></td>
                            <td>
                              <a href="<?php echo base_url(); ?>admin/hapus_produk/<?php echo $pro['id_kategori']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>