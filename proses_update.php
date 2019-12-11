<?php
include('koneksi.php');
session_start();
$tambahkan=true;
$kolom="";
if (isset($_POST["submit_foto"])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["foto_user"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($_FILES["foto_user"]["size"]==0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>File tidak ada!</div>";
    }
    else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>File bukan berupa gambar!</div>";
    }


    if ($tambahkan) {
        if (move_uploaded_file($_FILES["foto_user"]["tmp_name"], "img/".$_SESSION["username"].".".$imageFileType)) {
            //echo "The file ". basename($_FILES["foto_user"]["name"]). " has been uploaded.";
            
            $nama_foto=$_SESSION["username"].".".$imageFileType;
            $sql="UPDATE user SET foto_user='".$nama_foto."' WHERE username='".$_SESSION["username"]."'";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success' role='alert'>Data foto berhasil diubah :)</div>";
                $_SESSION['foto_user']=$nama_foto;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


if(isset($_POST["submit_password"])){
    if ($_POST["password"]!==$_POST["co_password"]) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Konfirmasi password belum sesuai!</div>";
    }
    if($tambahkan){
        $sql="UPDATE user SET password='".md5($_POST["password"])."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data password berhasil diubah :)</div>";
        }else{
            echo $sql;
        }
    }
}





if (isset($_POST["submit_username"])) {
    if (strpos($_POST["username"], ' ') == true) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Format username anda salah!</div>";
    }

    $sql = "SELECT * FROM `user` WHERE `username`='".$_POST["username"]."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Username tidak tersedia!</div>";
    }

    if ($tambahkan) {
        $sql="UPDATE user SET username='".$_POST["username"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data username berhasil diubah :)</div>";
            $_SESSION["username"]=$_POST["username"];
        }
    }
}

if (isset($_POST["submit_delete"])) {
    if ($tambahkan) {
        $sql="DELETE FROM `user` WHERE `username`='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            header('location: logout.php');
        }
    }
}

if (isset($_POST["submit_nama"])) {
    if ($tambahkan) {
        $sql="UPDATE user SET nama_user='".$_POST["nama"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data nama berhasil diubah :)</div>";
            $_SESSION["nama_user"]=$_POST["nama"];
        }
    }
}

if (isset($_POST["submit_email"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Format email anda salah!</div>";
    }

    $sql = "SELECT * FROM `user` WHERE `email`='".$_POST["email"]."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Email sudah terdaftar!</div>";
    }

    if ($tambahkan) {
        $sql="UPDATE user SET email='".$_POST["email"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data email berhasil diubah :)</div>";
            $_SESSION["email"]=$_POST["email"];
        }
    }
}

if (isset($_POST["submit_kelamin"])) {
    if ($tambahkan) {
        $sql="UPDATE user SET jenis_kelamin='".$_POST["kelamin"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data kelamin berhasil diubah :)</div>";
            $_SESSION["jenis_kelamin"]=$_POST["kelamin"];
        }
    }
}

if (isset($_POST["submit_akses"])) {
    if ($tambahkan) {
        $sql="UPDATE user SET akses='".$_POST["akses"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data akses berhasil diubah :)</div>";
            $_SESSION["akses"]=$_POST["akses"];
        }
    }
}

if (isset($_POST["submit_lahir"])) {
    echo $_POST["lahir"];
    if ($tambahkan) {
        $sql="UPDATE user SET lahir='".$_POST["lahir"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data lahiran berhasil diubah :)</div>";
            $_SESSION["lahir"]=$_POST["lahir"];
        }
    }
}

if (isset($_POST["submit_alamat"])) {
    echo $_POST["lokasi"];
    if ($tambahkan) {
        $sql="UPDATE user SET id_lokasi='".$_POST["lokasi"]."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data alamat berhasil diubah :)</div>";
            $_SESSION["id_lokasi"]=$_POST["lokasi"];
        }
    }
}
?>