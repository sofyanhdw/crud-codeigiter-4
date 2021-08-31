<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
      <div class="buttons">
        <a href="<?= site_url('/produk/tambahproduk') ?>" class="button is-link">
          <span class="icon is-small"><i class= "fas fa-box"></i></span>
            <span>Tambah Produk</span>
        </a>
      </div>
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
          <th>Nomor</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>SKU</th>
          <th>Stok</th>
          <th>Action</th>
        </tr>
        <?php 
          $i = 1;
          foreach ($tm_produk as $row) { ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $row['nama_produk'] ?></td>
          <td><?= $row['harga'] ?></td>
          <td><?= $row['berat']?></td>
          <td><?= $row['sku']?></td>
          <td><?= $row['jumlah_stok']?></td>
          <td>
            <form action="/user/edituser/<?= $row['user_id']?>" class="is-inline" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <button class="button is-warning is-light">
              <span class="icon">
                 <i class="fas fa-edit"></i>
              </span>
              <span>Edit</span>
            </button>
            </form>
            
            <form action="/user/delete/<?= $row['user_id']; ?>" id="actionformdelete" method="POST" class= 'is-inline' 
            name="actionformdelete" onsubmit="return saveform();">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
              <button class="button is-danger is-light btn-hapus">
                <span class="icon">
                  <i class="fas fa-ban"></i>
                </span>
                <span>Hapus</span>
              </button>
            </form>
          </td>
        <?php $i++; } ?>
        </tr>
      </table>
<?= $this->endSection() ?>;