<?php
include('koneksi.php');
if (isset($_POST["submit_login"])) {
    $usermail=$_POST["usermail"];
    $password=$_POST["password"];
    $co_password="";


    $sql = "SELECT * FROM `user` WHERE `username`='".$usermail."' OR `email` ='".$usermail."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Akun ".$usermail." tidak ditemukan!</div>";
    }else{
        while($row = mysqli_fetch_assoc($result)) {
            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            $co_password=$row["password"];
            $_SESSION["username"]=$row["username"];
            $_SESSION["email"]=$row["email"];
            $_SESSION["nama_user"]=$row["nama_user"];
            $_SESSION["foto_user"]=$row["foto_user"];
            $_SESSION["jenis_kelamin"]=$row["jenis_kelamin"];
            $_SESSION["lahir"]=$row["lahir"];
            $_SESSION["id_lokasi"]=$row["id_lokasi"];
            $_SESSION["akses"]=$row["akses"];
        }
        if(md5($password)===$co_password){
            header('location: index.php?lokasi='.$_SESSION["id_lokasi"]);
        }else{
            echo "<div class='alert alert-danger' role='alert'>Password salah!</div>";
        }
    }


}


?>