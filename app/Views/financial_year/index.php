<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Financial Years</h2>
    <a href="<?= base_url('financial-year/create') ?>" class="btn btn-success mb-3">Add New</a>

    <!-- <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?> -->

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
        <thead>
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($years as $year): ?>
                <tr>
                    <td class="br"><?= date('d-m-Y', strtotime($year['start_date'])) ?></td>
                    <td><?= date('d-m-Y', strtotime($year['end_date'])) ?></td>
                    <td  ><span class="<?= $year['status'] == 'Active' ? 'bg-success text-white' : 'bg-warning'; ?> p-2 rounded  "><?= $year['status'] ?></span></td>
                    <td>
                        <a href="<?= base_url('financial-year/edit/' . $year['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('financial-year/delete/' . $year['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>