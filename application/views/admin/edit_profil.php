<div class="inner-bg">
                  <div class="element-title">
                    <h4>Edit profile</h4>
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
                    <div class="pnl-bdy billing-sec">
                      <div class="row">
                      <div class="col-md-12 col-sm-12 field">
                        <label>Nama Lengkap</label>
                        <input value="<?php echo $profilsaya['admin_nama']; ?>" name="nama" type="text">
                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                      </div>
                      <div class="col-md-12 col-sm-12 field">
                        <label>Email</label>
                        <input value="<?php echo $profilsaya['admin_email']; ?>" name="email" type="text">
                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                      </div>
                      <div class="col-md-12 col-sm-12 field">
                        <label>Username</label>
                        <input value="<?php echo $profilsaya['admin_username']; ?>" name="username" type="text">
                        <small class="text-danger"><?php echo form_error('username'); ?></small>
                      </div>
                      <div class="col-md-12 col-sm-12 field"> 
                        <span class="upload-image">upload image</span>
                        <label class="fileContainer"> <span>upload</span>
                        <input type="file" name="gambar">
                        <input type="hidden" name="gambar_old" value="<?php echo $profilsaya['admin_foto']; ?>">
                        </label>
                      </div>
                      <div class="col-md-12 col-sm-12 field">
                        <label>Konfirmasi Password</label>
                        <input name="sandi" type="password">
                        <small class="text-danger"><?php echo form_error('sandi'); ?></small>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <button type="submit">Simpan</button>
                      </div>
                  </div>
                    </div>
                  </form>
                </div>