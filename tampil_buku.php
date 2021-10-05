<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body style="background-image: url(polos.png); font-family: comic sans ms; ">
<nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="tampildepan.php">
            <img src="https://www.pngitem.com/pimgs/m/559-5594102_ion-home-transparent-background-home-icon-png-png.png" alt="" width="25" height="25">
            </a>
        </div>
</nav>
<br></br>
    <div class="container">
        <h1>DATA BUKU</h1>
        <form method="POST" action="tampil_buku.php" class="d-flex">
        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
        </form> 
        <br>
        <table class="table table-light table-striped">
            <thead>
                <tr>
                <th scope="col">ID BUKU</th>
                <th scope="col">NAMA BUKU</th>
                <th scope="col">PENGARANG</th>
                <th scope="col">DESKRIPSI</th>
                <th scope="col">FOTO</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include "koneksi.php";
                if (isset($_POST['cari'])) {
                    $cari = $_POST['cari'];
                    $query_buku = mysqli_query($koneksi, "select * from buku where id_buku = '$cari' or nama_buku like '%$cari%' or pengarang like '%$cari%'");
                } else{
                    $query_buku = mysqli_query($koneksi, "select * from buku");
                }
                while($data_buku = mysqli_fetch_array($query_buku)){
                ?>
                <tr>
                    <td><?=$data_buku['id_buku']?></td>
                    <td><?=$data_buku['nama_buku']?></td>
                    <td><?=$data_buku['pengarang']?></td>
                    <td><?=$data_buku['deskripsi']?></td>
                    <td><img src="foto/<?=$data_buku['foto']?>" width=100></td>
                    <td>
                        <a href="ubah_buku.php?id_buku=<?=$data_buku['id_buku']?>" class="btn btn-success">Ubah</a>
                        <a href="hapus_buku.php?id_buku=<?=$data_buku['id_buku']?>" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                    </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="tambah_buku.php" type="button" class="btn btn-dark">Tambah Buku</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>