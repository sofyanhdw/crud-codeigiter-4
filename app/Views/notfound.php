<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content') ?>
<div class="card">
  <div class="card-content">
    <div class="content has-text-centered">
    <p class="title">
      404 NOT FOUND
    </p>
    <p>
    Maaf halaman yang anda cari tidak ditemukan, silahkan klik button back untuk kembali
    </p>
    </div>
  </div>
  <footer class="card-footer">
    <p class="card-footer-item">
      <span>
        <a class="button is-light is-success" href="<?= site_url('user'); ?>">Back</a>
      </span>
    </p>
  </footer>
</div>
<?= $this->endSection() ?>