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

<h2><i>Penjelasan Extends dari table surat tugas (Transportasi)</i></h2>
<p>

- kelas Transportasi yang mewarisi dari kelas Database. Pada konstruktor __construct(), konstruktor induk dipanggil untuk menginisialisasi koneksi database. Metode proses() berfungsi untuk mengeksekusi query SQL yang memilih semua data dari tabel surat_tugas di mana kolom Transportasi bernilai 'Motor', mengembalikan hasilnya sebagai objek. Sementara itu, metode tampilData() memanggil metode proses() dan mengembalikan hasilnya, memberikan cara untuk mengakses data tanpa harus langsung memanggil metode proses() di luar kelas. Saat objek Transportasi diinstansiasi, koneksi database diinisialisasi, dan ketika $datas = $transportasi->proses(); dipanggil, metode proses() dieksekusi untuk mengambil data sesuai kriteria, dengan hasil yang disimpan dalam variabel $datas. Struktur ini menciptakan cara yang terorganisir untuk mengambil data dari database,
  
</p>

```sh
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
```

<h2>Tampilan Output Extend dari tabel surat_tugas (Transportasi)</h2>

![image](https://github.com/user-attachments/assets/757b92ef-ad38-496a-ae1a-28466737afea)

<h2><i>Penjelasan Extends dari table permohonan izin (Jabatan)</i></h2>
<p>

- Kelas Jabatan merupakan bagian dari sistem manajemen data yang fokus pada pengambilan informasi jabatan dalam permohonan izin dan mewarisi fitur koneksi database dari kelas Database. Ketika objek dari kelas Jabatan dibuat, konstruktor __construct() memastikan koneksi ke database berhasil. Metode proses() menjalankan query SQL untuk mengambil semua data dari tabel permohonan_izin di mana jabatan bernilai 'Direktur', dan hasilnya dikembalikan dalam bentuk objek. Sementara itu, metode tampilData() memberikan cara yang lebih intuitif untuk mengakses data dengan memanggil proses(). Saat objek diinstansiasi dan metode proses() dipanggil, data relevan disimpan dalam variabel $datas. Dengan struktur ini, kelas Jabatan memanfaatkan prinsip OOP seperti pewarisan dan enkapsulasi, mengurangi duplikasi kode, serta meningkatkan kejelasan dan keterbacaan, yang penting untuk pemeliharaan dan pengembangan perangkat lunak di masa depan.
  
</p>

```sh
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
```

<h2>Hasil Tampilan Output dari Extend permohonan izin (Jabatan) </h2>

![image](https://github.com/user-attachments/assets/5d381835-b20c-45c0-b99d-f4f8e9e33c07)





