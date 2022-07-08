<div class="container mt-5">

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['peminjaman']['judul']; ?></h5>
                    <h6 class="card-subtitle mb-3 text-muted"><?= $data['peminjaman']['username']; ?></h6>
                    <small class="card-text">Status:</small>
                    <?php if($data['peminjaman']['dikembalikan'] > 0): ?>
                        <p class="card-text font-weight-bold text-success">Dikembalikan</p>
                    <?php else: ?>
                        <p class="card-text font-weight-bold text-danger">Belum Dikembalikan</p>
                    <?php endif ?>
                    <small class="card-text">Tanggal Peminjman:</small>
                    <p class="card-text font-weight-bold"><?= date('j F Y', strtotime($data['peminjaman']['pinjam'])); ?></p>
                    <small class="card-text">Batas Pengembalian:</small>
                    <p class="card-text font-weight-bold"><?= date('j F Y', strtotime($data['peminjaman']['kembali'])); ?></p>
                    <a href="<?= BASEURL; ?>/peminjaman" class="card-link">Kembali</a>
                    <?php if($data['peminjaman']['dikembalikan'] == 0): ?>
                        <a href="<?= BASEURL; ?>/peminjaman/dikembalikan/<?= $data['peminjaman']['id'] ?>" class="card-link text-success float-right">Kembalikan Buku</a>
                    <?php endif ?>
                </div>
            </div>
        </div>


    </div>