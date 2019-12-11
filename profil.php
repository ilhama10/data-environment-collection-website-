<!doctype html>
<html lang="en">
<?php
session_start();
include('koneksi.php');
    if (!isset($_SESSION["username"])){
        header('location: index.php');
    }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

        th,
        td {
            text-align: center;
        }

        .h3_mid {
            text-align: center;
        }

        .insert {
            display: inline-block;
        }
    </style>
</head>

<body>
    <nav class="navbar"
        style="padding:16px 32px 16px 32px;background-color:#fff;color:#000;box-shadow: 2px 2px 2px 2px #f1f2f6;">
        <a class="navbar-brand mx-auto" href="index.php" style="color:#000;">
            <img src="img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <b>Lingkungan</b>
        </a>
    </nav>


    <script>
        $(document).ready(function() {
            $("#input_username").hide();
            $("#input_email").hide();
            $("#input_nama").hide();
            $("#input_kelamin").hide();
            $("#input_lahir").hide();
            $("#input_lokasi").hide();
            $("#input_akses").hide();
            $("#input_foto").hide();
            $("#input_password").hide();

            $("#ubah_username").click(function() {
                //alert("The paragraph was clicked.");

                $("#input_username").show();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").hide();
                $("#input_akses").hide();
                $("#input_foto").hide();
                $("#input_password").hide();

                $("#text_username").hide();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_foto").show();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_lokasi").show();
                $("#text_akses").show();
                $("#text_password").show();
            });
            $("#ubah_email").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").show();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").hide();
                $("#input_akses").hide();
                $("#input_foto").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").hide();
                $("#text_nama").show();
                $("#text_foto").show();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_lokasi").show();
                $("#text_akses").show();
                $("#text_password").show();
            });
            $("#ubah_nama").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").show();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").hide();
                $("#input_akses").hide();
                $("#input_foto").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").hide();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_foto").show();
                $("#text_lokasi").show();
                $("#text_akses").show();
                $("#text_password").show();
            });
            $("#ubah_kelamin").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").show();
                $("#input_foto").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").hide();
                $("#input_akses").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_kelamin").hide();
                $("#text_lahir").show();
                $("#text_foto").show();
                $("#text_lokasi").show();
                $("#text_akses").show();
                $("#text_password").show();
            });
            $("#ubah_lahir").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_foto").hide();
                $("#input_lahir").show();
                $("#input_lokasi").hide();
                $("#input_akses").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_kelamin").show();
                $("#text_foto").show();
                $("#text_lahir").hide();
                $("#text_lokasi").show();
                $("#text_akses").show();
                $("#text_password").show();
            });
            $("#ubah_lokasi").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_foto").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").show();
                $("#input_akses").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_foto").show();
                $("#text_nama").show();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_lokasi").hide();
                $("#text_akses").show();
                $("#text_password").show();
            });
            $("#ubah_akses").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").hide();
                $("#input_akses").show();
                $("#input_foto").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_kelamin").show();
                $("#text_foto").show();
                $("#text_lahir").show();
                $("#text_lokasi").show();
                $("#text_akses").hide();
                $("#text_password").show();
            });

            $("#ubah_foto").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_foto").show();
                $("#input_akses").hide();
                $("#input_lokasi").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_foto").hide();
                $("#text_akses").show();
                $("#text_lokasi").show();
                $("#text_password").show();
            });

            $("#ubah_password").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_foto").hide();
                $("#input_akses").hide();
                $("#input_lokasi").hide();
                $("#input_password").show();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_foto").show();
                $("#text_akses").show();
                $("#text_lokasi").show();
                $("#text_password").hide();
            });

            $(".cancel").click(function() {
                //alert("The paragraph was clicked.");
                $("#input_username").hide();
                $("#input_email").hide();
                $("#input_nama").hide();
                $("#input_kelamin").hide();
                $("#input_lahir").hide();
                $("#input_lokasi").hide();
                $("#input_akses").hide();
                $("#input_foto").hide();
                $("#input_password").hide();

                $("#text_username").show();
                $("#text_email").show();
                $("#text_nama").show();
                $("#text_kelamin").show();
                $("#text_lahir").show();
                $("#text_lokasi").show();
                $("#text_akses").show();
                $("#text_password").show();
                $("#text_foto").show();
            });
        });
    </script>
    <div class="container-fluid mt-4">

        <div style="margin-right:16px;margin-left:16px;">
            <?php

