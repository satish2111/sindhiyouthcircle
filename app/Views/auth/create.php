<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2>Create New User</h2>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= site_url('register/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>
    <div class="form-group">
        <label for="emailid">Email</label>
        <input type="email" class="form-control" id="emailid" name="emailid" required>
    </div>
    <div class="form-group mb-4">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control" required>
            <option value="">Select Role</option>
            <?php foreach ($roles as $role): ?>
                <option value="<?= esc($role['role_name']) ?>"><?= esc($role['role_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create User</button>
    <a href="<?= base_url('register') ?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
    title="Back To Register"><i class="fa fa-arrow-left " ></i></a>
</form>

<?= $this->endSection() ?>