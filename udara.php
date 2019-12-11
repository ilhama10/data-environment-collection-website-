<?php
include('koneksi.php');
if(isset($_GET["suhu"])&&isset($_GET["kelembapan"])&&isset($_GET["co"])){
    $sql="INSERT INTO `udara` (`ID_Lokasi`, `Suhu`, `Kelembapan`, `Kadar_CO`, `Waktu`) VALUES ('".$_GET["lok"]."', '".$_GET["suhu"]."', '".$_GET["kelembapan"]."', '".$_GET["co"]."', current_timestamp());";
    if (mysqli_query($conn, $sql)) {
        echo "sukses";
    }
    else{
        echo "gagal";
    }
}