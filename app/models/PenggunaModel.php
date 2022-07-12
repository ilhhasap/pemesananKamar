<?php 

class PenggunaModel {
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengguna()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPenggunaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getPenggunaByUsername($userName)
    {
        $this->db->query('SELECT idUser FROM ' . $this->table . ' WHERE userName=:userName');
        $this->db->bind('userName', $userName);
        return $this->db->single();
    }

    public function checkUsername($userName)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE userName=:userName');
        $this->db->bind('userName', $userName);
        return $this->db->single();
    }

    public function tambahPengguna($data)
    {
        $query = 'INSERT INTO user VALUES (NULL, :namaUser, :userName, :password, :isAdmin)';
        
        $this->db->query($query);
        $this->db->bind('userName', $data['userName']);
        $this->db->bind('namaUser', $data['namaUser']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('isAdmin', $data['isAdmin']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}