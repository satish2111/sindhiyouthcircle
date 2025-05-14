<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/roles.css') ?>">


<h2>Roles</h2>
<a href="<?= base_url('settings') ?>" class="btn btn-warning mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" title="Back To Setting"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
<a href="<?= base_url('roles/create') ?>" class="btn btn-primary mb-3">Add Role</a>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= esc($role['role_name']) ?></td>
                <td>
                    <a href="<?= base_url('roles/edit/' . $role['id']) ?>">Edit</a> |
                    <a href="<?= base_url('roles/delete/' . $role['id']) ?>" onclick="return confirm('Delete this role?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection() ?>