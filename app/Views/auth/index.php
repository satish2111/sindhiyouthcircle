<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2>Manage Users</h2>
<a href="<?= base_url('register/create') ?>" class="btn btn-primary mb-4">Add New User</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['id']) ?></td>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['fullname']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <td><?= esc($user['role']) ?></td>
            <td>
                <a href="<?= base_url('register/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('register/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>

