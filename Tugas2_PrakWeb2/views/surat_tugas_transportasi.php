<?php
// index.php

// Inklusi kelas Database
include("../clasess/surat_tugas_transportasi.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tabel Surat Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-info bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="surat_tugas.php">Surat Tugas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="permohonan_izin.php">Permohonan Izin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="permohonan_izin_jabatan.php">Permohonan Izin Jabatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="surat_tugas_transportasi.php">Surat Tugas Transportasi</a>
            </li>
            <!-- Tambahkan item navbar lain jika diperlukan -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Judul Halaman -->
    <h2 class="text-center my-4">Data Tabel Surat Tugas</h2>

    <!-- Tabel Data -->
    <div class="container">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Surat Tugas ID</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Tgl Surat Tugas</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Transportasi</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Dosen ID</th>
                  </tr>
                </thead>
                <?php
                $no = 1;
                foreach($datas as $row){
                ?>
                <tbody>
                      <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $row['surat_tugas_id']; ?></td>
                        <td><?php echo $row['nomor']; ?></td>
                        <td><?php echo $row['nama_dsn']; ?></td>
                        <td><?php echo $row['tgl_surat_tugas']; ?></td>
                        <td><?php echo $row['tujuan']; ?></td>
                        <td><?php echo $row['transportasi']; ?></td>
                        <td><?php echo $row['keperluan']; ?></td>
                        <td><?php echo $row['dosen_id']; ?></td>
                      </tr>
                </tbody>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
