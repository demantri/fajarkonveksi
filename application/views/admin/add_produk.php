<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <div class="add-prod-from">
        <div class="row">
          <div class="col-md-6">
            <label>Nama Produk</label>
            <input type="text" name="nama-produk" value="<?php echo set_value('nama-produk'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('nama-produk'); ?></small>
          </div>
          <div class="col-md-6">
            <label>Harga Produk</label>
            <input type="text" name="harga-produk" value="<?php echo set_value('harga-produk'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('harga-produk'); ?></small>
          </div>
          <div class="col-md-6">
            <label>Stok</label>
            <input type="text" name="stok-produk" value="<?php echo set_value('stok-produk'); ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('stok-produk'); ?></small>
          </div>
          <!--<div class="col-md-6">-->
          <!--  <label>Status</label>-->
          <!--  <select name="status-produk" class="form-control">-->
          <!--    <option value="">-Pilih-</option>-->
          <!--    <option value="New">Baru</option>-->
          <!--    <option value="Second">Bekas</option>-->
          <!--  </select>-->
          <!--  <small class="text-danger"><?php echo form_error('status-produk'); ?></small>-->
          <!--</div>-->
          <div class="col-md-6">
            <label>Tag</label>
            <input type="text" id="txt1" name="kategori-produk" placeholder="">
            <small class="text-danger"><?php echo form_error('kategori-produk'); ?></small>
          </div>
          <div class="col-md-6">
            <label>Atau pilih kategori</label><br>
            <?php foreach($kat as $k): ?>
                <input id="<?php echo $k['kategori']; ?>" type="checkbox" name="kat[]" value="<?php echo $k['kategori']; ?>" onclick="addlist(this, 'txt1')" <?php if($rk) {foreach($rk->result() as $l) {if($k['kategori'] == $l->kategori) {echo 'checked';}}} ?>> <label for="<?php echo $k['kategori']; ?>"> <?php echo $k['kategori']; ?></label>&nbsp;
            <?php endforeach; ?>
          </div>
          <div class="col-md-12">
            <label>Berat produk dalam satuan gram</label>
            <input type="text" name="berat-produk" value="<?php echo set_value('berat-produk'); ?>" placeholder="1000">
            <small class="text-danger"><?php echo form_error('berat-produk'); ?></small>
          </div>
          <div class="col-md-12">
            <label>Dekripsi Produk</label>
            <textarea cols="30" name="deskripsi-produk" rows="10" placeholder=""><?php echo set_value('deskripsi-produk'); ?></textarea>
            <small class="text-danger"><?php echo form_error('deskripsi-produk'); ?></small>
          </div>
          <div class="col-md-12"> <span class="upload-image">Upload gambar</span>
            <label class="fileContainer"> <span>upload</span>
              <input type="file" name="gambar" />
            </label>
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