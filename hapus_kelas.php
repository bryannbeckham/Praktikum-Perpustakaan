<?php
    if ($_GET['id_kelas']) {
        include "koneksi.php";
        $query_hapus = mysqli_query($koneksi, "DELETE FROM kelas where id_kelas = '".$_GET['id_kelas']."'");
        if ($query_hapus) {
            echo "<script> alert('Berhasil dihapus'); location.href='tampil_siswa.php'; </script>";
        }
        else{
            echo "<script> alert ('Gagal dihapus'); location.href='tampil_siswa.php'; </script>";
        }
    }
    else{
        echo "id_tidak ada";
    }
?>