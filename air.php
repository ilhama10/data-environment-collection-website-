<?php
include('koneksi.php');
if(isset($_GET["lok"])&&isset($_GET["ph"])&&isset($_GET["kejernihan"])){
    $sql="INSERT INTO `air`(`ID_Lokasi`, `PH`, `Kejernihan`, `Waktu`) VALUES ('".$_GET["lok"]."','".$_GET["ph"]."','".$_GET["kejernihan"]."',current_timestamp())";
    if (mysqli_query($conn, $sql)) {
        echo "sukses";
    }
    else{
        echo "gagal";
    }
}