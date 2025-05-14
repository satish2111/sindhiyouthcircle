<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'MediShop') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="<?= base_url('assets//css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet"> -->
    <link href="<?= base_url('assets/css/header.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/all.min.css') ?>" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->
    <!-- <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/') ?>">MediShop</a>
            <div class="text-white">
                <?= session()->get('username') ?>
            </div>
        </div>
    </nav> -->
    <header>
        <div class="nav-container">
            <!-- Hamburger Button (Mobile) -->
            <div id="menu-toggle" class="hamburger">&#9776;</div>

            <!-- Navigation -->
            <nav id="nav-menu">
                <ul class="nav-links">
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Masters</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('register')?>">New User</a></li>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Supplier</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="<?= base_url('financial-year')?>">Financial Year</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Purchase</a></li>
                    <li><a href="#">Sales</a></li>
                    <li><a href="#">Reports</a></li>

                </ul>

                <!-- Profile Dropdown aligned right -->
                <ul class="nav-links profile-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Hi <?= session()->get('username') ?></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">View Profile</a></li>
                            <?php if (session()->get('role') == 'admin'): ?>
                                <li>
                                    <a class="nav-link" href="<?= base_url('settings') ?>">Settings</a>
                                </li>
                            <?php endif; ?>
                            <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container mt-4">
            <?= $this->renderSection('content') ?>
        </div>
    </main>
    <!-- Footer (optional) -->
    <footer class="footer bg-light text-end mt-5 py-3">
        <!-- <small>&copy; <?= date('Y') ?> MediShop</small> -->

        <?php if (isset($activeYear)): ?>
            <small class="text-muted">FY: <?= date('d M Y', strtotime($activeYear['start_date'])) ?> - <?= date('d M Y', strtotime($activeYear['end_date'])) ?></small>
        <?php endif; ?>

    </footer>

    <!-- Scripts -->

    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src=<?= base_url('assets/js/bootstrap.bundle.min.js') ?>></script>
    <script src=<?= base_url('assets/js/header.js') ?>></script>
</body>

</html>