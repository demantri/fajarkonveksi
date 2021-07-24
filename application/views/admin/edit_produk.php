<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $produkid['produk_id']; ?>">
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <div class="add-prod-from">
        <div class="row">
          <div class="col-md-6">
            <label>Nama Produk</label>
            <input type="text" name="nama-produk" value="<?php echo $produkid['produk_name']; ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('nama-produk'); ?></small>
          </div>
          <div class="col-md-6">
            <label>Harga Produk</label>
            <input type="text" name="harga-produk" value="<?php echo $produkid['produk_price']; ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('harga-produk'); ?></small>
          </div>
          <div class="col-md-6">
            <label>Stok</label>
            <input type="text" name="stok-produk" value="<?php echo $produkid['produk_stok']; ?>" placeholder="">
            <small class="text-danger"><?php echo form_error('stok-produk'); ?></small>
          </div>
          <!--<div class="col-md-6">-->
          <!--  <label>Status</label>-->
          <!--  <select name="status-produk" class="form-control">-->
          <!--    <?php if($produkid['produk_status'] == 'New') { ?>-->
          <!--      <option value="New" selected="">Baru</option>-->
          <!--      <option value="Second">Bekas</option>-->
          <!--    <?php }else { ?>-->
          <!--      <option value="New">Baru</option>-->
          <!--      <option value="Second" selected="">Bekas</option>-->
          <!--    <?php } ?>-->
          <!--  </select>-->
          <!--  <small class="text-danger"><?php echo form_error('status-produk'); ?></small>-->
          <!--</div>-->
          <div class="col-md-12">
            <label>Berat produk dalam satuan gram</label>
            <input type="text" name="berat-produk" value="<?php echo $produkid['produk_weight']; ?>" >
            <small class="text-danger"><?php echo form_error('berat-produk'); ?></small>
          </div>
          <div class="col-md-12">
            <label>Dekripsi Produk</label>
            <textarea cols="30" name="deskripsi-produk" rows="10" placeholder=""><?php echo $produkid['produk_description']; ?></textarea>
            <small class="text-danger"><?php echo form_error('deskripsi-produk'); ?></small>
          </div>
          <div class="col-md-12"> <span class="upload-image">Upload Gambar</span>
            <label class="fileContainer"> <span>upload</span>
              <input type="file" name="gambar" />
              <input type="hidden" name="gambar_old" value="<?php echo $produkid['produk_image']; ?>">
            </label>
          </div>
          <div class="col-md-12">
            <div class="buttonz">
              <button type="submit">Simpan</button>
              <button onclick="goBack()">Batal</button>
            </div>
          </div>
        </div>
      </div>
        </form>
    </div>
  </div>