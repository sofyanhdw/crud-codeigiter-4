<?= $this->extend('layouts/layout') ?>

<?= $this->section('content')?>

<div class="actionbutton mt-2">
   <a class="btn btn-info float-right mb20" href="<?=site_url('user/create')?>">Add User</a>
</div>

<?php 
// Display Response
if(session()->has('message')){
?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
      <?= session()->getFlashdata('message') ?>
   </div>
<?php
}
?>

<!-- Subject List -->
<table width="100%" border="1" style="border-collapse: collapse;">
  <thead>
    <tr>
      <th width="10%">ID</th>
      <th width="30%">Name</th>
      <th width="45%">Description</th>
      <th width="15%">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if(count($user_sa) > 0){

    foreach($user_sa as $row){
  ?>
     <tr>
       <td><?= $row['user_id'] ?></td>
       <td><?= $row['user_name'] ?></td>
       <td><?= $row['email'] ?></td>
       <td align="center">
         <a class="btn btn-sm btn-info" href="<?= site_url('user/edit/'.$row['user_id']) ?>">Edit</a>
         <a class="btn btn-sm btn-danger" href="<?= site_url('user/delete/'.$row['user_id']) ?>">Delete</a>
       </td>
     </tr>
  <?php
    }

  }else{
  ?>
    <tr>
      <td colspan="4">No data found.</td>
    </tr>
  <?php
  }
  ?>
  </tbody>
</table>
<?= $this->endSection() ?>