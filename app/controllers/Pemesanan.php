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

        // Kalo admin
        if ( $_SESSION['isAdmin'] == 1 ) {
            $data['judul'] = 'Pemesanan';
            $data['getPemesananPending'] = $this->model('PemesananModel')->getAllPemesanan(0);
            $data['getPemesananCheckIn'] = $this->model('PemesananModel')->getAllPemesanan(1);
            $data['getPemesananCheckOut'] = $this->model('PemesananModel')->getAllPemesanan(2);
            $data['getPemesananCompleted'] = $this->model('PemesananModel')->getAllPemesanan(3);
            $data['getAllRoom'] = $this->model('RoomModel')->getAllRoom();
            $data['customer'] = $this->model('CustomerModel')->getAllCustomer();
        } else {
            // Kalo tamu
            $idUser = $_SESSION['idUser'];
            $data['judul'] = 'Pesanan Saya';
            $data['getPemesanan'] = $this->model('PemesananModel')->getAllPemesananById($idUser);
        }
        
        $this->view('templates/header', $data);
        $this->view('pemesanan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($idBooking)
    {
        $data['getPemesanan'] = $this->model('PemesananModel')->getAllPemesananByIdBooking($idBooking);
        $data['judul'] = 'Detail Pemesanan';
        $this->view('templates/header', $data);
        $this->view('pemesanan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('PemesananModel')->tambahDataPemesanan($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        }
    }

    public function prosesCheckIn($idBooking, $idStatus)
    {
        if( $this->model('PemesananModel')->prosesCheckIn($idBooking, $idStatus) > 0 ) {
            Flasher::setFlash('Pemesanan Berhasil', 'Check In', 'success');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        } else {
            Flasher::setFlash('Pemesanan Gagal', 'Check In', 'danger');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        } 
    }

    public function prosesCheckOut($idBooking, $idStatus)
    {
        if( $this->model('PemesananModel')->prosesCheckIn($idBooking, $idStatus) > 0 ) {
            Flasher::setFlash('Pemesanan Berhasil', 'Check Out', 'success');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        } else {
            Flasher::setFlash('Pemesanan Gagal', 'Check Out', 'danger');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        } 
    }
    
    public function prosesCompleted($idBooking, $idStatus)
    {
        if( $this->model('PemesananModel')->prosesCheckIn($idBooking, $idStatus) > 0 ) {
            Flasher::setFlash('Pemesanan Berhasil', 'Diselesaikan', 'success');
            header('Location: ' . BASEURL . '/pemesanan');
            exit;
        } else {
            Flasher::setFlash('Pemesanan Gagal', 'Diselesaikan', 'danger');
            header('Location: ' . BASEURL . '/pemesanan');
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