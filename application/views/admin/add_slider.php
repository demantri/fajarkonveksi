<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <div class="add-prod-from">
          <br>
        <div class="row">
          <div class="col-md-12">
              <br>
            <label>Teks 1</label>
            <input type="text" name="teks1" value="<?php echo set_value('teks1'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('teks1'); ?></small>
          </div>
          <div class="col-md-12">
            <label>Teks 2</label>
            <input type="text" name="teks2" value="<?php echo set_value('teks2'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('teks2'); ?></small>
          </div>
          <div class="col-md-12">
            <label>Teks 3</label>
            <input type="text" name="teks3" value="<?php echo set_value('teks3'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('teks3'); ?></small>
          </div>
          <div class="col-md-12"> <span class="upload-image">Upload Gambar</span>
            <label class="fileContainer"> <span>upload</span>
              <input type="file" name="gambar" />
            </label>
          </div>
          <div class="col-md-12">
            <label>Urutan</label>
            <input type="text" name="urutan" value="<?php echo set_value('urutan'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('urutan'); ?></small>
          </div>
          <div class="col-md-12">
            <label>Gaya Teks</label>
            <select name="gaya" class="form-control">
              <option value="">-Pilih-</option>
              <option value="text-left">Teks Kiri</option>
              <option value="text-right">Teks Kanan</option>
              <option value="text-center">Teks Tengah</option>
            </select>
            <small class="text-danger"><?php echo form_error('gaya'); ?></small>
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