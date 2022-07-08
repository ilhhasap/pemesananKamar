<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h3>Daftar Pemesanan</h3>
            <?php Flasher::flash(); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $data['customer'] as $customer ) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $customer['namaUser']; ?></td>
                        <td><?= $customer['userName']; ?></td>
                        <td>Tamu</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <?php foreach( $data['peminjaman'] as $p ) : ?>
                <li class="list-group-item">
                    <?= $p['judul']; ?>
                    <?php if($p['dikembalikan'] > 0): ?>
                    <a class="badge badge-success float-right text-white">dikembalikan</a>
                    <?php else: ?>
                    <a class="badge badge-danger float-right text-white">belum dikembalikan</a>
                    <?php endif ?>
                    <a href="<?= BASEURL; ?>/peminjaman/detail/<?= $p['id']; ?>"
                        class="badge badge-primary float-right">detail</a>
                </li>
                <?php endforeach; ?> -->
        </div>
    </div>
</div>