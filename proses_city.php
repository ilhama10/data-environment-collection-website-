<?php
   include('koneksi.php');
    session_start();
    if ($_SESSION["akses"]!=="admin") {
        header('location: index.php');
    }

    
if (isset($_POST["submit"])) {
    $sql="UPDATE `kota` SET `nama_kota`='".$_POST["nama"]."' WHERE id_kota='".$_GET["city"]."'";
   
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success' role='alert'>Data berhasil diubah :)</div>";
    }
}
if (isset($_POST["submit_delete"])) {
    $sql="DELETE FROM user WHERE id_lokasi in (select lokasi.id_lokasi from lokasi where id_kota='".$_GET["city"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "user";
    }
    $sql="DELETE FROM `air` WHERE air.`ID_Lokasi`in (select lokasi.id_lokasi from lokasi where id_kota='".$_GET["city"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "air";
    }
    $sql="DELETE FROM `tanah` WHERE tanah.`ID_Lokasi`in (select lokasi.id_lokasi from lokasi where id_kota='".$_GET["city"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "tanah";
    }
    $sql="DELETE FROM `udara` WHERE udara.`ID_Lokasi`in (select lokasi.id_lokasi from lokasi where id_kota='".$_GET["city"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "udara";
    }
    $sql="DELETE FROM `lokasi` WHERE `id_kota`='".$_GET["city"]."'";
    if (mysqli_query($conn, $sql)) {
        echo "lokasi";
    }
    $sql="DELETE FROM `kota` WHERE `id_kota`='".$_GET["city"]."'";
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
    $sql="INSERT INTO `kota`(`id_kota`, `nama_kota`) VALUES (NULL,'".$_POST["nama"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "sukses";
    }
}
header('location: city.php');
