<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <?php if(isset($_SESSION['login'])): ?>
                <h2 class="nav-title">Selamat datang, <?= $_SESSION['userName']?></h2>
                <?php endif;?>
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="./assets/img/global/sidebar/profile.png" alt="">
                </button>
            </div>
        </div>

    </div>

    <div class="content">
        <div class="alert alert-warning" role="alert">
            Silahkan <strong>Login/register</strong> terlebih dahulu!
        </div>
        <div class="row">
            <div class="col-7">
                <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                            type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                    </li>
                </ul>

                <div class="tab-content" id="tableTabContent">
                    <div class="col-md-4">
                        <?php Flasher::flash(); ?>
                    </div>
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="card">
                            <h3 class="text-center mt-3 font-weight-bold">Login</h3>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <input name="userName" type="text" class="form-control" id="username"
                                            aria-describedby="emailHelp" placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="d-grid">
                                        <button name="submit" type="submit" class="btn btn-success mt-3"
                                            style="border-radius: 100px;">Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <div class="card">
                            <h3 class="text-center mt-3 font-weight-bold">Register</h3>
                            <div class="card-body">
                                <?php Flasher::flash(); ?>
                                <form action="<?= BASEURL ?>/pengguna/daftar" method="POST">
                                    <input name="isAdmin" value="0" type="hidden">
                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <input name="userName" type="text" class="form-control" id="username"
                                            aria-describedby="emailHelp" placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="username">Nama</label>
                                        <input name="namaUser" type="text" class="form-control" id="Nama"
                                            aria-describedby="emailHelp" placeholder="Nama" autocomplete="off">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="d-grid">
                                        <button name="submit" type="submit" class="btn btn-primary mt-3"
                                            style="border-radius: 100px;">Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>