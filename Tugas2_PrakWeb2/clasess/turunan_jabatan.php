<?php
include("koneksi.php");

class Jabatan extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    public function proses(){
        $sql = "SELECT * FROM permohonan_izin WHERE jabatan = 'Direktur'";

        return $this->conn->query($sql);
    }
    
    public function tampilData()
    {
        return $this->proses();
    }
}
$jabatan = new Jabatan();

$datas = $jabatan->proses();
?>