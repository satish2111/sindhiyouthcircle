<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= isset($year) ? 'Edit' : 'Add' ?> Financial Year</h2>

    <form method="post" action="<?= isset($year) ? base_url('financial-year/update/'.$year['id']) : base_url('financial-year/store') ?>">
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="<?= $year['start_date'] ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="<?= $year['end_date'] ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active" <?= isset($year) && $year['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                <option value="Inactive" <?= isset($year) && $year['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary mt-2" type="submit">Save</button>
    </form>
</div>

<?= $this->endSection() ?>
