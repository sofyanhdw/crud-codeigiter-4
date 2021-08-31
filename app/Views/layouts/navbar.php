<nav class="navbar box-shadow" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href = "<?= site_url('user') ?>" class="navbar-item">
        <span class="icon">
          <i class="fas fa-home"></i>
        </span> 
        <span>User</span>
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
        <span class="icon">
          <i class="fas fa-user"></i>
        </span>
         <span> User </span> 
        </a>

        <div class="navbar-dropdown">
          <a href = "<?= site_url('user') ?>" class="navbar-item">
           <span>Data User</span>
          </a>
          <a href = "<?= site_url('user/tambahuser') ?>" class="navbar-item">
            <span> Tambah User </span>
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
      <a class="navbar-link">
        <span class="icon">
          <i class="fas fa-box"></i>
        </span>
        <span> Produk </span>
      </a>
      <div class="navbar-dropdown">
        <a href="<?= site_url('produk') ?>" class="navbar-item">
          <span> Data Produk</span>
        </a>
        <a href="<?= site_url('produk/tambahproduk') ?>" class="navbar-item">
          <span> Tambah Produk</span>
        </a>
      </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>