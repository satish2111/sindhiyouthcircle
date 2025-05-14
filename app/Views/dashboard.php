<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Welcome, <?= session()->get('username') ?>!</h1>

<p>Your role: <?= $role ?></p>

<!-- You can use the role for conditional display -->
<?php if ($role == 'admin'): ?>
    <p>Welcome, Admin! You have full access.</p>
<?php elseif ($role == 'pharmacist'): ?>
    <p>Welcome, Pharmacist! You have limited access.</p>
<?php endif; ?>
<?= $this->endSection() ?>