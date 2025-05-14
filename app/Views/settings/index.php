<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4" style="color: #05668d;">Settings</h2>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h5 class="card-title" style="color: #028090;">Role Management</h5>
                    <p class="card-text">Create and manage user roles with different access levels.</p>
                    <a href="<?= base_url('roles') ?>" class="btn" style="background-color: #02c39a; color: white;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                    title="Manage user roles">Manage Roles</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00a896;">Permission Management</h5>
                    <p class="card-text">Assign and control permissions for each role across modules.</p>
                    <a href="<?= base_url('permissions') ?>" class="btn" style="background-color: #02c39a; color: white;" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip"
                    data-bs-placement="bottom" title="Manage role permissions">Manage Permissions</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