$tambahkan=true;
$kolom="";
if (isset($_POST["submit_foto"])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["foto_user"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($_FILES["foto_user"]["size"]==0) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>File tidak ada!</div>";
    } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") {
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


if (isset($_POST["submit_password"])) {
    if ($_POST["password"]!==$_POST["co_password"]) {
        $tambahkan=false;
        echo "<div class='alert alert-danger' role='alert'>Konfirmasi password belum sesuai!</div>";
    }
    if ($tambahkan) {
        $sql="UPDATE user SET password='".md5($_POST["password"])."' WHERE username='".$_SESSION["username"]."'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Data password berhasil diubah :)</div>";
        } else {
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
            session_destroy();
            echo "<script>window.location = 'index.php';</script>";
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
        </div>

        <div class="card mb-4 mt-4" style="margin:16px;">


            <!--Taruh sini ntar!-->



            <form action="profil.php" method="post" enctype="multipart/form-data">

                <div class="card-body"
                    style="text-align:center;background:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url('img/<?php echo $_SESSION['foto_user']?>');background-repeat:no-repeat;background-size:cover;"
                    id="imggg">
                    <h5 class="card-title" style="color:#fff;">Profil <?php echo $_SESSION["nama_user"];?>
                    </h5>
                    <img src="img/<?php echo $_SESSION['foto_user']?>"
                        class="mb-4"
                        style="border-radius:160pt;object-fit: cover;object-position: center center;width: 160pt;height: 160pt;">
                    <p class="card-text" id="text_foto"><a href="#imggg"
                            style="margin-top:16pt;padding:0;color:#fff;background:#00826c;padding:4pt 16pt 4pt 16pt;border-radius:100pt;"
                            id="ubah_foto">Ubah foto</a>
                    </p>
                    </p>


                    <div class="form-inline mt-0" id="input_foto" action="proses_update.php"
                        style="padding:16pt;color:#fff;text-align:center;background:rgba(0,0,0,1);" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1">
                            <label for="inputTxt2" class="sr-only">Foto</label>
                            <input type="file" class="form-control-file" id="inputTxt2" placeholder="Foto"
                                style="width:100%;" name="foto_user">
                        </div>
                        <input type="submit" class="btn btn-outline-light  mr-sm-1" name="submit_foto"
                            value="Ubah Foto">
                        <button type="button" class="btn btn-danger cancel">Batal</button>
                    </div>
                </div>





                <div class="card-body" style="padding-bottom:0;">
                    <h5 class="card-title">Username</h5>
                    <p class="card-text" id="text_username"><?php echo $_SESSION["username"];?>&nbsp;&nbsp;<a
                            href="#teks_username" style="padding:0;" id="ubah_username"><i>ubah</i></a></p>
                    </p>

                    <div class="form-inline" id="input_username" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="inputTxt2" placeholder="Username" required
                                name="username"
                                value="<?php echo $_SESSION["username"];?>">
                        </div>
                        <input type="submit" class="btn btn-outline-primary  mr-sm-1 mb-4" name="submit_username"
                            value="Ubah Username">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>

                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Nama</h5>
                    <p class="card-text" id="text_nama"><?php echo $_SESSION["nama_user"];?>&nbsp;&nbsp;<a
                            href="#input_nama" style="padding:0;" id="ubah_nama"><i>ubah</i></a></p>
                    </p>

                    <div class="form-inline" id="input_nama" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="inputTxt2" placeholder="Nama" name="nama"
                                required
                                value="<?php echo $_SESSION["nama_user"];?>">
                        </div>
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_nama"
                            value="Ubah Nama">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>






                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Email</h5>
                    <p class="card-text" id="text_email"><?php echo $_SESSION["email"];?>&nbsp;&nbsp;<a
                            href="#input_email" style="padding:0;" id="ubah_email"><i>ubah</i></a></p>
                    </p>

                    <div class="form-inline" id="input_email" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Email</label>
                            <input type="mail" class="form-control" id="inputTxt2" placeholder="Email" name="email"
                                required
                                value="<?php echo $_SESSION["email"];?>">
                        </div>
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_email"
                            value="Ubah Email">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>

                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Jenis Kelamin</h5>
                    <p class="card-text" id="text_kelamin"><?php echo $_SESSION["jenis_kelamin"];?>&nbsp;&nbsp;<a
                            href="#input_kelamin" style="padding:0;" id="ubah_kelamin"><i>ubah</i></a></p>
                    </p>

                    <div class="form-inline" id="input_kelamin" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Jenis Kelamin</label>
                            <div class="form-check mr-2">
                                <input required class="form-check-input" type="radio" name="kelamin" id="gridRadios1"
                                    value="Laki-laki" <?php if ($_SESSION["jenis_kelamin"]==="Laki-laki") {
    echo "checked";
}?>>
                                <label class="form-check-label" for="gridRadios1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input required class="form-check-input" type="radio" name="kelamin" id="gridRadios2"
                                    value="Perempuan" <?php if ($_SESSION["jenis_kelamin"]==="Perempuan") {
    echo "checked";
}?>>
                                <label class="form-check-label" for="gridRadios2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_kelamin"
                            value="Ubah Kelamin">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>



                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Lahir</h5>
                    <p class="card-text" id="text_lahir"><?php echo $_SESSION["lahir"];?>&nbsp;&nbsp;<a
                            href="#input_lahir" style="padding:0;" id="ubah_lahir"><i>ubah</i></a></p>
                    </p>

                    <div class="form-inline" id="input_lahir" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="inputTxt2" placeholder="Tanggal Lahir" required
                                name="lahir"
                                value="<?php echo $_SESSION["lahir"];?>">
                        </div>
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_lahir"
                            value="Ubah Tanggal Lahir">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>



                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Alamat</h5>
                    <?php
                                $sql_for_1 = "SELECT lokasi.*,kota.nama_kota FROM lokasi,kota WHERE lokasi.id_kota=kota.id_kota AND lokasi.ID_Lokasi='".$_SESSION["id_lokasi"]."'";
                                $result_for_1 = $conn->query($sql_for_1);
                                $jeneng_kuto="";
                                $jeneng_lokasi="";
                                $id_saiki=0;
                                if ($result_for_1->num_rows > 0) {
                                    $i=0;
                                    // output data of each row
                                    while ($row = $result_for_1->fetch_assoc()) {
                                        $id_saiki= $row["ID_Lokasi"];
                                        $jeneng_kuto= $row["nama_kota"];
                                        $jeneng_lokasi= $row["Nama_Lokasi"];
                                        $i++;
                                    }
                                }
            ?>
                    <p class="card-text" id="text_lokasi"><?php echo $jeneng_lokasi.", ".$jeneng_kuto;?>&nbsp;&nbsp;<a
                            href="#input_lokasi" style="padding:0;" id="ubah_lokasi"><i>ubah</i></a></p>
                    </p>

                    <div class="form-inline" id="input_lokasi" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">


                            <select class="form-control" id="exampleFormControlSelect1" required name="lokasi">
                                <option
                                    value="<?php echo $id_saiki;?>">
                                    <?php echo $jeneng_lokasi.", ".$jeneng_kuto;?>
                                    (saat ini)</option>



                                <?php
                    $sql_for_only_lokasi = "SELECT lokasi.*,kota.nama_kota FROM lokasi,kota WHERE lokasi.id_kota=kota.id_kota";
                    $result_for_lokasi = $conn->query($sql_for_only_lokasi);

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
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_alamat"
                            value="Ubah Alamat">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>

                </div>

                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Akses</h5>
                    <p class="card-text" id="text_akses"><?php
            if ($_SESSION["akses"]==="masyarakat") {
                echo "Manusia Biasa";
            } elseif ($_SESSION["akses"]==="admin") {
                echo "Manusia Admin";
            }
            ?>&nbsp;&nbsp;<a href="#input_akses" style="padding:0;" id="ubah_akses"><i>ubah</i></a>
                    </p>

                    <div class="form-inline" id="input_akses" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">


                            <select class="form-control" id="exampleFormControlSelect1" required name="akses">
                                <option
                                    value="<?php echo $_SESSION["akses"];?>">
                                    <?php
            if ($_SESSION["akses"]==="masyarakat") {
                echo "Manusia Biasa";
            } elseif ($_SESSION["akses"]==="admin") {
                echo "Manusia Admin";
            }
            ?> (saat ini)
                                </option>
                                <option value="masyarakat">Manusia Biasa</option>
                                <option value="admin">Manusia Admin</option>
                            </select>

                        </div>
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_akses"
                            value="Ubah Akses">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>


                <div class="card-body" style="padding-bottom:0;padding-top:0">
                    <h5 class="card-title">Password</h5>
                    <p class="card-text" id="text_password"><a href="#input_password" style="padding:0;"
                            id="ubah_password"><i>ubah password</i></a></p>
                    </p>

                    <div class="form-inline" id="input_password" action="proses_update.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="inputTxt2" placeholder="Password"
                                name="password">
                        </div>
                        <div class="form-group mr-sm-1 mb-4">
                            <label for="inputTxt2" class="sr-only">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="inputTxt2" placeholder="Konfirmasi Password"
                                name="co_password">
                        </div>
                        <input type="submit" class="btn btn-outline-primary mr-sm-1 mb-4" name="submit_password"
                            value="Ubah Password">
                        <button type="button" class="btn btn-outline-danger mb-4 cancel">Batal</button>
                    </div>
                </div>
                <div class="card-body" style="padding-bottom:0;">
                    <input type="submit" class="btn btn-danger btn-block mr-sm-1 mb-4" name="submit_delete"
                        value="Hapus Akun">
                </div>
            </form>




        </div>
    </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>