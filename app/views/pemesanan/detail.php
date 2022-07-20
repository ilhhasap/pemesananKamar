<div class="col-12 col-xl-9">
    <div class="row nav align-items-start">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <?php if( $data['getPemesanan']['idStatus'] == 0 ) : ?>
                    <span class="badge bg-warning">Pending</span>
                    <?php endif;?>
                    <?php if( $data['getPemesanan']['idStatus'] == 1 ) : ?>
                    <span class="badge bg-success">Check In</span>
                    <?php endif;?>
                    <?php if( $data['getPemesanan']['idStatus'] == 2 ) : ?>
                    <span class="badge bg-danger">Check Out</span>
                    <?php endif;?>
                    <?php if( $data['getPemesanan']['idStatus'] == 3 ) : ?>
                    <span class="badge bg-primary"><i class="bi bi-check-lg"></i> Completed</span>
                    <?php endif;?>
                    <h5 class="card-title"><?= $data['getPemesanan']['namaUser']; ?></h5>
                    <p class="card-text"><?= $data['getPemesanan']['userName']; ?></p>
                    <a href="<?= BASEURL; ?>/pemesanan" class="card-link">Kembali</a>
                    <!-- <?php if(isset($_SESSION['login'])): ?>
                    <?php if($_SESSION['isAdmin'] == 1): ?>
                    <a href="<?= BASEURL; ?>/customer/hapus/<?= $data['customer']['idUser']; ?>"
                        class="card-link text-danger float-right" onclick="return confirm('yakin?');">Hapus</a>
                    <?php endif ?>
                    <?php endif ?> -->
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['login'])): ?>
        <?php if($_SESSION['isAdmin'] == 0): ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/customer/ubah/<?= $data['customer']['idUser']; ?>" method="post">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $data['customer']['idUser']; ?>">
                        <div class="form-group">
                            <h5 class="text-center">Form Pemesanan</h5>
                            <hr>
                            <input type="hidden" value="<?= $data['room']['idRoom']?>" name="idRoom">
                            <div class="form-group mb-3">
                                <label for="userName">User name</label>
                                <input type="hidden" value="<?= $_SESSION['idUser']?>" name="idUser">
                                <input type="text" class="form-control" autocomplete="off" required
                                    value="<?= $_SESSION['userName']?>" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="userName">Harga</label>
                                <input type="hidden" value="<?= $data['room']['priceRoomType']?>" name="totalPrice">
                                <input type="text" class="form-control" autocomplete="off" required
                                    value="Rp <?= number_format($data['room']['priceRoomType'])?>/malam" disabled>
                            </div>
                            <div class=" form-group mb-3">
                                <label for="durasi">Durasi</label>
                                <select class="form-select" name="durasi">
                                    <?php for($no = 1;$no <= 30;$no++) :?>
                                    <option value="<?= $no;?>"><?= $no;?> hari</option>
                                    <?php endfor;?>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-3" style="border-radius: 100px;">Pesan
                                    sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if($_SESSION['isAdmin'] == 1): ?>
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/pemesanan/ubahDataPemesanan ?>" method="POST">
                <div class="form-group">
                    <h5 class="text-center">Update Pemesanan</h5>
                    <hr>
                    <input type="hidden" value="<?= $data['getPemesanan']['idBooking']?>" name="idBooking">
                    <div class="form-group mb-3">
                        <label for="userName">Kamar nomor</label>
                        <select class="form-select" name="idRoom">
                            <?php foreach($data['getAllRoom'] as $room) : ?>
                            <?php if($data['getPemesanan']['noRoom'] == $room['idRoom']) { ?>

                            <?php $selected = "selected"; } else { $selected = " ";} ?>
                            <option value="<?= $room['idRoom']?>" <?= $selected;?>>
                                <?= $room['noRoom']?> (<?= $room['nameRoomType']?>)</option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="userName">Nama Customer</label>
                        <select class="form-select" name="idUser">
                            <?php foreach($data['customer'] as $customer) : ?>
                            <?php if($data['getPemesanan']['idUser'] == $customer['idUser']) { ?>

                            <?php $selected = "selected"; } else { $selected = " ";} ?>
                            <option value="<?= $customer['idUser']?>" <?= $selected;?>>
                                <?= $customer['namaUser']?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="userName">Check In</label>
                        <input type="datetime-local"
                            value="<?= date('Y-m-d h:i:s', strtotime($data['getPemesanan']['checkIn'])); ?>"
                            class="form-control date" name="checkIn" REQUIRED>
                    </div>
                    <div class="form-group mb-3">
                        <label for="userName">Check Out</label>
                        <input type="datetime-local"
                            value="<?= date('Y-m-d h:i:s', strtotime($data['getPemesanan']['checkOut'])); ?>"
                            class="form-control date" name="checkOut">
                    </div>
                    <div class=" form-group mb-3">
                        <label for="durasi">Status:</label>
                        <select class="form-select" name="idStatus">
                            <option value="<?= $data['getPemesanan']['idStatus']; ?>">
                                <?php if( $data['getPemesanan']['idStatus'] == 0 ) : ?>
                                Pending
                                <?php endif;?>
                                <?php if( $data['getPemesanan']['idStatus'] == 1 ) : ?>
                                Check In
                                <?php endif;?>
                                <?php if( $data['getPemesanan']['idStatus'] == 2 ) : ?>
                                Check Out
                                <?php endif;?>
                                <?php if( $data['getPemesanan']['idStatus'] == 3 ) : ?>
                                Completed
                                <?php endif;?>
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="userName">Total Bayar:</label>
                        <input type="text" value="<?=  number_format($data['getPemesanan']['totalHarga'])?>"
                            class="form-control date" disabled>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success mt-3" style="border-radius: 100px;">Ubah data
                        </button>
                        <a href="<?= BASEURL; ?>/pemesanan/hapusPemesanan/<?= $data['getPemesanan']['idBooking']; ?>/<?= $data['getPemesanan']['idRoom']; ?>"
                            class="btn btn-outline-danger mt-3" style="border-radius: 100px;"
                            onclick="return confirm('yakin?');">Batalkan pesanan</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php endif ?>
<?php endif ?>


</div>