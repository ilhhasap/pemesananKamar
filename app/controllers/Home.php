<?php 

class Home extends Controller {
    
    public function index()
    {
        
        $data['standardRoom'] = $this->model('RoomModel')->getAllStandardRoom();
        $data['superiorRoom'] = $this->model('RoomModel')->getAllSuperiorRoom();
        $data['deluxeRoom'] = $this->model('RoomModel')->getAllDeluxeRoom();
        $data['getAllRoomType'] = $this->model('RoomModel')->getAllRoomType();
            
        $data['page'] = 'home';
        $data['judul'] = 'Beranda';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Kamar';
        $data['room'] = $this->model('RoomModel')->getRoomById($id);
        $data['getAllRoomType'] = $this->model('RoomModel')->getAllRoomType();
        $data['getBookingByIdRoom'] = $this->model('PemesananModel')->getBookingByIdRoom($id);
        
        // Jika Kamar sudah terisi dan bukan admin, tidak bisa dipesan dan arahkan ke home
        if ($data['room']['isBooked'] == 1 && $_SESSION['isAdmin'] == 0) {
            header('Location: ' . BASEURL);
            exit;
        }

        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/pengguna/masuk');
            exit;
        }
        
        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer');
    }

    
    public function tambahPemesanan()
    {
        if( $this->model('PemesananModel')->tambahDataPemesanan($_POST, $_POST['priceRoomType']) > 0 ) {
            if( $this->model('PemesananModel')->updateRoomBooked($_POST['idRoom']) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    } else {
        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        header('Location: ' . BASEURL . '/home');
        exit;
    }
}

    public function tambahKamar()
    {
        if( $this->model('RoomModel')->tambahDataKamar($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function ubahKamar()
    {
        if( $this->model('RoomModel')->ubahDataKamar($_POST) > 0 ) {
            Flasher::setFlash('Kamar ' . $_POST['noRoom'] . ' berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Kamar ' . $_POST['noRoom'] . ' gagal', 'diupdate', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        } 
    }

    public function hapusKamar($idRoom)
    {
        if( $this->model('RoomModel')->hapusDataKamar($idRoom) > 0 ) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    
}