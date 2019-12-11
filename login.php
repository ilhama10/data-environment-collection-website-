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
                        <a href="index.php"><button type="button" class="btn btn-outline-light">Kunjungi halaman utama</button></a>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-6 mb-4" style="padding:8%;min-height: 100%;min-height: 100vh; display: flex;align-items: center;">
            
                <div id="masuk_form" style="">
                <?php
if (isset($_POST["submit_login"])) {
        $usermail=$_POST["usermail"];
        $password=$_POST["password"];
        $co_password="";


        $sql = "SELECT * FROM `user` WHERE `username`='".$usermail."' OR `email` ='".$usermail."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $tambahkan=false;
            echo "<div class='alert alert-danger' role='alert'>Akun ".$usermail." tidak ditemukan!</div>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
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
            if (md5($password)===$co_password) {
                header('location: index.php?lokasi='.$_SESSION["id_lokasi"]);
            } else {
                echo "<div class='alert alert-danger' role='alert'>Password salah!</div>";
            }
        }
    }
?>

                    <h1 style="text-align:center;"><img src="img/logo.svg" class="rounded" alt="..."
                            style="width:8%;height:auto;">&nbsp;Login</h1>
                    <p style="text-align:center;"><small>Belum punya akun? <a href="signup.php" id="lihat">Daftar</a></small></p>
                    <hr>
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="validationTooltipUsername">Email or Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input required type="text" class="form-control" id="validationTooltipUsername"
                                    placeholder="Masukkan email atau username" name="usermail"
                                    aria-describedby="validationTooltipUsernamePrepend" required>
                                <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input required type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" name="password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <input type="submit" class="btn btn-dark btn-block" value="Masuk" style="background:#000;"
                            name="submit_login">
                    </form>
                </div>


                <div id="maudaftar_form" style="display:none; ">
                    <h1 style="text-align:center;">Daftarkan diri anda</h1>
                    <p style="text-align:center;"><small>Sudah punya akun? <a href="#" id="lihat_masuk">Masuk</a></small></p>
                    <hr>
                    <form action="login.php" method="post" enctype="multipart/form-data">
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