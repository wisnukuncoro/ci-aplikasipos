<div class="row">
  <div class="col-lg-6">
    <div class="card">
    </div>
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Featured</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="">
            <div class="group">
              <label>No Faktur</label>
              <label class="form-control form-control-lg text-danger "><?= $no_faktur ?></label>
            </div>
          </div>
          <div class="col-3">
            <div class="group">
              <label>Tanggal</label>
              <label class="form-control form-control-lg"><?= date('d M Y') ?></label>
            </div>
          </div>
          <div class="col-3">
            <div class="Time">
              <label>Jam </label>
              <label class="form-control form-control-lg"><?= date('14:30:00') ?></label>
            </div>
          </div>
          <div class="col-3">
            <div class="group">
              <label>Kasir</label>
              <label class="form-control form-control-lg"><?= session()->get('nama_user') ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
    </div>
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Featured</h5>
      </div>
      <div class="card-body bg-black color-palette text-right rounded">
        <label class="display-4 text-right text-green">Rp. 10,000,000- </label>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
						<div class="row">
              <div class="col-2 input-group">
                <input id="kode_produk" name="kode_produk" class="form-control" placeholder="Kode Produk" autocomplete="off">
                <span class="input-group-append">
                  <button class="btn btn-primary btn-flat">
                    <i class="fas fa-search"></i>
                  </button>
                </span>
                <span>
                  <button class="btn btn-danger btn-flat">
                    <i class="fas fa-times"></i>
                  </button>
                </span>
              </div>
              <div class="col-2 input-group">
                <input name="nama_produk" class="form-control" placeholder="Nama Produk" readonly>
              </div>
              <div class="col-1 input-group">
                <input name="kategori" class="form-control" placeholder="Kategori Produk" readonly>
              </div>
              <div class="col-1 input-group">
                <input name="satuan" class="form-control" placeholder="Satuan Produk" readonly>
              </div>
              <div class="col-1 input-group">
                <input name="harga_jual" class="form-control" placeholder="Harga Jual Produk" readonly>
              </div>
              <div class="col-1 input-group">
                <input type="number" min="1" value="1" class="form-control text-center" placeholder="Qty">
              </div>
              <div class="col-4 input-group">
                  <input name="kategori" class="form-control" placeholder="Kategori Produk">
                  <button class="btn btn-flat btn-primary">Tambah<i class="fas fa-cart-plus"></i></button>
                  <button class="btn btn-flat btn-warning"><i class="fas fa-sync"></i>Refresh</button>
                  <button class="btn btn-flat btn-success"><i class="fas fa-cash-register"></i>Bayar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <table class="table table-bordered">
      <thead>
          <tr class="text-center">
              <th>Kode Produk/Barcode</th>
              <th>Nama Produk</th>
              <th>Kategori Produk</th>
              <th>Harga Jual Produk</th>
              <th width="100px">QTY</th>
              <th>Total Harga</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          <tr class="text-center">
              <td>12345678</td>
              <td>Durian</td>
              <td>Makanan</td>
              <td class="">Rp.65.000,00-</td>
              <td class="">10 Buah</td>
              <td class="">Rp.650.000,00-</td>
              <td class="">
                  <a href="" class="btn btn-flat btn-danger btn-sm"><i class="fa fa-times"></i></a>
              </td>
          </tr>
      </tbody>
    </table>
  </div>

  <div class="col-lg-12">
    <div class="card-body bg-black color-palette text-center rounded">
        <h1 class="text-yellow">Sepuluh Juta Rupiah </label>
    </div>
  </div>

</div>
