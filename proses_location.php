<?php
include('koneksi.php');
    session_start();
    if ($_SESSION["akses"]!=="admin") {
        header('location: index.php');
    }

    
if (isset($_POST["submit"])) {
    $sql="UPDATE `lokasi` SET `Longitude`='".$_POST["long"]."',`Latitude`='".$_POST["lat"]."',`Nama_Lokasi`='".$_POST["nama"]."',`id_kota`='".$_POST["kota"]."' WHERE ID_Lokasi='".$_GET["lokasi"]."'";
   
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success' role='alert'>Data berhasil diubah :)</div>";
    }
}
if (isset($_POST["submit_delete"])) {
    $sql="DELETE FROM `user` WHERE `ID_Lokasi`='".$_GET["lokasi"]."'";
    if (mysqli_query($conn, $sql)) {
        echo "user";
    }
    $sql="DELETE FROM `air` WHERE `ID_Lokasi`='".$_GET["lokasi"]."'";
    if (mysqli_query($conn, $sql)) {
        echo "air";
    }
    $sql="DELETE FROM `tanah` WHERE `ID_Lokasi`='".$_GET["lokasi"]."'";
    if (mysqli_query($conn, $sql)) {
        echo "tanah";
    }
    $sql="DELETE FROM `udara` WHERE `ID_Lokasi`='".$_GET["lokasi"]."'";
    if (mysqli_query($conn, $sql)) {
        echo "udara";
    }
    $sql="DELETE FROM `lokasi` WHERE `ID_Lokasi`='".$_GET["lokasi"]."'";
    if (mysqli_query($conn, $sql)) {
        echo "lokasi";
    }

    $sql="select * from user where username='".$_SESSION["username"]."'";
    $result= $conn->query($sql);
    if ($result->num_rows==0) {
        session_destroy();
        header('location: index.php');
    }
}
if (isset($_POST["submit_insert"])) {
    $sql="INSERT INTO `lokasi`(`ID_Lokasi`, `Longitude`, `Latitude`, `Nama_Lokasi`, `id_kota`) VALUES (NULL,'".$_POST["long"]."','".$_POST["lat"]."','".$_POST["nama"]."','".$_POST["kota"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "sukses";
    }
}
header('location: location.php');
