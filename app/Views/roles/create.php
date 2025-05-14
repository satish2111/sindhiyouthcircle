<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Create Role</h2>
<form method="post" action="<?= base_url('roles/store') ?>">
    <label>Role Name</label>
    <input type="text" name="role_name" required>
    <label>Description</label>
    <textarea name="description"></textarea>
    <button type="submit">Create</button>
</form>



<?= $this->endSection() ?>
