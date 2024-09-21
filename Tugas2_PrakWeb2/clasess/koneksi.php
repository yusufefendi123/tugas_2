<?php
abstract class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "tugas_2";

    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
        if ($this->conn->error){
            die("Connection failed: ". $this->conn->error);
        }
    }
    abstract public function tampilData();
    }

class tugas extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    function tampilData()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM surat_tugas");
        $hasil = array();

        if ($data && mysqli_num_rows($data)>0 ){
            while($row = mysqli_fetch_array($data)){
                $hasil[]=$row;
            }
        }
        return $hasil;
    }

}
class izin extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    function tampilData()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM Permohonan_izin");
        $hasil = array();

        if ($data && mysqli_num_rows($data)>0 ){
            while($row = mysqli_fetch_array($data)){
                $hasil[]=$row;
            }
        }
        return $hasil;
    }
}

$tugas = new tugas();
$tugases = $tugas->tampilData();

$izin = new izin();
$izins = $izin->tampilData();
?>