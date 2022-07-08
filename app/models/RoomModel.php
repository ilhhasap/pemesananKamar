<?php 

class RoomModel {
    private $table = 'room';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStandardRoom()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN roomType ON roomType.idRoomType = ' . $this->table . '.idRoomType WHERE roomType.idRoomType=1 ORDER BY isBooked, noRoom ASC');
        // $this->db->query('SELECT * FROM ' . $this->table );
        return $this->db->resultSet();
    }
    public function getAllSuperiorRoom()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN roomType ON roomType.idRoomType = ' . $this->table . '.idRoomType WHERE roomType.idRoomType=2 ORDER BY isBooked, noRoom ASC');
        // $this->db->query('SELECT * FROM ' . $this->table );
        return $this->db->resultSet();
    }
    public function getAllDeluxeRoom()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN roomType ON roomType.idRoomType = ' . $this->table . '.idRoomType WHERE roomType.idRoomType=3 ORDER BY isBooked, noRoom ASC');
        // $this->db->query('SELECT * FROM ' . $this->table );
        return $this->db->resultSet();
    }

    public function getRoomById($idRoom)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN roomType ON roomType.idRoomType = ' . $this->table . '.idRoomType WHERE idRoom=:idRoom');
        $this->db->bind('idRoom', $idRoom);
        return $this->db->single();
    }

}