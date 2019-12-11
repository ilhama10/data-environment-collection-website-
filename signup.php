<?php
include('koneksi.php');
    session_start();
    if (isset($_SESSION["username"])) {
        header('location: index.php?lokasi='.$_SESSION["id_lokasi"]);
    }
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <title>Hello, world!</title>

    <style>
        html,
        body {
            width: 100%;
            height: 100%;

            font-family: Roboto;
        }
    </style>

</head>

<body>



    <div class="container-fluid" style="height:100%;">


        <div class="row" style="height:100%;">



            <div class="col-12 col-md-6" style="padding:0;">
                <div class="container-fluid"
                    style="padding:8%;background:linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ),url(img/backdaftar1.jpg);width:100%;height:100%;background-repeat: no-repeat;background-size: cover;">
                    <div id="belumdaftar" style="color:#fff;margin-top:8vw;" class="align-middle">
                        <h1 style="height:auto;font-size:6vw;">Kenali lingkunganmu.<br></h1>
                        <p class="lead">Akses semua data lingkungan disini.</p>
                        <a href="index.php"><button type="button" class="btn btn-outline-light">Kunjungi halaman
                                utama</button></a>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-6 mb-4"
                style="padding:8%;min-height: 100%;min-height: 100vh; display: flex;align-items: center;">

                <div id="maudaftar_form" style="width:100%;">
                    <?php
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

        if ($imageFileType != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") {
            $tambahkan=false;
            echo "<div class='alert alert-danger' role='alert'>File bukan berupa gambar!</div>";
        }

        if ($tambahkan) {
            //Up Gambar
            $nama_foto="";

            if ($_FILES["foto_user"]["size"]==0) {
                $nama_foto="standard.jpg";
            } else {
                if (move_uploaded_file($_FILES["foto_user"]["tmp_name"], "img/".$username.".".$imageFileType)) {
                    //echo "The file ". basename($_FILES["foto_user"]["name"]). " has been uploaded.";
                    $nama_foto=$username.".".$imageFileType;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    echo $_FILES["foto_user"]["error"];
                    $nama_foto="standard.jpg";
                }
            }
           
        
        

            $sql="INSERT INTO `user` (`username`, `email`, `password`, `nama_user`, `foto_user`, `jenis_kelamin`, `lahir`, `id_lokasi`, `akses`) VALUES ('".$username."', '".$email."',  '".$password."', '".$nama_user."', '".$nama_foto."', '".$jenis_kelamin."', '$lahir', '".$id_lokasi."', '".$akses."')";
            //echo $sql;
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success' role='alert'>Akun ".$nama_user." berhasil didaftarkan. Silahkan <a href='login.php'><b>login!</b></a> :)</div>";
            }
            //else {echo "<div class='alert alert-danger' role='alert'>". mysqli_error($conn)."</div>";}
        }
    }
?>

                    <h1 style="text-align:center;">Daftarkan diri anda</h1>
                    <p style="text-align:center;"><small>Sudah punya akun? <a href="login.php"
                                id="lihat_masuk">Masuk</a></small></p>
                    <hr>
                    <form action="signup.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="validationTooltipUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input required type="text" class="form-control" id="validationTooltipUsername"
                                    placeholder="Username" name="username"
                                    aria-describedby="validationTooltipUsernamePrepend" required>
                                <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input required type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Konfirmasi Password</label>
                            <input required type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" name="co_password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input required type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Lengkap" name="nama_user">
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="kelamin"
                                            id="gridRadios1" value="Laki-laki">
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="kelamin"
                                            id="gridRadios2" value="Perempuan">
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Alamat Saat Ini</label>
                            <select class="form-control" id="exampleFormControlSelect1" required name="id_lokasi">
                                <option>Pilih alamat</option>



                                <?php
                    $sql_for_only_lokasi = "SELECT lokasi.*,kota.nama_kota FROM lokasi,kota WHERE lokasi.id_kota=kota.id_kota";
                    $result_for_lokasi = $conn->query($sql_for_only_lokasi);
                    $jeneng_kuto="";
                    $jeneng_lokasi="";
                    $longi=0;
                    $lati=0;
                    if ($result_for_lokasi->num_rows > 0) {
                        $i=0;
                        // output data of each row
                        while ($row = $result_for_lokasi->fetch_assoc()) {
                            $id_locate=$row["ID_Lokasi"];
                            $jeneng_kuto= $row["nama_kota"];
                            $jeneng_lokasi= $row["Nama_Lokasi"];
                            $longi= $row["Longitude"];
                            $lati= $row["Latitude"]; ?>
                                <option
                                    value="<?php echo $id_locate; ?>">
                                    <?php echo $jeneng_lokasi; ?>,
                                    <?php echo $jeneng_kuto; ?>
                                </option>
                                <?php
                            $i++;
                        }
                    }
                    ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input required type="date" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Username" name="lahir">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Foto Profil</label>
                            <input type="file" name="foto_user" class="form-control-file" id="exampleFormControlFile1">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hak Akses</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="akses">
                                <option value="masyarakat">Manusia Biasa</option>
                                <option value="admin">Manusia Admin</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-dark btn-block" value="Daftar" name="submit_daftar">
                    </form>
                </div>



            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>