<div class="col-12 col-xl-9">
    <div class="row nav align-items-start">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <span style="background-color: <?= $data['room']['isBooked'] == 0 ? '#e6ffea' : '#ffe9e6';?>;"
                        class="badge text-<?= $data['room']['isBooked'] == 0 ? 'success' : 'danger';?> mb-2 py-1 px-2"><?= $data['room']['isBooked'] == 0 ? 'Tersedia' : 'Terisi';?></span>
                    <h5 class="card-title">Kamar 0<?= $data['room']['noRoom']; ?></h5>
                    <p class="card-text"><?= $data['room']['nameRoomType'];?></p>
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
                    <form action="<?= BASEURL; ?>/home/tambahPemesanan" method="post">
                        <input type="hidden" name="idRoom" id="idRoom" value="<?= $data['room']['idRoom']; ?>">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $data['customer']['idUser']; ?>">
                        <div class="form-group">
                            <h5 class="text-center">Form Pemesanan</h5>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="userName">User name</label>
                                <input type="hidden" value="<?= $_SESSION['idUser']?>" name="idUser">
                                <input type="text" class="form-control" autocomplete="off" required
                                    value="<?= $_SESSION['userName']?>" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="userName">Harga</label>
                                <input type="hidden" value="<?= $data['room']['priceRoomType']?>" name="price">
                                <input type="text" class="form-control" autocomplete="off" required
                                    value="Rp <?= number_format($data['room']['priceRoomType'])?>/malam" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="userName">Check In</label>
                                <input type="datetime-local" class="form-control date" name="checkIn" required>
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
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php if( $data['getBookingByIdRoom'] > 0) : ?>
                        Dipesan oleh : <strong><?= $data['getBookingByIdRoom']['namaUser'];?></strong>
                        <?php else : ?>
                        Belum dipesan
                        <?php endif;?>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success mt-3" style="border-radius: 100px;">Ubah data
                        </button>
            </form>
            <a href="<?= BASEURL; ?>/home/hapusKamar/<?= $data['room']['idRoom']; ?>"
                class="btn btn-outline-danger mt-3" style="border-radius: 100px;"
                onclick="return confirm('yakin?');">Hapus</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php endif ?>
<?php endif ?>


</div>