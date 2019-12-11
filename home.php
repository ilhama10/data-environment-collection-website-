<?php
    
    $lokasi=1;
    if (isset($_GET["lokasi"])) {
        $lokasi=$_GET["lokasi"];
    }

$sql_for_lokasi = "SELECT lokasi.ID_Lokasi,lokasi.Longitude,lokasi.Latitude,lokasi.Nama_Lokasi,kota.nama_kota FROM lokasi,kota WHERE lokasi.id_kota=kota.id_kota AND kota.id_kota=(SELECT kota.id_kota FROM kota,lokasi WHERE lokasi.id_kota=kota.id_kota AND lokasi.ID_Lokasi='".$lokasi."')";
?>
<div class="row" style="margin:32px 16px 32px 16px;">
    <div class="col-12 col-md-2" style="s">

        <?php
                if (isset($_SESSION['nama_user'])) {
                    ?>
        <a href="profil.php" class="nav-link btn-block mb-0 mt-0" style="padding-top:0;">
            <div class="nav-link btn-block mb-0" style="color:#000;border-radius:40px;text-align:center;"><img
                    src="img/<?php echo $_SESSION['foto_user']?>"
                    style="margin-bottom:8pt;border-radius:40pt;object-fit: cover;object-position: center center;width: 70pt;height: 70pt;"><br>
                <?php echo $_SESSION['nama_user']?>
            </div>
        </a>
        <?php
                }?>


        <div class="btn-group btn-block">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle btn-block" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pilih Kota
                <?php
                    $sql_for_only_lokasi = "SELECT lokasi.*,kota.nama_kota FROM lokasi,kota WHERE lokasi.id_kota=kota.id_kota AND ID_Lokasi='".$lokasi."'";
                    $result_for_lokasi = $conn->query($sql_for_only_lokasi);
                    $jeneng_kuto="";
                    $jeneng_lokasi="";
                    $longi=0;
                    $lati=0;
                    if ($result_for_lokasi->num_rows > 0) {
                        $i=0;
                        // output data of each row
                        while ($row = $result_for_lokasi->fetch_assoc()) {
                            $jeneng_kuto= $row["nama_kota"];
                            $jeneng_lokasi= $row["Nama_Lokasi"];
                            $longi= $row["Longitude"];
                            $lati= $row["Latitude"];
                            $i++;
                        }
                    }
                    ?>
            </button>
            <div class="dropdown-menu">


                <?php

        

        $sql = "SELECT kota.*,lokasi.ID_Lokasi FROM kota,lokasi WHERE kota.id_kota=lokasi.id_kota GROUP BY kota.id_kota";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id_kota"]. " - Name: ". $row["nama_kota"]."<br>";?>
                <a class="dropdown-item"
                    href="index.php?lokasi=<?php echo $row["ID_Lokasi"]; ?>"><?php echo $row["nama_kota"]; ?></a>
                <?php
            }
        } else {
            echo "0 results";
        }
        //$conn->close();
        ?>
            </div>
        </div>





        <!--BATASE COK!-->
        <div class="btn-group btn-block">
            <button type="button" class="btn btn btn-info dropdown-toggle btn-block" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pilih Daerah
            </button>
            <div class="dropdown-menu">





                <?php

$result_for_lokasi = $conn->query($sql_for_lokasi);

