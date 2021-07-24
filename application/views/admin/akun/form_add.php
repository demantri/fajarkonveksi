<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <form action="<?= base_url("admin/save_akun")?>" method="post">
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <div class="add-prod-from">
        <div class="row">
          <div class="col-md-12">
            <label>No Akun</label>
            <input type="text" name="no_akun" class="form-control" value="<?php echo set_value('no_akun'); ?>" placeholder="" autocomplete="off">
            <small class="text-danger"><?php echo form_error('no_akun'); ?></small>
          </div>
		  <div class="col-md-12">
            <label>Nama Akun</label>
            <input type="text" name="nm_akun" class="form-control" value="<?php echo set_value('nm_akun'); ?>" placeholder="" autocomplete="off">
            <small class="text-danger"><?php echo form_error('nm_akun'); ?></small>
          </div>
		  <div class="col-md-12">
            <label>Saldo Awal</label>
            <input type="number" name="saldo_awal" class="form-control" value="<?php echo set_value('saldo_awal'); ?>" placeholder="" autocomplete="off">
            <small class="text-danger"><?php echo form_error('saldo_awal'); ?></small>
          </div>
          <div class="col-md-12">
            <div class="buttonz">
              <button type="submit">Simpan</button>
              <button type="button" onclick="goBack()">Batal</button>
            </div>
          </div>
        </div>
      </div>
        </form>
    </div>
  </div>
