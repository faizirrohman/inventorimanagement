<?php


include_once('../database/database.php');

class Supplier extends Database{


    function __construct()
    {
        parent::__construct();
    }

    //fungsi untuk menampilkan data
    public function readData(){
        $query = $this->db->prepare("SELECT * FROM supplier");
        $query->execute();
        $data = $query->fetchAll();
        
        return $data;
    }

    //digunakan untuk menambahkan data barang baru
    public function createData($nama_supplier, $notelp, $email, $alamat){
        $data = $this->db->prepare('INSERT INTO supplier (nama_supplier, notelp, email, alamat) VALUES (?, ?,?,?)');
        
        $data->bindParam(1, $nama_supplier);
        $data->bindParam(2, $notelp);
        $data->bindParam(3, $email);
        $data->bindParam(4, $alamat);
        
        $data->execute();
        
        if($data){
            return true;
        }else{
            return false;
        }
    }

    public function updateData($id, $nama_supplier, $notelp, $email, $alamat){
        
        $query = $this->db->prepare('UPDATE supplier set nama_supplier=?,notelp=?,email=?,alamat=? where id=?');
        
        
        $query->bindParam(1, $nama_supplier);
        $query->bindParam(2, $notelp);
        $query->bindParam(3, $email);
        $query->bindParam(4, $alamat);
        $query->bindParam(5, $id);

        $query->execute();

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM supplier where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function deleteData($id){

        $query = $this->db->prepare("DELETE FROM supplier where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        if($query){
            return true;
        }else{
            return false;
        }
    }
}

?>