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
                        <th width=100px>ID User</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th width=100px>Aksi</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($user as $value) :
                    ?>
                    <tr>
                    <td align="center"><?= $value['id_user'] ?></td>
                        <td><?= $value['nama_user'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td class="text-center"><?= $value['password']; ?></td>
                            <td class="text-center">
                                <?php
                                if ($value['level'] == 1) {
                                ?>
                                    <span class="badge bg-success">Admin</span>
                                <?php } else { ?>
                                    <span class="badge bg-primary">Bagian</span>
                                <?php } ?>
                            </td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#ubah-data<?= $value['id_user']; ?>" ><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus-data<?= $value['id_user']; ?>" ><i class="fas fa-trash"></i></button>
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
            <?php echo form_open('user/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Nama User"></label>
                    <input name="nama_user" class="form-control" placeholder="Nama User" required>
                    <label for="Email"></label>
                    <input name="email" class="form-control" placeholder="Email" required>
                    <label for="Password"></label>
                    <input name="password" class="form-control" placeholder="Password" required>
                    <label for="Level"></label>
                    <input name="level" class="form-control" placeholder="Level" required>
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
<?php foreach ($user as $value) : ?>
    <div class="modal fade" id="ubah-data<?= $value['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('user/ubahdata/'.$value['id_user']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nama User"></label>
                        <input name="nama_user" class="form-control" value="<?= $value['nama_user']; ?>" placeholder="Nama User" required>
                        <label for="Email"></label>
                        <input name="email" class="form-control" placeholder="Email" value="<?= $value['email']; ?>" required>
                        <label for="Password"></label>
                        <input name="password" class="form-control" placeholder="Password" value="<?= $value['password']; ?>" readonly>
                        <label for=""></label>
                        <select name="level" class="form-control">
                            <option value="1" <?= $value['level'] == 1 ? 'Selected' : '' ?>>Admin</option>
                            <option value="2" <?= $value['level'] == 2 ? 'Selected' : '' ?>>Bagian</option>
                        </select>
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
<?php foreach ($user as $value) : ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="hapus-data<?= $value['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Data User <?= $value['nama_user'];  ?>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/hapusdata/' . $value['id_user']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>