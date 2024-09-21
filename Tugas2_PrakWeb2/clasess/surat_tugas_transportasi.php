<?php
include "koneksi.php";

class Transportasi extends Database {

    public function __construct()
    {
        parent::__construct();
    }

    public function proses(){
        $sql = "SELECT * FROM surat_tugas WHERE Transportasi = 'Motor'";

        return $this->conn->query($sql);
    }
    public function tampilData()
    {
        return $this->proses();
    }
}
$transportasi = new Transportasi();

$datas = $transportasi->proses();
?>