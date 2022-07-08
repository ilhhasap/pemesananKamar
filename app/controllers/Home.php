<?php 

class Home extends Controller {
    
    public function index()
    {
        
        $data['standardRoom'] = $this->model('RoomModel')->getAllStandardRoom();
        $data['superiorRoom'] = $this->model('RoomModel')->getAllSuperiorRoom();
        $data['deluxeRoom'] = $this->model('RoomModel')->getAllDeluxeRoom();

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
        
        // Kamar sudah terisi, tidak bisa dipesan dan arahkan ke home
        if ($data['room']['isBooked'] == 1) {
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
    
}