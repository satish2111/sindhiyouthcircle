<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Edit Permission</h2>

<form action="<?= base_url('permissions/update/' . $permission['id']) ?>" method="post">
    <div class="mb-3">
        <label for="role_id">Role</label>
        <select name="role_id" id="role_id" class="form-select" required>
            <?php foreach ($roles as $r): ?>
                <option value="<?= $r['id'] ?>" <?= $permission['role_id'] == $r['id'] ? 'selected' : '' ?>>
                    <?= $r['role_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="module_name">Module Name</label>
        <input type="text" name="module_name" id="module_name" class="form-control" value="<?= $permission['module_name'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Permissions:</label><br>
        <label><input type="checkbox" name="can_view" value="1" <?= $permission['can_view'] ? 'checked' : '' ?>> View</label>
        <label><input type="checkbox" name="can_add" value="1" <?= $permission['can_add'] ? 'checked' : '' ?>> Add</label>
        <label><input type="checkbox" name="can_edit" value="1" <?= $permission['can_edit'] ? 'checked' : '' ?>> Edit</label>
        <label><input type="checkbox" name="can_delete" value="1" <?= $permission['can_delete'] ? 'checked' : '' ?>> Delete</label>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('permissions') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
