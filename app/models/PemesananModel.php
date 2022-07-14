<?php 

class PemesananModel {
    private $table = 'booking';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPemesanan()
    {
        $this->db->query('SELECT * FROM booking INNER JOIN room ON room.idRoom = booking.idRoom INNER JOIN user ON user.idUser = booking.idUser INNER JOIN status ON status.idStatus = booking.idStatus ORDER BY booking.idStatus ASC');
        
        return $this->db->resultSet();
    }

    public function getAllPemesananById($idUser)
    {
        $this->db->query('SELECT
         * FROM ' 
         . $this->table . 
         ' INNER JOIN room ON room.idRoom = booking.idRoom INNER JOIN user ON user.idUser = booking.idUser INNER JOIN status ON status.idStatus = booking.idStatus WHERE booking.idUser =:idUser');
         
        $this->db->bind('idUser', $idUser);
        return $this->db->single();
    }
    
    public function getAllPemesananByIdBooking($idBooking)
    {
        $this->db->query('SELECT
         * FROM ' 
         . $this->table . 
         ' INNER JOIN room ON room.idRoom = booking.idRoom INNER JOIN user ON user.idUser = booking.idUser INNER JOIN status ON status.idStatus = booking.idStatus WHERE booking.idBooking =:idBooking');
         
        $this->db->bind('idBooking', $idBooking);
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