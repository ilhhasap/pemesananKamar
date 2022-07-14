<div class="col-12 col-xl-9">
    <div class="row nav align-items-start">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <span
                        class="badge bg-<?= ($data['getPemesanan']['idStatus'] == 0) ? 'warning' : (($data['getPemesanan']['idStatus'] == 1) ? 'success' : ($data['getPemesanan']['idStatus'] == 2) ? 'danger' : 'secondary');?>"><?= ($data['getPemesanan']['idStatus'] == 0) ? 'Pending' : (($data['getPemesanan']['idStatus'] == 1) ? 'Check In' : ($data['getPemesanan']['idStatus'] == 2) ? 'Check Out' : 'Canceled');?></span>
                    <h5 class="card-title"><?= $data['getPemesanan']['namaUser']; ?></h5>
                    <p class="card-text"><?= $data['getPemesanan']['namaUser']; ?></p>
                    <a href="<?= BASEURL; ?>" class="card-link">Kembali</a>
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
            <form action="<?= BASEURL; ?>/home/ubahKamar ?>" method="POST">
                <div class="form-group">
                    <h5 class="text-center">Update Kamar</h5>
                    <hr>
                    <input type="hidden" value="<?= $data['room']['idRoom']?>" name="idRoom">
                    <div class="form-group mb-3">
                        <label for="userName">Kamar nomor</label>
                        <input type="hidden" class="form-control" name="noRoom" value="<?= $data['room']['noRoom'];?>">
                        <input type="text" class="form-control" value="<?= $data['room']['noRoom'];?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="userName">Tipe Kamar</label>
                        <select class="form-select" name="idRoomType">
                            <?php foreach($data['getAllRoomType'] as $roomType) : ?>
                            <?php if($data['room']['idRoomType'] == $roomType['idRoomType']) { ?>

                            <?php $selected = "selected"; } else { $selected = " ";} ?>
                            <option value="<?= $roomType['idRoomType']?>" <?= $selected;?>>
                                <?= $roomType['nameRoomType']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class=" form-group mb-3">
                        <label for="durasi">Status:</label>
                        <select class="form-select" name="isBooked">
                            <?php if($data['room']['isBooked'] == 0): ?> // Status Tersedia
                            <option value="0">Tersedia</option>
                            <option value="1">Sudah Terisi</option>
                            <?php else:?>
                            <option value="1">Sudah Terisi</option>
                            <option value="0">Tersedia</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success mt-3" style="border-radius: 100px;">Ubah data
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
<?php endif ?>


</div>