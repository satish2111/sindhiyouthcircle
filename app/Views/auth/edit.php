<?= $this->extend('layouts/main') ?> <!-- Adjust layout as per your structure -->

<?= $this->section('content') ?>
<h2>Edit User</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= site_url('register/update/' . $user['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" value="<?= esc($user['fullname']) ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="emailid">Email</label>
        <input type="email" name="emailid" value="<?= esc($user['email']) ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password (Leave blank to keep current)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
            <option value="">Select Role</option>
            <?php foreach ($roles as $role): ?>
                <option value="<?= esc($role['role_name']) ?>" <?= ($role['role_name'] === $user['role']) ? 'selected' : '' ?>>
                    <?= esc($role['role_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <br>
    <button type="submit" class="btn btn-success">Update User</button>
</form>
<?= $this->endSection() ?>
