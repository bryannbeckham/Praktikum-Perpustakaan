<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body style="background-image: url(polos.png);font-family: comic sans ms;">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="tampildepan.php">
            <img src="https://www.pngitem.com/pimgs/m/559-5594102_ion-home-transparent-background-home-icon-png-png.png" alt="" width="25" height="25">
            </a>
        </div>
    </nav>
    <div class="container">
        <h1>DATA KELAS</h1>
        <form action="tampil_kelas.php" method="POST">
            <input type="search" name="cari" class="form-control" placeholder="masukan keyword pencarian">
            <button class="btn btn-warning" type="submit">Search</button>
        </form> 
        <br>
        <table class="table table-light table-striped">
            <thead>
                <tr>
                <th scope="col">ID_KELAS</th>
                <th scope="col">NAMA KELAS</th>
                <th scope="col">KELOMPOK</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                if (isset($_POST["cari"])) {
                    //jika ada keyword pencarian
                    $cari = $_POST["cari"];
                    $query_kelas = mysqli_query($koneksi,"select * from kelas where id_kelas = '$cari 'or nama_kelas like '%$cari%'or kelompok like'%$cari%'");
                } else {
                    //jika tidak ada keyword pencarian
                    $query_kelas = mysqli_query($koneksi, "select * from kelas");
                }
                while ($data_kelas = mysqli_fetch_array($query_kelas)) {?>
                    <tr>
                        <td><?php echo $data_kelas["id_kelas"] ?></td>
                        <td><?php echo $data_kelas["nama_kelas"] ?></td>
                        <td><?php echo $data_kelas["kelompok"] ?></td>
                        <td class = "actions">
                            <a href="ubah_kelas.php?id_kelas=<?=$data_kelas['id_kelas']?>" class="btn btn-success">Ubah</a> 
                            <a href="hapus_kelas.php?id_kelas=<?=$data_kelas['id_kelas']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger" float="right">Hapus</a>
                        </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        <a href="tambah_kelas.php" type="button" class="btn btn-dark">Tambah Kelas</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>