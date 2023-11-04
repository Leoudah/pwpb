<?php
class super_model
{
    private $table = "crud";
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    //Tugas CRUD Baru
    public function tambahSiswa($data)
    {
        $query = "INSERT INTO crud (nama, tanggal_lahir, image) VALUES (:nama, :tanggal_lahir, :image)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('image', $data['image']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusSiswa($id)
    {
        $query = "DELETE FROM crud WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function baruSiswa($data)
    {
        $query = "UPDATE crud SET nama = :nama, tanggal_lahir = :tanggal_lahir, image = :image WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('image', $data['image']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllsiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $query = "SELECT * FROM crud WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    //END OF CRUD BARU
}
