<div class="gap inner-bg">
                  <div class="element-title">
                    <!--<h4><?php echo $title; ?></h4>-->
                  <div class="table-styles">
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <a href="<?php echo base_url(); ?>admin/add_produk" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Produk</a>
                    <div class="widget">
                      <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                          <tr>
                            <th><em>No</em></th>
                            <th><em>Nama Item</em></th>
                            <th><em>Harga</em></th>
                            <th><em>Stok</em></th>
                            <!--<th><em>Status</em></th>-->
                            <th><em>Foto</em></th>
                            <th><em>Opsi</em></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($produk as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><span><?php echo $pro['produk_name']; ?></span></td>
                            <td><i><?php echo $pro['produk_price']; ?></i></td>
                            <td><i><?php echo $pro['produk_stok']; ?></i></td>
                            <!--<td><i><?php echo $pro['produk_status']; ?></i></td>-->
                            <td><i><img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_name']; ?>"></i></td>
                            <td>
                              <a href="<?php echo base_url(); ?>admin/edit_produk/<?php echo $pro['produk_id']; ?>" class="btn-st drk-blu-clr"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url(); ?>admin/hapus_produk/<?php echo $pro['produk_id']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>