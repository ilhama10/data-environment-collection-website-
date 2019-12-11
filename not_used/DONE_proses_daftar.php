<?php
include('koneksi.php');
if (isset($_POST["submit_daftar"])) {
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $co_password=md5($_POST["co_password"]);
    $nama_user=$_POST["nama_user"];
    $jenis_kelamin=$_POST["kelamin"];
    $lahir=$_POST["lahir"];
    $id_lokasi=$_POST["id_lokasi"];
    $akses=$_POST["akses"];
    $tambahkan=true;
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Format email anda salah!</div>";
    }

    $sql = "SELECT * FROM `user` WHERE `email`='".$email."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Email sudah terdaftar!</div>";
    }

    if (strpos($username, ' ') == true) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Format username anda salah!</div>";
    }

    $sql = "SELECT * FROM `user` WHERE `username`='".$username."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Username tidak tersedia!</div>";
    }

    if ($password!==$co_password) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Konfirmasi password belum sesuai!</div>";
    }

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["foto_user"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>File bukan berupa gambar!</div>";
    }

    if ($tambahkan) {
        //Up Gambar
        $nama_foto="";

        if($_FILES["foto_user"]["size"]==0){
            $nama_foto="standar.jpg";
        }else{
            if (move_uploaded_file($_FILES["foto_user"]["tmp_name"], "img/".$username.".".$imageFileType)) {
                echo "The file ". basename($_FILES["foto_user"]["name"]). " has been uploaded.";
                $nama_foto=$username.".".$imageFileType;
            } else {
                echo "Sorry, there was an error uploading your file.";
                echo $_FILES["foto_user"]["error"];
                $nama_foto="standar.jpg";
            }
        }
           
        
        

        $sql="INSERT INTO `user` (`username`, `email`, `password`, `nama_user`, `foto_user`, `jenis_kelamin`, `lahir`, `id_lokasi`, `akses`) VALUES ('".$username."', '".$email."',  '".$password."', '".$nama_user."', '".$nama_foto."', '".$jenis_kelamin."', '$lahir', '".$id_lokasi."', '".$akses."')";
        //echo $sql;
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Akun ".$nama_user." berhasil didaftarkan. Silahkan login! :)</div>";
        } 
        //else {echo "<div class='alert alert-danger' role='alert'>". mysqli_error($conn)."</div>";}
    }
}
?>