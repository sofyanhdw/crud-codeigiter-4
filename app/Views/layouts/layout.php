<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
</head>
<body>
<?= $this->include('layouts/navbar') ?>

  <section class="section">
    
    <div class="container">
      
      <?php if(session()->get('message')) : ?>
        <div class="notification <?= session()->getFlashdata('notification') ?>">
        <button class="delete"></button>
          <?= session()->getFlashdata('message') ?>
        </div>
      <?php endif; ?>
      <?= $this->renderSection('content') ?>
    </div>
  </section>

<script src="<?= base_url(); ?>/assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/sweetalertcustom.js"> </script>
<script src="https://kit.fontawesome.com/aef3418eaa.js" crossorigin="anonymous"></script>
</body>
</html>