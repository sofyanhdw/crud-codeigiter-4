<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php $validation = \Config\Services::validation(); ?>
<form action="<?= site_url('/user/ubahpasswd/'.$dataid['user_id']) ?>" method="POST">
<?= csrf_field(); ?>
<input type="hidden" name="user_id" value="<?= $dataid['user_id']; ?>">

    <!--password form-->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Password :</label>
        </div>
        <div class="field-body">
            <div class="field">
            <div class="control has-icons-left">
                    <input class="input <?= ($validation->hasError('user_password')) ? 'is-danger' : ''; ?>" 
                    value="<?= old('user_password') ?>" type="password" placeholder="password" name="user_password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <p class="help is-danger"><?= $validation->getError('user_password') ?></p>
                </div>
            </div>
        </div>
        </div>

        <!--confirm password form-->
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Konfirmasi Password :</label>
            </div>
            <div class="field-body">
                <div class="field">
                <div class="control has-icons-left">
                    <input class="input <?= ($validation->hasError('validpassword')) ? 'is-danger' : ''; ?>" 
                    value="<?= old('validpassword') ?>" type="password" placeholder="konfirmasi password" name="validpassword">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <p class="help is-danger"><?= $validation->getError('validpassword') ?></p>
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