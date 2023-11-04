<?php
class Admin_model
{

    private $table = "blog";
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }


    //Main Model Project (Buy Ticket)
    public function tambahkanticket($data)
    {
        $query = "INSERT INTO trip (nama_trip, deskripsi, tujuan, image, start_date, end_date, harga, slot_tiket)
                      VALUES (:nama_trip, :deskripsi, :tujuan, :image, :start_date, :end_date, :harga, :slot_tiket)";

        $this->db->query($query);
        $this->db->bind(':nama_trip', $data['nama_trip']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':tujuan', $data['tujuan']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':harga', $data['harga']);
        $this->db->bind(':slot_tiket', $data['slot_tiket']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteTrip($id)
    {
        $this->db->query('DELETE FROM trip' . $this->table . 'WHERE trip_id=trip_id');
        $this->db->bind('trip_id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateTrip($trip_id, $nama_trip, $deskripsi, $tujuan, $image, $start_date, $end_date, $harga, $slot_ticket)
    {
        $this->db->query('UPDATE trip SET nama_trip = :nama_trip, deskripsi = :deskripsi, tujuan = :tujuan, image = :image, start_date = :start_date, end_date = :end_date, harga = :harga, slot_tiket = :slot_ticket WHERE trip_id = :trip_id');

        $this->db->bind(':trip_id', $trip_id);
        $this->db->bind(':nama_trip', $nama_trip);
        $this->db->bind(':deskripsi', $deskripsi);
        $this->db->bind(':tujuan', $tujuan);
        $this->db->bind(':image', $image);
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':harga', $harga);
        $this->db->bind(':slot_ticket', $slot_ticket);

        return $this->db->execute();
    }

    // Pada Admin_model.php
    public function getTripById($trip_id)
    {
        $query = "SELECT * FROM trip WHERE trip_id = :trip_id";
        $this->db->query($query);
        $this->db->bind('trip_id', $trip_id);
        return $this->db->single(); // Misalkan Anda menggunakan PDO
    }



    //end Main Model

    public function getAlltraveldata()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUsersById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getblogById($id_blog)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_blog = :id_blog');
        $this->db->bind('id_blog', $id_blog);
        return $this->db->single();
    }

    public function tambahkanblog($data)
    {

        $query = "INSERT INTO blog VALUES ('', :judul, :author, :konten)";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('konten', $data['konten']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusblog($id_blog)
    {
        $query = "DELETE FROM blog WHERE id_blog = :id_blog";
        $this->db->query($query);
        $this->db->bind(':id_blog', $id_blog);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapususer($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusTrip($trip_id)
    {
        $query = " DELETE FROM trip WHERE trip_id = :trip_id";
        $this->db->query($query);
        $this->db->bind(':trip_id', $trip_id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function promoteUser($id)
    {
        $query = "UPDATE user SET level = 'admin' WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function demoteUser($id)
    {
        $query = "UPDATE user SET level = 'user' WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function activityLog($userId, $activityType)
    {
        $description = 'User dengan ID ' . $userId . ' ' . $activityType . ' menjadi ' . ($activityType === 'promote' ? 'Admin' : 'User');

        $query = "INSERT INTO activity_log (user_id, activity_type, description) VALUES (:user_id, :activity_type, :description)";
        $this->db->query($query);
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':activity_type', $activityType);
        $this->db->bind(':description', $description);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
