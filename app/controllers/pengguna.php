<?php 

class pengguna extends Controller {

    public function masuk()
    {
        $pengguna = $this->model('PenggunaModel')->getAllPengguna();
        if (isset($_POST['submit'])) {
            foreach ($pengguna as $p) {
                if ($p['userName'] == $_POST['userName'] && $p['password'] == $_POST['password']) {

                    $_SESSION['idUser'] = $p['idUser'];
                    $_SESSION['userName'] = $p['userName'];
                    $_SESSION['namaUser'] = $p['namaUser'];
                    $_SESSION['isAdmin'] = $p['isAdmin'];
                    $_SESSION['login'] = true;
                    header('Location: ' . BASEURL);
                    exit;
                }
            }
        }
        $data['page'] = 'masuk';
        $data['judul'] = 'Masuk';
        $this->view('templates/header', $data);
        $this->view('pengguna/masuk', $data);
        $this->view('templates/footer');
    }

    public function keluar()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: " . BASEURL);
        exit;
    }

    public function daftar()
    {
        $pengguna = $this->model('PenggunaModel')->checkUsername($_POST['userName']);
        if($pengguna > 0) {
            Flasher::setFlash('telah', 'digunakan', 'danger');
            header('Location: ' . BASEURL . '/pengguna/masuk');
            exit;
        } else {
        if (isset($_POST['submit'])) {
            if ($_POST['userName'] == null) {
                echo 'tidak boleh kosong';
            } else {
                if( $this->model('PenggunaModel')->tambahPengguna($_POST) > 0 ) {
                    Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                    header('Location: ' . BASEURL . '/pengguna/masuk');
                    exit;
                } else {
                    Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                    header('Location: ' . BASEURL . '/pengguna/masuk');
                    exit;
                }
            }
            
        } else {
            header('Location: ' . BASEURL . '/pengguna/masuk');
            exit;
            }
        }
    }
}