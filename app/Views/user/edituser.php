<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php $validation = \Config\Services::validation(); ?>
<form action="<?= site_url('/user/ubah/'.$dataid['user_id']) ?>" method="POST" id="form">
<?= csrf_field(); ?>
<input type="hidden" name="user_id" value="<?= $dataid['user_id']; ?>">

    <!--username form-->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Username :</label>
        </div>
        <div class="field-body">
            <div class="field">
            <div class="control has-icons-left">
                <input class="input pesan <?=($validation->hasError('user_name')) ? 'is-danger' : ''; ?>" 
                type="text" placeholder="username" name="user_name" 
                value="<?= (old('user_name')) ? old('user_name') : $dataid['user_name'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    <p class="help is-danger"><?= $validation->getError('user_name'); ?></p>
            </div>
            </div>
        </div>
    </div>

    <!--email form-->
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Email :</label>
            </div>
            <div class="field-body">
                <div class="field">
                <div class="control has-icons-left">
                    <input class="input <?=($validation->hasError('email')) ? 'is-danger' : ''; ?>" 
                    type="text" placeholder="email" name="email" 
                    value="<?= (old('email')) ? old('email') : $dataid['email'] ?>" id="email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <p class="help is-danger"><?= $validation->getError('email'); ?></p>
                </div>
                </div>
            </div>
        </div>   
        
    <!--Role akses-->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Status User :</label>
        </div>
        <div class="field-body">
            <div class="field">
            <div class="control has-icons-left">
                <div class="select is-fullwidth <?= ($validation->hasError('role_id')) ? 'is-danger' : ''; ?>">
                    <select name="role_id" required oninvalid="this.setCustomValidity('Role harus dipilih')" oninput="this.setCustomValidity('')">
                    <option value="">-----PILIH-----</option>
                    <?php foreach ($role_akses as $row) { ?>
                        <option 
                        value="<?= $row['role_id'] ?>" 
                        <?= ($row['role_id'] == $dataid['role_id'] ? 'selected' : (old('role_id')==$row['role_id'] ? 'selected' : "")) ?>>
                        <?= ucfirst($row['role_user']) ?></option>
                        <?php } ?>
                    </select>
                </div>
                    <p class="help is-danger"><?= $validation->getError('role_id'); ?></p>
            </div>
            </div>
        </div>
    </div>

<!--button group-->
<div class="field is-horizontal">
  <div class="field-label">
    <!-- Left empty for spacing -->
  </div>
    <div class="field-body">
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit" name="submit">Submit</button>
            </div>
            <div class="control">
                <a href="<?= site_url('user'); ?>" class="button is-link is-light btn-cancel" type="reset">Cancel</a>
            </div>
        </div>
  </div>
</div>
</form>
<?= $this->endSection() ?>