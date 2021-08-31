<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
      <div class="buttons">
        <a href="<?= site_url('/user/tambahuser') ?>" class="button is-link">
          <span class="icon is-small"><i class= "fas fa-user"></i></span>
            <span>Tambah User</span>
        </a>
      </div>
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
          <th>Nomor</th>
          <th>Username</th>
          <th>Email</th>
          <th>Status Pengguna</th>
          <th>Action</th>
        </tr>
        <?php 
          $i = 1;
          foreach ($user_sa as $row) { ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $row['user_name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['role_user']?></td>
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
            <a href="/user/ubahpassword/<?= $row['user_id'] ?>" class="button is-info is-light">
              <span class="icon">
                 <i class="fas fa-key"></i>
              </span>
              <span>Ubah Password</span>
            </a>
          </td>
        <?php $i++; } ?>
        </tr>
      </table>
<?= $this->endSection() ?>;