<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"> Tambah Data</i></button>
            </div>
        </div>
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <?php 
              $errors = session()->getFlashdata('errors');
              if(!empty($errors)){ ?>
                <div class="alert alert-failed alert-dismissible">
                  <h4>Periksa lagi isian</h4>
                  <ul>
                    <?php foreach ($errors as $key => $error) { ?>
                      <li>
                        <?= esc($error); ?>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              <?php } ?>
  
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width=50px>No</th>
                        <th>Kode Produk</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th width=100px>Aksi</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($produk as $value) :
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $value['kode_produk'] ?></td>
                        <td><?= $value['nama_produk'] ?></td>
                        <td><?= $value['nama_kategori'] ?></td>
                        <td><?= $value['nama_satuan'] ?></td>
                        <td><?= $value['harga_jual'] ?></td>
                        <td><?= $value['harga_beli'] ?></td>
                        <td><?= $value['stok'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#ubah-data<?= $value['id_produk']; ?>" ><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus-data<?= $value['id_produk']; ?>" ><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php
                        $no++;	
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $subjudul; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Produk/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Kode Produk"></label>
                    <input name="kode_produk" value="<?= old('kode_produk') ?>" class="form-control" placeholder="Kode Produk" required>
                    <label for="Nama Produk"></label>
                    <input name="nama_produk" value="<?= old('nama_produk') ?>" class="form-control" placeholder="Produk" required>
                    <label for="ID Kategori"></label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"> <?= $value['nama_kategori'] ?></option>
                        <?php    } ?>
                    </select>
                    <label for="ID Satuan"></label>
                    <select name="id_satuan" class="form-control">
                        <option value="">--Pilih Satuan--</option>
                        <?php foreach ($satuan as $key => $value) { ?>
                            <option value="<?= $value['id_satuan'] ?>"> <?= $value['nama_satuan'] ?></option>
                        <?php    } ?>
                    </select>
                    <label for="Harga Jual"></label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                      <input name="harga_jual" value="<?= old('harga_jual') ?>" id="harga_jual" class="form-control" placeholder="Harga Jual" required>
                    </div>
                    <label for="Harga Beli"></label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                      <input name="harga_beli" value="<?= old('harga_beli') ?>" id="harga_beli" class="form-control" placeholder="Harga Beli" required>
                    </div>
                    <label for="Stok"></label>
                    <input name="stok" value="<?= old('stok') ?>" class="form-control" placeholder="Stok" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>



<!-- Modal Edit Data -->
<?php foreach ($produk as $value) : ?>
    <div class="modal fade" id="ubah-data<?= $value['id_produk']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Produk/ubahdata/'.$value['id_produk']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Kode Produk"></label>
                        <input name="kode_produk" value="<?= $value['kode_produk']; ?>" class="form-control" placeholder="Kode Produk" required>
                        <label for="Nama Produk"></label>
                        <input name="nama_produk" value="<?= $value['nama_produk']; ?>" class="form-control" placeholder="Produk" required>
                        <label for="Kategori"></label>
                        <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"> <?= $value['nama_kategori'] ?></option>
                        <?php    } ?>
                        </select>
                        <label for="Satuan"></label>
                        <select name="id_satuan" class="form-control">
                            <option value="">--Pilih Satuan--</option>
                            <?php foreach ($satuan as $key => $value) { ?>
                                <option value="<?= $value['id_satuan'] ?>"> <?= $value['nama_satuan'] ?></option>
                            <?php    } ?>
                        </select>
                        <label for="Harga Jual"></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                          <input name="harga_jual" id="edit_harga_jual" class="form-control" placeholder="Harga Jual" required>
                        </div>
                        <label for="Harga Beli"></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                          <input name="harga_beli" id="edit_harga_beli" class="form-control" placeholder="Harga Beli" required>
                        </div>
                          <label for="Stok"></label>
                          <input name="stok" class="form-control" placeholder="Stok" required>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </div>
            <?php echo form_close() ?>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>


<!-- /.modal-HapusData -->
<?php foreach ($produk as $value) : ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="hapus-data<?= $value['id_produk']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Data Produk <?= $value['nama_produk'];  ?>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Produk/hapusdata/' . $value['id_produk']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<script src="template/autoNumeric/src/AutoNumeric.js"></script>

<script>
  new AutoNumeric('#harga_jual', {
    digitGroupSeparator: ',',
    decimalPlaces: 0,
  });
  new AutoNumeric('#harga_beli', {
    digitGroupSeparator: ',',
    decimalPlaces: 0,
  });
  new AutoNumeric('#edit_harga_jual', {
    digitGroupSeparator: ',',
    decimalPlaces: 0,
  });
  new AutoNumeric('#edit_harga_beli', {
    digitGroupSeparator: ',',
    decimalPlaces: 0,
  });
</script>