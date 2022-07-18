<?php 

class PemesananModel {
    private $table = 'booking';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPemesanan($idStatus)
    {
        $this->db->query('SELECT * FROM booking INNER JOIN room ON room.idRoom = booking.idRoom LEFT JOIN roomType ON roomType.idRoomType = room.idRoomType INNER JOIN user ON user.idUser = booking.idUser INNER JOIN status ON status.idStatus = booking.idStatus WHERE booking.idStatus = ' . $idStatus);
        
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
    
    public function tambahDataPemesanan($data)
    {
        $query = 'INSERT INTO booking 
        VALUES (NULL, :idRoom, :idUser, :checkIn, :checkOut, 0)';

        $checkIn= $data['checkIn'];
        $checkOut = date('Y-m-d h:i:s', strtotime($checkIn . ' + ' . $data['durasi'] .' days'));
        
        $this->db->query($query);
        $this->db->bind('idRoom', $data['idRoom']);
        $this->db->bind('idUser', $data['idUser']);
        $this->db->bind('checkIn', $checkIn);
        $this->db->bind('checkOut', $checkOut);
        $this->db->execute();
        
        $queryUpdateRoom = 'UPDATE room SET isBooked = 1 WHERE idRoom = :idRoom';
        $this->db->query($queryUpdateRoom);

        return $this->db->rowCount();
    }

    public function prosesCheckIn($idBooking, $idStatus)
    {
        if ( $idStatus == 0 ) {
            // Proses ke check In
            $query = "UPDATE booking SET idStatus = 1 WHERE idBooking = " . $idBooking;
        } else if( $idStatus == 1) {
            // Proses ke check Out
            $query = "UPDATE booking SET idStatus = 2 WHERE idBooking = " . $idBooking;
        } else if( $idStatus == 2 ) {
            // Proses ke Completed
            $query = "UPDATE booking SET idStatus = 3 WHERE idBooking = " . $idBooking;
        } else {
            $query = "UPDATE booking SET idStatus = 0 WHERE idBooking = " . $idBooking;
        }
        
        $this->db->query($query);
        $this->db->bind('idBooking', $idBooking);
        $this->db->bind('idStatus', $idStatus);

        $this->db->execute();

        return $this->db->rowCount();
    }

}