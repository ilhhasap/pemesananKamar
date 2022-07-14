<?php 

class Customer extends Controller {

    public function __construct() {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/pengguna/masuk');
            exit;
        }
    }
    
    public function index()
    {
        $data['page'] = 'customer';
        $data['judul'] = 'Data User';
        $data['userAdmin'] = $this->model('CustomerModel')->getAllAdmin();
        $data['customer'] = $this->model('CustomerModel')->getAllCustomer();
        $this->view('templates/header', $data);
        $this->view('customer/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Customer';
        $data['customer'] = $this->model('CustomerModel')->getCustomerById($id);
        $this->view('templates/header', $data);
        $this->view('customer/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('CustomerModel')->tambahDataUser($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/customer');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function hapus($idUser)
    {
        if( $this->model('CustomerModel')->hapusDataUser($idUser) > 0 ) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/customer');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/customer');
            exit;
        }
    }

    public function ubah()
    {
        if( $this->model('CustomerModel')->ubahDataUser($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/customer');
            exit;
        } else {
            Flasher::setFlash('Data berhasil', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/customer');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Customer';
        $data['customer'] = $this->model('CustomerModel')->cariDataUser();
        $this->view('templates/header', $data);
        $this->view('customer/index', $data);
        $this->view('templates/footer');
    }

}