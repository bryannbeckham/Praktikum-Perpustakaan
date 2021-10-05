<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body style="background-image: url(polos.png); font-family: comic sans ms;">
<nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="tampildepan.php">
            <img src="https://www.pngitem.com/pimgs/m/559-5594102_ion-home-transparent-background-home-icon-png-png.png" alt="" width="25" height="25">
            </a>
        </div>
</nav>
<br></br>
    <div class="container">
    <h1>DATA SISWA</h1>
    <form method="POST" action="tampil_siswa.php" class="d-flex">
        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form> <br>
        <table class="table table-light table-striped">
            <thead>
                <tr>
                <th scope="col">ID SISWA</th>
                <th scope="col">NAMA SISWA</th>
                <th scope="col">TANGGAL LAHIR</th>
                <th scope="col">GENDER</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">KELAS</th>
                <th scope="col">USERNAME</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_siswa = mysqli_query($koneksi, "select * from siswa s join kelas k on s.id_kelas = k.id_kelas where s.id_siswa = '$cari' or s.nama_siswa like '%$cari%' or s.alamat like '%$cari%' or s.username like '%$cari%'");
                    } else{
                        $query_siswa = mysqli_query($koneksi, "select * from siswa s join kelas k on s.id_kelas = k.id_kelas");
                    }
                    while($data_siswa = mysqli_fetch_array($query_siswa)){
                ?>
                <tr>
                <td><?=$data_siswa['id_siswa']?></td>
                <td><?=$data_siswa['nama_siswa']?></td>
                <td><?=$data_siswa['tanggal_lahir']?></td>
                <td><?=$data_siswa['gender']?></td>
                <td><?=$data_siswa['alamat']?></td>
                <td><?=$data_siswa['nama_kelas']?></td>
                <td><?=$data_siswa['username']?></td>
                <td>
                    <a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Edit</a>
                    <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-danger"
                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="tambah_siswa.php" type="button" class="btn btn-dark" >Tambah Siswa</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>