if ($result_for_lokasi->num_rows > 0) {
    $i=0;
    // output data of each row
    while ($row = $result_for_lokasi->fetch_assoc()) {
        ?>
                <a class="dropdown-item"
                    href="index.php?lokasi=<?php echo $row["ID_Lokasi"]; ?>"><?php echo $row["Nama_Lokasi"]; ?></a>
                <?php
    $i++;
    }
}
   ?>








            </div>
        </div>

        <div class="dropdown-divider"></div>
        <?php
                if (isset($_SESSION['nama_user'])) {
                    if ($_SESSION['akses']==="admin") {
                        ?>
        <a class="nav-link btn-block" style="margin:0;text-align:center;" href="city.php">Pengaturan Kota</a>
        <a class="nav-link btn-block" style="margin:0;text-align:center;" href="location.php">Pengaturan Lokasi</a>
        <?php
                    } ?>
        <a class="nav-link btn-block mb-2" style="margin:0;text-align:center;" href="logout.php">Logout</a>
        <?php
                } else {
                    ?>
        <a class="nav-link btn-block mb-2" style="text-align:center;" href="login.php">Masuk</a>
        <?php
                }
                ?>
        </nav>
    </div>
    <div class="col-12 col-md-10">
        <div class="jumbotron jumbotron-fluid"
            style="background:url('img/rungkut.jpg') no-repeat left center;background-size: cover;color:#fff;border-radius:20px;">
            <div class="container">


                <h1 class="display-4"><?php echo $jeneng_lokasi;?>,
                    <?php echo $jeneng_kuto;?>
                </h1>
                <p class="lead">Longitude: <?php echo $longi;?>,
                    Latitude: <?php echo $lati;?>
                </p>
            </div>
        </div>
        <?php
            $sql_for_data_water="SELECT * FROM `air` WHERE `ID_Lokasi`='".$lokasi."'";
            $sql_for_data_earth="SELECT * FROM `tanah` WHERE `ID_Lokasi`='".$lokasi."'";
            $sql_for_data_air="SELECT * FROM `udara` WHERE `ID_Lokasi`='".$lokasi."'";
            // AND `Waktu` LIKE '".date("Y-m-d")."%'
            //echo $sql_for_data_water;
            
                // output data of each row?>
        <div class="row">
            <div class="col-12 col-md-4">
                <h3 class="h3_mid">Air</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Waktu</th>
                            <th scope="col">PH</th>
                            <th scope="col">Kejernihan</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php
                            $result = $conn->query($sql_for_data_water);
                            if ($result->num_rows > 0) {
                                $i=0;
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                        <tr>
                            <th scope="row"><?php echo date("H:m:s", strtotime($row["Waktu"]))."<br><small class='text-muted'>".date("Y-m-d", strtotime($row["Waktu"]))."</small>"; ?>
                            </th>
                            <td class="align-middle"><?php echo $row["PH"]; ?>
                            </td>
                            <td class="align-middle"><?php echo $row["Kejernihan"]."%"; ?>
                            </td>
                        </tr>

                        <?php
                $i++;
                                }
                            }
                ?>



                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="h3_mid">Tanah</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Waktu</th>
                            <th scope="col">PH</th>
                            <th scope="col">Kelembapan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $result = $conn->query($sql_for_data_earth);

                            if ($result->num_rows > 0) {
                                $i=0;
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                        <tr>
                            <th scope="row"><?php echo date("H:m:s", strtotime($row["Waktu"]))."<br><small class='text-muted'>".date("Y-m-d", strtotime($row["Waktu"]))."</small>"; ?>
                            </th>
                            <td class="align-middle"><?php echo $row["PH"]; ?>
                            </td>
                            <td class="align-middle"><?php echo $row["Kelembapan"]."%"; ?>
                            </td>
                        </tr>



                        <?php
                $i++;
                                }
                            }
                ?>


                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="h3_mid">Udara</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Waktu</th>
                            <th scope="col">PH</th>
                            <th scope="col">Kelembapan</th>
                            <th scope="col">CO<sup>2</sup></th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php
                            $result = $conn->query($sql_for_data_air);

                            if ($result->num_rows > 0) {
                                $i=0;
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                        <tr>
                            <th scope="row"><?php echo date("H:m:s", strtotime($row["Waktu"]))."<br><small class='text-muted'>".date("Y-m-d", strtotime($row["Waktu"]))."</small>"; ?>
                            </th>
                            <td class="align-middle"><?php echo $row["Suhu"]; ?>
                            </td>
                            <td class="align-middle"><?php echo $row["Kelembapan"]."%"; ?>
                            </td>
                            <td class="align-middle"><?php echo $row["Kadar_CO"]."%"; ?>
                            </td>
                        </tr>



                        <?php
                $i++;
                                }
                            }
                ?>



                    </tbody>
                </table>
            </div>
        </div>