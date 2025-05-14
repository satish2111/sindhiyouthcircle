<!DOCTYPE html>
<html>

<head>
    <title>Login - Medishop</title>
    <link href="<?= base_url('assets/css/login.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sweetalert2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/all.min.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- <h2>Login</h2> -->

    <?php if (!empty($error)): ?>
        <p style="color:red"><?= esc($error) ?></p>
    <?php endif; ?>

    <!-- <form method="post" action="<?= base_url('login') ?>">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form> -->
    <div class="container">
        <div class="formBox level-login">
            <div class="box boxShaddow"></div>
            <div class="box loginBox">
                <h2>LOGIN</h2>
                <!-- <form class="form" method="post" action="<?= base_url('login') ?>">
                    <div class="f_row">
                        <label>Username</label>
                        <input type="text" name="username" class="input-field" required>
                        <u></u>
                    </div>
                    <div class="f_row last">
                        <label>Password</label>
                        <input type="password" name="password" class="input-field" required>
                        <u></u>
                    </div>
                    <button class="btn" type="submit"><span>Login</span><u></u>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 415.582 415.582" xml:space="preserve">
                            <path d="M411.47,96.426l-46.319-46.32c-5.482-5.482-14.371-5.482-19.853,0L152.348,243.058l-82.066-82.064
                                      c-5.48-5.482-14.37-5.482-19.851,0l-46.319,46.32c-5.482,5.481-5.482,14.37,0,19.852l138.311,138.31
                                      c2.741,2.742,6.334,4.112,9.926,4.112c3.593,0,7.186-1.37,9.926-4.112L411.47,116.277c2.633-2.632,4.111-6.203,4.111-9.925
                                      C415.582,102.628,414.103,99.059,411.47,96.426z" />
                        </svg>
                    </button>
                    <div class="f_link">
                        <a href="" class="resetTag">Forgot your password?</a>
                    </div>
                </form> -->
                <form class="form" method="post" action="<?= base_url('login') ?>">
                    <div class="f_row">
                        <label>Username</label>
                        <input type="text" name="username" class="input-field" required minlength="4" maxlength="100">
                        <?= \Config\Services::validation()->showError('username') ?>
                        <u></u>
                    </div>
                    <div class="f_row last">
                        <label>Password</label>
                        <input type="password" name="password" class="input-field" required minlength="4" maxlength="100">
                        <?= \Config\Services::validation()->showError('password') ?>
                        <u></u>
                    </div>
                    <button class="btn" type="submit"><span>Login</span><u></u></button>
                </form>


            </div>
            <div class="box forgetbox">
                <a href="#" class="back icon-back">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 199.404 199.404" style="enable-background:new 0 0 199.404 199.404;" xml:space="preserve">
                        <polygon points="199.404,81.529 74.742,81.529 127.987,28.285 99.701,0 0,99.702 99.701,199.404 127.987,171.119 74.742,117.876 
		199.404,117.876 " />
                    </svg>
                </a>
                <h2>Reset Password</h2>
                <form class="form">
                    <p> </p>
                    <div class="f_row last">
                        <label>Email Id</label>
                        <input type="text" class="input-field" required>
                        <u></u>
                    </div>
                    <button class="btn"><span>Reset</span><u></u>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 415.582 415.582" xml:space="preserve">
                            <path d="M411.47,96.426l-46.319-46.32c-5.482-5.482-14.371-5.482-19.853,0L152.348,243.058l-82.066-82.064
                                      c-5.48-5.482-14.37-5.482-19.851,0l-46.319,46.32c-5.482,5.481-5.482,14.37,0,19.852l138.311,138.31
                                      c2.741,2.742,6.334,4.112,9.926,4.112c3.593,0,7.186-1.37,9.926-4.112L411.47,116.277c2.633-2.632,4.111-6.203,4.111-9.925
                                      C415.582,102.628,414.103,99.059,411.47,96.426z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="box registerBox">
                <span class="reg_bg"></span>
                <h2>Register</h2>
                <form class="form" id='registerForm' method="post" action="<?= base_url('register') ?>">
                    <div class="f_row">
                        <label>FullName</label>
                        <input type="text" id="fullname" name="fullname" class="input-field" required>
                        <u></u>
                    </div>
                    <div class="f_row">
                        <label>Email Id</label>
                        <input type="text" id="emailid" name="emailid" class="input-field" required>
                        <span id="email-error" style="color:#fff;"></span>
                        <u></u>
                    </div>
                    <div class="f_row">
                        <label for="role">Role </label>
                        <select name="role" id="role" class="input-field input-select" required>
                            <option value="" disabled selected hidden>Select The Role</option>
                            <option value="admin">Admin</option>
                            <option value="pharmacist">Pharmacist</option>
                        </select>
                        <u></u>
                    </div>
                    <div class="f_row">
                        <label>Username</label>
                        <input type="text" id="username" name="username" class="input-field" required>
                        <u></u>
                    </div>
                    <div class="f_row">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="input-field" required>
                        <u></u>
                        <div class="toggle-password" toggle="#password">
                            <i class="fa fa-eye-slash"></i>
                        </div>
                    </div>
                    <div class="f_row last">
                        <label>Repeat Password</label>
                        <input type="password" id="repeatpassword" name="repeatpassword" class="input-field" required>
                        <u></u>
                        <div class="toggle-password" toggle="#repeatpassword">
                            <i class="fa fa-eye-slash"></i>
                        </div>
                    </div>
                    <button class="btn-large">Signup</button>
                </form>
            </div>
            <a href="#" class="regTag icon-add d-none">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
                    <path d="M357,204H204v153h-51V204H0v-51h153V0h51v153h153V204z" />
                </svg>

            </a>
        </div>
    </div>
</body>

<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/login.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert.js') ?>"></script>

</html>