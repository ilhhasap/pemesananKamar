<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-1 mb-md-0">
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

    <ul class="nav nav-tabs d-flex justify-content-start align-items-center pt-0" id="tableTab" role="tablist">
        <div class="align-items-center me-3">
            Tipe Kamar :
        </div>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="standardRoom-tab" data-bs-toggle="tab" data-bs-target="#standardRoom"
                type="button" role="tab" aria-controls="standardRoom" aria-selected="true">Standard</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="superiorRoom-tab" data-bs-toggle="tab" data-bs-target="#superiorRoom"
                type="button" role="tab" aria-controls="superiorRoom" aria-selected="false">Superior</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="deluxeRoom-tab" data-bs-toggle="tab" data-bs-target="#deluxeRoom" type="button"
                role="tab" aria-controls="deluxeRoom" aria-selected="false">Deluxe</button>
        </li>
    </ul>

    <div class="tab-content" id="tableTabContent">

        <div class="tab-pane fade show active" id="standardRoom" role="tabpanel" aria-labelledby="standardRoom-tab">
            <div class="col-md-4">
                <?php Flasher::flash(); ?>
            </div>
            <div class="row gap-5">
                <?php foreach($data['standardRoom'] as $room) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <span style="background-color: <?= $room['isBooked'] == 0 ? '#e6ffea' : '#ffe9e6';?>;"
                            class="badge text-<?= $room['isBooked'] == 0 ? 'success' : 'danger';?> mb-2 py-1 px-2"><?= $room['isBooked'] == 0 ? 'Tersedia' : 'Terisi';?></span>
                        <h5 class="card-title font-weight-bold">Kamar 0<?= $room['noRoom'];?></h5>
                        <p class="card-text"><?= $room['nameRoomType'];?></p>
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
                <?php endforeach; ?>
            </div>
        </div>

        <div class="tab-pane fade" id="superiorRoom" role="tabpanel" aria-labelledby="superiorRoom-tab">
            <div class="row gap-5">
                <?php foreach($data['superiorRoom'] as $room) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <span style="background-color: <?= $room['isBooked'] == 0 ? '#e6ffea' : '#ffe9e6';?>;"
                            class="badge text-<?= $room['isBooked'] == 0 ? 'success' : 'danger';?> mb-2 py-1 px-2"><?= $room['isBooked'] == 0 ? 'Tersedia' : 'Terisi';?></span>
                        <h5 class="card-title font-weight-bold">Kamar 0<?= $room['noRoom'];?></h5>
                        <p class="card-text"><?= $room['nameRoomType'];?></p>
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
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="deluxeRoom" role="tabpanel" aria-labelledby="deluxeRoom-tab">
            <div class="row gap-5">
                <?php foreach($data['deluxeRoom'] as $room) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <span style="background-color: <?= $room['isBooked'] == 0 ? '#e6ffea' : '#ffe9e6';?>;"
                            class="badge text-<?= $room['isBooked'] == 0 ? 'success' : 'danger';?> mb-2 py-1 px-2"><?= $room['isBooked'] == 0 ? 'Tersedia' : 'Terisi';?></span>
                        <h5 class="card-title font-weight-bold">Kamar 0<?= $room['noRoom'];?></h5>
                        <p class="card-text"><?= $room['nameRoomType'];?></p>
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
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>