<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Add Permission</h2>

<form action="<?= base_url('permissions/store') ?>" method="post">
    <div class="mb-3">
        <label for="role_id">Role</label>
        <select name="role_id" id="role_id" class="form-select" required>
            <option value="">Select Role</option>
            <?php foreach ($roles as $r): ?>
                <option value="<?= $r['id'] ?>"><?= $r['role_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="module_name">Module Name</label>
        <input type="text" name="module_name" id="module_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Permissions:</label><br>
        <label><input type="checkbox" name="can_view" value="1"> View</label>
        <label><input type="checkbox" name="can_add" value="1"> Add</label>
        <label><input type="checkbox" name="can_edit" value="1"> Edit</label>
        <label><input type="checkbox" name="can_delete" value="1"> Delete</label>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= base_url('permissions') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
