<h1><i>Penjelasan Tugas 2 PWEB 2</i></h1>
<h2>Penjelasan tabel dalam class Koneksi.php</h2>
<p>

- Properti protected $conn digunakan oleh kelas turunan untuk mengakses koneksi ini. Ketika sebuah objek dari kelas turunan (seperti tugas atau izin) dibuat, konstruktor __construct() dipanggil untuk membuat koneksi ke database dengan mysqli, dan jika terjadi kesalahan, program akan dihentikan dengan menampilkan pesan error. Method tampilData() dideklarasikan sebagai abstrak, yang memaksa setiap kelas turunan untuk mengimplementasikan method tersebut sesuai dengan kebutuhan mereka, sehingga setiap kelas turunan memiliki cara masing-masing untuk mengambil dan menampilkan data dari tabel di database.
  
</p>

``` sh
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

```

<p>

- Saat objek tugas diinstansiasi, konstruktor dipanggil dan menggunakan parent::__construct() untuk memanggil konstruktor induk dari kelas Database, yang menginisialisasi koneksi ke database. Method tampilData() dipanggil melalui $tugases = $tugas->tampilData();, menjalankan query SQL SELECT * FROM surat_tugas menggunakan koneksi $this->conn. Array kosong $hasil diinisialisasi untuk menyimpan hasil query. Setelah memeriksa apakah query berhasil dan ada data, loop while digunakan untuk mengambil setiap baris data dan menyimpannya ke dalam array $hasil, kemudian mengembalikan array tersebut yang berisi semua data dari tabel surat_tugas.
  
</p>

``` sh
class tugas extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    function tampilData()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM surat_tugas");
        $hasil = array();

        if ($data && mysqli_num_rows($data) > 0 ){
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

}

```

<p>

- konstruktor dipanggil dan menggunakan parent::__construct() untuk memanggil konstruktor induk dari kelas Database, yang menginisialisasi koneksi ke database. Method tampilData() dipanggil melalui $izins = $izin->tampilData();, menjalankan query SQL SELECT * FROM Permohonan_izin menggunakan koneksi $this->conn. Array kosong $hasil diinisialisasi untuk menyimpan hasil query. Setelah memeriksa apakah query berhasil dan ada data, loop while digunakan untuk mengambil setiap baris data dan menyimpannya ke dalam array $hasil. Kemudian, array tersebut dikembalikan berisi semua data dari tabel Permohonan_izin.
  
</p>

```sh
class izin extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    function tampilData()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM Permohonan_izin");
        $hasil = array();

        if ($data && mysqli_num_rows($data) > 0 ){
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
        }
        return $hasil;
    }
}

```

<p>

- objek tugas siap menjalankan method tampilData(). Pengambilan data dilakukan dengan $tugases = $tugas->tampilData();, yang menjalankan query SQL untuk mengambil semua data dari tabel surat_tugas dan menyimpannya dalam array $tugases. Begitu juga dengan objek izin, diinstansiasi melalui new izin();, di mana konstruktor __construct() di kelas izin memanggil konstruktor Database untuk koneksi. Setelah itu, data diambil dengan $izins = $izin->tampilData();, yang menjalankan query SQL untuk mengambil semua data dari tabel Permohonan_izin dan menyimpannya dalam array $izins.
  
</p>

```sh
$tugas = new tugas();
$tugases = $tugas->tampilData();

$izin = new izin();
$izins = $izin->tampilData();

```

<h2>Tampilan Output Tampilan surat tugas</h2>

![image](https://github.com/user-attachments/assets/1b9d2076-b7ec-4cab-8458-7e2d9ea570b1)

<h2>Tampilan Output Tampilan Permohonan Izin</h2>

![image](https://github.com/user-attachments/assets/d0eb6c0e-d70f-4c05-b40e-7bf20a3bcf8a)



