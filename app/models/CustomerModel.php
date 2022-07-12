<?php 

class CustomerModel {
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCustomer()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE isAdmin = 0');
        // $this->db->query('SELECT * FROM ' . $this->table );
        return $this->db->resultSet();
    }

    public function getAllAdmin()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE isAdmin = 1');
        return $this->db->resultSet();
    }

    public function getCustomerById($idUser)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE idUser=:idUser');
        $this->db->bind('idUser', $idUser);
        return $this->db->single();
    }

    public function tambahDataUser($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (NULL, :namaUser, :userName, :password, :isAdmin)';
        
        $this->db->query($query);
        $this->db->bind('userName', $data['userName']);
        $this->db->bind('namaUser', $data['namaUser']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('isAdmin', $data['isAdmin']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataUser($idUser)
    {
        $query = "DELETE FROM user WHERE idUser = :idUser";
        
        $this->db->query($query);
        $this->db->bind('idUser', $idUser);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataUser($data)
    {
        $query = "UPDATE user SET namaUser = :namaUser, userName = :userName, isAdmin = :isAdmin WHERE idUser = :idUser";
        
        $this->db->query($query);
        $this->db->bind('idUser', $data['idUser']);
        $this->db->bind('namaUser', $data['namaUser']);
        $this->db->bind('userName', $data['userName']);
        // $this->db->bind('password', $data['password']);
        $this->db->bind('isAdmin', $data['isAdmin']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataUser()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM user WHERE namaUser LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}