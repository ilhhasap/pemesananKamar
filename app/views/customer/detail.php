<div class="col-12 col-xl-9">
    <div class="row nav">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['customer']['namaUser']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">username: <?= $data['customer']['userName']; ?></h6>
                    <a href="<?= BASEURL; ?>/customer" class="card-link">Kembali</a>
                    <!-- <?php if(isset($_SESSION['login'])): ?>
                    <?php if($_SESSION['isAdmin'] == 1): ?>
                    <a href="<?= BASEURL; ?>/customer/hapus/<?= $data['customer']['idUser']; ?>"
                        class="card-link text-danger float-right" onclick="return confirm('yakin?');">Hapus</a>
                    <?php endif ?>
                    <?php endif ?> -->
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_SESSION['login'])): ?>
    <?php if($_SESSION['isAdmin'] == 1): ?>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="<?= BASEURL; ?>/customer/ubah/<?= $data['customer']['idUser']; ?>" method="post">
                    <input type="hidden" name="idUser" id="idUser" value="<?= $data['customer']['idUser']; ?>">
                    <div class="form-group">
                        <h5 class="text-center">Update data</h5>
                        <hr>
                        <div class="form-group mb-3">
                            <label for="userName">User name</label>
                            <input type="text" class="form-control" id="userName" name="userName" autocomplete="off"
                                required value="<?= $data['customer']['userName']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="namaUser">Nama User</label>
                            <input type="text" class="form-control" id="namaUser" name="namaUser" autocomplete="off"
                                required value="<?= $data['customer']['namaUser']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                required value="<?= $data['customer']['password']; ?>">
                        </div>
                        <div class=" form-group mb-3">
                            <label for="role">Role</label>
                            <select class="form-select" name="isAdmin">
                                <?php if($data['customer']['isAdmin'] == 0): ?>
                                <option value="<?= $data['customer']['isAdmin']; ?>">Tamu</option>
                                <option value="1">Admin</option>
                                <?php else:?>
                                <option value="<?= $data['customer']['isAdmin']; ?>">Admin</option>
                                <option value="0">Tamu</option>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mt-3" style="border-radius: 100px;">Ubah data
                            </button>
                            <a href="<?= BASEURL; ?>/customer/hapus/<?= $data['customer']['idUser']; ?>"
                                class="btn btn-danger mt-3" style="border-radius: 100px;"
                                onclick="return confirm('yakin?');">Hapus</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php endif ?>
<!-- <div class="container mt-5">

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['customer']['namaUser']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">id: <?= $data['customer']['userName']; ?></h6>
                    <a href="<?= BASEURL; ?>/customer" class="card-link">Kembali</a>
                    <?php if(isset($_SESSION['login'])): ?>
                    <?php if($_SESSION['isAdmin'] == 1): ?>
                    <a href="<?= BASEURL; ?>/customer/hapus/<?= $data['customer']['idUser']; ?>"
                        class="card-link text-danger float-right" onclick="return confirm('yakin?');">Hapus</a>
                    <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION['login'])): ?>
        <?php if($_SESSION['isAdmin'] == 1): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/customer/ubah/<?= $data['customer']['idUser']; ?>" method="post">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $data['customer']['idUser']; ?>">
                        <div class="form-group">
                            <div class="form-group mb-3">
                                <label for="userName">User name</label>
                                <input type="text" class="form-control" id="userName" name="userName" autocomplete="off"
                                    required value="<?= $data['customer']['userName']; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="namaUser">Nama User</label>
                                <input type="text" class="form-control" id="namaUser" name="namaUser" autocomplete="off"
                                    required value="<?= $data['customer']['namaUser']; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    autocomplete="off" required value="<?= $data['customer']['password']; ?>">
                            </div>
                            <div class=" form-group mb-3">
                                <label for="role">Role</label>
                                <select class="form-select" name="isAdmin">
                                    <?php if($data['customer']['isAdmin'] == 0): ?>
                                    <option value="<?= $data['customer']['isAdmin']; ?>">Tamu</option>
                                    <option value="1">Admin</option>
                                    <?php else:?>
                                    <option value="<?= $data['customer']['isAdmin']; ?>">Admin</option>
                                    <option value="0">Tamu</option>
                                    <?php endif;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php endif ?>


</div> -->