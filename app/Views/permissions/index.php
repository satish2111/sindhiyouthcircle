<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Permissions</h2>

<a href="<?= base_url('settings') ?> " class="btn btn-warning mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
<a href="<?= base_url('permissions/create') ?>" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" title="Back To Setting">Add Permission</a>

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


<table class="table table-bordered">
    <thead style="background-color:#028090; color:white;">
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Module</th>
            <th>View</th>
            <th>Add</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($permissions)): ?>
            <?php foreach ($permissions as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['role_id'] ?></td>
                    <td><?= $p['module_name'] ?></td>
                    <td><?= $p['can_view'] ? 'Yes' : 'No' ?></td>
                    <td><?= $p['can_add'] ? 'Yes' : 'No' ?></td>
                    <td><?= $p['can_edit'] ? 'Yes' : 'No' ?></td>
                    <td><?= $p['can_delete'] ? 'Yes' : 'No' ?></td>
                    <td>
                        <a href="<?= base_url('permissions/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('permissions/delete/' . $p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">No permissions found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>