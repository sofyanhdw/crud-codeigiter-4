<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<form action="<?= site_url('/user/add') ?>" method="POST">
<?= csrf_field(); ?>

    <!--username form-->
    <div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Username :</label>
    </div>
    <div class="field-body">
        <div class="field">
        <div class="control has-icons-left">
                <input class="input <?=($validation->hasError('user_name')) ? 'is-danger' : ''; ?>" 
                type="text" placeholder="username" name="user_name" 
                value="<?= old('user_name') ?>" 
                id="user_name">
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
                    <input class="input <?= ($validation->hasError('email')) ? 'is-danger' : ''; ?>" 
                    type="text" placeholder="email" name="email" 
                    value="<?= old('email') ?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <p class="help is-danger"><?= $validation->getError('email') ?></p>
                </div>
            </div>
        </div>     
        </div>

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
                        <input class="input has-text-left <?= ($validation->hasError('validpassword')) ? 'is-danger' : ''; ?>" 
                        value="<?= old('validpassword') ?>" type="password" placeholder="konfirmasi password" name="validpassword">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <p class="help is-danger"><?= $validation->getError('validpassword') ?></p>
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
                        <select name="role_id">
                        <option value="">-----PILIH-----</option>
                        <?php foreach ($role_akses as $row) { ?>
                        <option value="<?= $row['role_id'] ?>" <?= ($row['role_id'] == old('role_id') ? "selected" : "") ?>><?= ucfirst($row['role_user']) ?></option>
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