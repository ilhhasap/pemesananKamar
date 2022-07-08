<?php 

class PeminjamanModel {
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT
        peminjaman.*, buku.judul, pengguna.username
        FROM peminjaman
        INNER JOIN buku ON peminjaman.buku=buku.id
        INNER JOIN pengguna ON peminjaman.pengguna=pengguna.id
        ');
        return $this->db->resultSet();
    }

    public function getAllPeminjamanById($id)
    {
        $this->db->query('SELECT 
        peminjaman.*, buku.judul, pengguna.username
        FROM peminjaman
        INNER JOIN buku ON peminjaman.buku=buku.id
        INNER JOIN pengguna ON peminjaman.pengguna=pengguna.id  
        WHERE peminjaman.pengguna=:id
        ');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT 
        peminjaman.*, buku.judul, pengguna.username
        FROM peminjaman
        INNER JOIN buku ON peminjaman.buku=buku.id
        INNER JOIN pengguna ON peminjaman.pengguna=pengguna.id 
        WHERE peminjaman.id=:id
        ');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataPeminjaman($data)
    {
        $query = 'INSERT INTO peminjaman 
        VALUES (NULL, :buku, :pengguna, :pinjam, :kembali, 0)';

        $pinjam= date('Y-m-d h:i:s');
        $kembali = date('Y-m-d h:i:s', strtotime($pinjam . ' + 7 days'));
        
        $this->db->query($query);
        $this->db->bind('buku', $data['buku']);
        $this->db->bind('pengguna', $data['pengguna']);
        $this->db->bind('pinjam', $pinjam);
        $this->db->bind('kembali', $kembali);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPeminjaman($data)
    {
        $query = "UPDATE peminjaman SET
                    buku = :buku,
                    pengguna = :pengguna,
                    pinjam = :pinjam,
                    kembali = :kembali,
                    dikembalikan = 1
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('buku', $data['buku']);
        $this->db->bind('pengguna', $data['pengguna']);
        $this->db->bind('pinjam', $data['pinjam']);
        $this->db->bind('kembali', $data['kembali']);

        $this->db->execute();

        return $this->db->rowCount();
    }

}