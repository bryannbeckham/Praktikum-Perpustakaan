<?php
    include "koneksi.php";

    $id_buku = $_GET['id_buku'];
    $folder = "foto/";
    $sql = "select * from buku where id_buku='$id_buku'";
    $query = mysqli_query($koneksi, $sql);
    $buku = mysqli_fetch_array($query);
    $path = $folder.$buku["foto"];

    if (file_exists($path)) {
        unlink($path);
    }

    $sql = "DELETE FROM buku where id_buku = '$id_buku'";

    $result = mysqli_query($koneksi,$sql);

    if ($result) {
        echo "<script>alert('Berhasil');location.href='tampil_buku.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');</script>";
        echo mysqli_error($koneksi);
    }
?>