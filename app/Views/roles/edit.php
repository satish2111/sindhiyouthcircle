<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Edit Role: <?= esc($role['role_name']) ?></h2>
<form method="post" action="<?= base_url('roles/update/' . $role['id']) ?>">
    <label>Role Name</label>
    <input type="text" name="role_name" value="<?= esc($role['role_name']) ?>" required>
    <label>Description</label>
    <textarea name="description"><?= esc($role['description']) ?></textarea>

    <h3>Permissions</h3>
    <?php
        $modules = ['company', 'supplier', 'product', 'purchase', 'sales', 'reports'];
        $existing = [];
        foreach ($permissions as $p) {
            $existing[$p['module_name']] = $p;
        }
    ?>
    <?php foreach ($modules as $mod): ?>
        <div>
            <strong><?= ucfirst($mod) ?></strong><br>
            <?php $perm = $existing[$mod] ?? ['can_view'=>0,'can_add'=>0,'can_edit'=>0,'can_delete'=>0]; ?>
            <label><input type="checkbox" name="permissions[<?= $mod ?>][can_view]" <?= $perm['can_view'] ? 'checked' : '' ?>> View</label>
            <label><input type="checkbox" name="permissions[<?= $mod ?>][can_add]" <?= $perm['can_add'] ? 'checked' : '' ?>> Add</label>
            <label><input type="checkbox" name="permissions[<?= $mod ?>][can_edit]" <?= $perm['can_edit'] ? 'checked' : '' ?>> Edit</label>
            <label><input type="checkbox" name="permissions[<?= $mod ?>][can_delete]" <?= $perm['can_delete'] ? 'checked' : '' ?>> Delete</label>
        </div>
    <?php endforeach; ?>

    <br>
    <button type="submit">Save</button>
</form>

<?= $this->endSection() ?>

