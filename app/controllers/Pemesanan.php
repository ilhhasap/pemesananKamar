<?php 

class Pemesanan extends Controller {

    public function __construct() {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/pengguna/masuk');
            exit;
        }
    }

    public function index()
    {
        // $peminjaman = $this->model('PeminjamanModel')->getAllPeminjamanById($_SESSION['id']);
        // $data['peminjaman'] = $peminjaman;
        $data['judul'] = 'Pemesanan';
        $this->view('templates/header', $data);
        $this->view('pemesanan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $peminjaman = $this->model('PeminjamanModel')->getPeminjamanById($id);
        $data['peminjaman'] = $peminjaman;
        $data['judul'] = 'DetailPeminjaman';
        $this->view('templates/header', $data);
        $this->view('peminjaman/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah($id)
    {
        $data['buku'] = $id;
        $data['pengguna'] = $_SESSION['id'];
        if( $this->model('PeminjamanModel')->tambahDataPeminjaman($data) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    }

    public function dikembalikan($id)
    {
        $peminjaman = $this->model('PeminjamanModel')->getPeminjamanById($id);
        $data['buku'] = $peminjaman['buku'];
        $data['pengguna'] = $_SESSION['id'];
        $data['id'] = $id;
        $data['pinjam'] = $peminjaman['pinjam'];
        $data['kembali'] = $peminjaman['kembali'];
        if( $this->model('PeminjamanModel')->ubahDataPeminjaman($data) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    }
}