<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h2 class="nav-title"><?= $data['judul']?></h2>
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="./assets/img/global/sidebar/profile.png" alt="">
                </button>
                <a href="" class="btn btn-primary py-2 px-3" style="border-radius: 100px;" data-bs-toggle="modal"
                    data-bs-target="#formModal"><i class="bi bi-plus-lg me-1"></i>Tambah
                    Data</a>
            </div>
        </div>

    </div>

    <!-- <div class="content">
        <div class="row">
            <div class="col-12">
                <h5 class="transaction-title">You've spent</h5>
                <h2 class="transaction-value">Rp 4.518.000.500</h2>
            </div>
        </div> -->

    <div class="row">

        <div class="col-12">
            <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tamu-tab" data-bs-toggle="tab" data-bs-target="#tamu"
                        type="button" role="tab" aria-controls="tamu" aria-selected="true">Tamu</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button"
                        role="tab" aria-controls="admin" aria-selected="false">Admin</button>
                </li>
            </ul>

            <div class="tab-content" id="tableTabContent">
                <div class="col-md-4">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="tab-pane fade show active" id="tamu" role="tabpanel" aria-labelledby="tamu-tab">
                    <div class="table-responsive">
                        <table class="table table-borderless transaction-table w-100 active" id="table-tamu">
                            <thead>
                                <tr>
                                    <th>Nama / Username</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <!-- <th class="status-header">Status</th> -->
                                    <th class="action-header">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; foreach( $data['customer'] as $customer ) : ?>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">

                                            <div
                                                class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                <h5 class="transaction-game"><?= $customer['namaUser']; ?></h5>
                                                <h5 class="transaction-type">
                                                    <?= ($customer['isAdmin'] == 0) ? 'Tamu' : 'Admin' ?></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class=""><?= $customer['userName']; ?></td>
                                    <td><?= ($customer['isAdmin'] == 0) ? 'Tamu' : 'Admin' ?></td>
                                    <!-- <td class="status">
                                        <span
                                            class="pending w-auto d-flex  justify-content-center align-self-center">Pending</span>
                                    </td> -->
                                    <td class="action"><a
                                            href="<?= BASEURL; ?>/customer/detail/<?= $customer['idUser']; ?>"
                                            class="btn-transaction mx-auto">Details</a></td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                    <div class="table-responsive">
                        <table class="table table-borderless transaction-table w-100" id="table-success">
                            <thead>
                                <tr>
                                    <th>Nama / Username</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <!-- <th class="status-header">Status</th> -->
                                    <th class="action-header">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; foreach( $data['userAdmin'] as $userAdmin ) : ?>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex flex-column flex-md-row justify-content-start align-items-start align-items-md-center">

                                            <div
                                                class="d-flex flex-column justify-content-center align-items-start mt-2">
                                                <h5 class="transaction-game"><?= $userAdmin['namaUser']; ?></h5>
                                                <h5 class="transaction-type">
                                                    <?= ($userAdmin['isAdmin'] == 0) ? 'Tamu' : 'Admin' ?></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class=""><?= $userAdmin['userName']; ?></td>
                                    <td><?= ($userAdmin['isAdmin'] == 0) ? 'Tamu' : 'Admin' ?></td>
                                    <!-- <td class="status">
                                        <span
                                            class="pending w-auto d-flex  justify-content-center align-self-center">Pending</span>
                                    </td> -->
                                    <td class="action"><a
                                            href="<?= BASEURL; ?>/customer/detail/<?= $userAdmin['idUser']; ?>"
                                            class="btn-transaction mx-auto">Details</a></td>
                                </tr>
                                <?php $i++; endforeach; ?>

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModtamuabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModtamuabel">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/customer/tambah" method="post">
                    <div class="form-group mb-3">
                        <label for="userName">User name</label>
                        <input type="text" class="form-control" id="userName" name="userName" autocomplete="off"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="namaUser">Nama User</label>
                        <input type="text" class="form-control" id="namaUser" name="namaUser" autocomplete="off"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select class="form-select" name="isAdmin">
                            <option disabled selected>--Pilih Role--</option>
                            <option value="0">Tamu</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>