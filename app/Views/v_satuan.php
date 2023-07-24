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
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width=50px>No</th>
                        <th>Satuan</th>
                        <th width=100px>Aksi</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($satuan as $value) :
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $value['nama_satuan'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#ubah-data<?= $value['id_satuan']; ?>" ><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus-data<?= $value['id_satuan']; ?>" ><i class="fas fa-trash"></i></button>
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
            <?php echo form_open('Satuan/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Nama Satuan"></label>
                    <input name="nama_satuan" class="form-control" placeholder="Satuan" required>
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
<?php foreach ($satuan as $value) : ?>
    <div class="modal fade" id="ubah-data<?= $value['id_satuan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('satuan/ubahdata/'.$value['id_satuan']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nama Satuan"></label>
                        <input name="nama_satuan" value="<?= $value['nama_satuan']; ?>" class="form-control" placeholder="Satuan" required>
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
<?php foreach ($satuan as $value) : ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="hapus-data<?= $value['id_satuan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Data Satuan <?= $value['nama_satuan'];  ?>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('satuan/hapusdata/' . $value['id_satuan']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>