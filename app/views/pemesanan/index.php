<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h2 class="nav-title"><?= $data['judul']?></h2>
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="./assets/img/global/sidebar/profile.png" alt="">
                </button>
                <?php if(isset($_SESSION['login'])) : ?>
                <?php if($_SESSION['isAdmin'] == 1) : ?>
                <a href="" class="btn btn-primary py-2 px-3" style="border-radius: 100px;" data-bs-toggle="modal"
                    data-bs-target="#formModal"><i class="bi bi-plus-lg me-1"></i>Tambah
                    Pemesanan</a>

                <?php endif; ?>
                <?php endif; ?>
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
            <?php if(isset($_SESSION['login'])) : ?>
            <?php if($_SESSION['isAdmin'] == 0) : ?>
            <div class="tab-content" id="tableTabContent">
                <div class="tab-pane fade show active" id="tamu" role="tabpanel" aria-labelledby="tamu-tab">
                    <div class="col-md-4">
                        <?php Flasher::flash(); ?>
                    </div>
                    <div class="row gap-5">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <?php if( $data['getPemesanan']['idStatus'] == 0 ) : ?>
                                <span class="badge bg-warning">Pending (Konfirmasi ditempat)</span>
                                <?php endif;?>
                                <?php if( $data['getPemesanan']['idStatus'] == 1 ) : ?>
                                <span class="badge bg-success">Sudah Check In</span>
                                <?php endif;?>
                                <?php if( $data['getPemesanan']['idStatus'] == 2 ) : ?>
                                <span class="badge bg-danger">Telah Check Out</span>
                                <?php endif;?>
                                <?php if( $data['getPemesanan']['idStatus'] == 3 ) : ?>
                                <span class="badge bg-success"><i class="bi bi-check-lg"></i> Completed</span>
                                <?php endif;?>
                                <h5 class="card-title font-weight-bold">Kamar 0<?= $data['getPemesanan']['noRoom']; ?>
                                </h5>
                                <p class="card-text"><?= $data['getPemesanan']['namaUser']; ?></p>
                                <div class="d-grid">
                                    <?php if(isset($_SESSION['login']) && $_SESSION['isAdmin'] == 1 ) : ?>
                                    <a type="button" href="<?= BASEURL; ?>/home/detail/<?= $room['idRoom']; ?>"
                                        class="btn btn-primary mt-3" style="border-radius: 100px;">Edit Kamar</a>
                                    <?php else : ?>
                                    <a type="button" href="<?= BASEURL; ?>/home/detail/<?= $room['idRoom']; ?>"
                                        class="btn btn-primary mt-3 <?= $room['isBooked'] == 0 ? ' ' : 'disabled'?>"
                                        style="border-radius: 100px;">Lihat Detail</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <?php else : ?>
            <!-- ADMIN -->
            <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                        type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="checkIn-tab" data-bs-toggle="tab" data-bs-target="#checkIn"
                        type="button" role="tab" aria-controls="checkIn" aria-selected="false">Check In</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="checkOut-tab" data-bs-toggle="tab" data-bs-target="#checkOut"
                        type="button" role="tab" aria-controls="checkOut" aria-selected="false">Check Out</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="done-tab" data-bs-toggle="tab" data-bs-target="#done" type="button"
                        role="tab" aria-controls="done" aria-selected="false">Completed</button>
                </li>
            </ul>

            <div class="tab-content" id="tableTabContent">
                <div class="col-md-4">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <div class="table-responsive">
                        <table class="table bg-white table-borderless w-100 active" id="table-pending">
                            <thead>
                                <tr>
                                    <th style="padding: 24px !important;">Atas nama</th>
                                    <!-- <th>Status</th> -->
                                    <th colspan="2">Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach($data['getPemesananPending'] as $pemesanan) : ?>
                                <tr>
                                    <td style="padding: 24px !important;" class="text-start">
                                        <?= $pemesanan['namaUser']?></td>
                                    <!-- <td><?= ($pemesanan['idStatus'] == 0) ? 'Pending' : (($pemesanan['idStatus'] == 1) ? 'Check In' : ($pemesanan['idStatus'] == 2) ? 'Check Out' : 'Canceled') ?>
                                    </td> -->
                                    <td colspan="2" class="align-items-center">Kamar <?= $pemesanan['noRoom']?> <span
                                            class="badge bg-light text-success"><?= $pemesanan['nameRoomType']?></span>
                                    </td>
                                    <td class=""><?= $pemesanan['checkIn']?></td>
                                    <td class=""><?= $pemesanan['checkOut']?></td>
                                    <td class="action">

                                        <a href="<?= BASEURL; ?>/pemesanan/detail/<?= $pemesanan['idBooking']; ?>"
                                            class="badge bg-light mx-auto text-dark text-decoration-none">Detail</a>
                                        <a href="<?= BASEURL; ?>/pemesanan/prosesCheckIn/<?= $pemesanan['idBooking']; ?>/<?= $pemesanan['idStatus']; ?>"
                                            class="badge bg-success mx-auto text-decoration-none"><i
                                                class="bi bi-check-lg"></i> Sudah bayar</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <!-- CHECK IN -->
                <div class="tab-pane fade" id="checkIn" role="tabpanel" aria-labelledby="checkIn-tab">
                    <div class="table-responsive">
                        <table class="table bg-white table-borderless w-100 active" id="myTable table-checkIn">
                            <thead>
                                <tr>
                                    <th style="padding: 24px !important;">Atas nama</th>
                                    <!-- <th>Status</th> -->
                                    <th colspan="2">Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach($data['getPemesananCheckIn'] as $pemesanan) : ?>
                                <tr>
                                    <td style="padding: 24px !important;" class="text-start">
                                        <?= $pemesanan['namaUser']?></td>
                                    <!-- <td><?= ($pemesanan['idStatus'] == 0) ? 'Pending' : (($pemesanan['idStatus'] == 1) ? 'Check In' : ($pemesanan['idStatus'] == 2) ? 'Check Out' : 'Canceled') ?>
                                    </td> -->
                                    <td colspan="2" class="align-items-center">Kamar <?= $pemesanan['noRoom']?> <span
                                            class="badge bg-light text-success"><?= $pemesanan['nameRoomType']?></span>
                                    </td>
                                    <td class=""><?= $pemesanan['checkIn']?></td>
                                    <td class=""><?= $pemesanan['checkOut']?></td>
                                    <td class="action">

                                        <a href="<?= BASEURL; ?>/pemesanan/detail/<?= $pemesanan['idBooking']; ?>"
                                            class="badge bg-light mx-auto text-dark text-decoration-none">Detail</a>
                                        <a href="<?= BASEURL; ?>/pemesanan/prosesCheckOut/<?= $pemesanan['idBooking']; ?>/<?= $pemesanan['idStatus']; ?>/<?= $pemesanan['idRoom']; ?>"
                                            class="badge bg-danger mx-auto text-decoration-none"><i
                                                class="bi bi-check-lg"></i> Check
                                            Out</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- AKHIR CHECK IN -->



                <!-- CHECK OUT -->
                <div class="tab-pane fade" id="checkOut" role="tabpanel" aria-labelledby="checkOut-tab">
                    <div class="table-responsive">
                        <table class="table bg-white table-borderless w-100 active" id="table-checkOut">
                            <thead>
                                <tr>
                                    <th style="padding: 24px !important;">Atas nama</th>
                                    <!-- <th>Status</th> -->
                                    <th colspan="2">Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach($data['getPemesananCheckOut'] as $pemesanan) : ?>
                                <tr>
                                    <td style="padding: 24px !important;" class="text-start">
                                        <?= $pemesanan['namaUser']?></td>
                                    <!-- <td><?= ($pemesanan['idStatus'] == 0) ? 'Pending' : (($pemesanan['idStatus'] == 1) ? 'Check In' : ($pemesanan['idStatus'] == 2) ? 'Check Out' : 'Canceled') ?>
                                    </td> -->
                                    <td colspan="2" class="align-items-center">Kamar <?= $pemesanan['noRoom']?> <span
                                            class="badge bg-light text-success"><?= $pemesanan['nameRoomType']?></span>
                                    </td>
                                    <td class=""><?= $pemesanan['checkIn']?></td>
                                    <td class=""><?= $pemesanan['checkOut']?></td>
                                    <td class="action">

                                        <a href="<?= BASEURL; ?>/pemesanan/detail/<?= $pemesanan['idBooking']; ?>"
                                            class="badge bg-light mx-auto text-dark text-decoration-none">Detail</a>
                                        <a href="<?= BASEURL; ?>/pemesanan/prosesCompleted/<?= $pemesanan['idBooking']; ?>/<?= $pemesanan['idStatus']; ?>"
                                            class="badge bg-success mx-auto text-decoration-none"><i
                                                class="bi bi-check-lg"></i> Selesai</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- AKHIR CHECK OUT -->



                <!-- CANCELLED -->
                <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
                    <div class="table-responsive">
                        <table class="table bg-white table-borderless w-100 active" id="table-done">
                            <thead>
                                <tr>
                                    <th style="padding: 24px !important;">Atas nama</th>
                                    <!-- <th>Status</th> -->
                                    <th colspan="2">Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th class="text-start">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach($data['getPemesananCompleted'] as $pemesanan) :?>
                                <tr>
                                    <td style="padding: 24px !important;" class="text-start">
                                        <?= $pemesanan['namaUser']?></td>
                                    <!-- <td><?= ($pemesanan['idStatus'] == 0) ? 'Pending' : (($pemesanan['idStatus'] == 1) ? 'Check In' : ($pemesanan['idStatus'] == 2) ? 'Check Out' : 'Canceled') ?>
                                    </td> -->
                                    <td colspan="2" class="align-items-center">Kamar <?= $pemesanan['noRoom']?> <span
                                            class="badge bg-light text-success"><?= $pemesanan['nameRoomType']?></span>
                                    </td>
                                    <td class=""><?= $pemesanan['checkIn']?></td>
                                    <td class=""><?= $pemesanan['checkOut']?></td>
                                    <td class="action">

                                        <a href="<?= BASEURL; ?>/pemesanan/detail/<?= $pemesanan['idBooking']; ?>"
                                            class="badge bg-light mx-auto text-dark text-decoration-none">Detail</a>
                                        <!-- <a href="<?= BASEURL; ?>/pemesanan/prosesSelesai/<?= $pemesanan['idBooking']; ?>/<?= $pemesanan['idStatus']; ?>"
                                            class="badge bg-success mx-auto text-decoration-none"><i
                                                class="bi bi-check-lg"></i> Check
                                            In</a> -->
                                    </td>
                                </tr>
                                <?php endforeach;?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- AKHIR CANCELLED -->


            </div>


            <!-- Modal -->
            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModtamuabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModtamuabel">Tambah <?= $data['judul']?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="<?= BASEURL; ?>/pemesanan/tambah" method="post">

                                <div class="form-group mb-3">
                                    <label for="userName">Kamar No</label>
                                    <select class="form-select" name="idRoom" id="idRoom">
                                        <option selected disabled>--Pilih Kamar--</option>
                                        <?php foreach($data['getAllRoom'] as $pemesanan) : ?>
                                        <option value="<?= $pemesanan['idRoom']?>"><?= $pemesanan['noRoom']?>
                                            (<?= $pemesanan['nameRoomType']?>)
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <label for="userName">Harga</label>
                                    <input type="text" class="form-control" value="" name="price" id="price" disabled>
                                </div> -->
                                <div class="form-group mb-3">
                                    <label for="userName">Nama Customer</label>
                                    <select class="form-select" name="idUser">
                                        <option selected disabled>--Pilih Customer--</option>
                                        <?php foreach($data['customer'] as $customer) : ?>
                                        <option value="<?= $customer['idUser']?>"><?= $customer['namaUser'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php endif;?>

        </div>
    </div>

</div>
</div>
<script type="text/javascript">
//apabila terjadi event onchange terhadap object <select id=form_prov>
function tampilHarga() {
    $.ajax({
        type: "POST",
        URL: "{{ route('calendar.specificMonth', 'date') }}",
        data: data,
        success: function() {
            console.log("works");
        }
    });
}
</script>