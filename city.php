<?php
    
    include('koneksi.php');
    session_start();
    if ($_SESSION["akses"]!=="admin") {
        header('location: index.php');
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
<nav class="navbar"
        style="padding:16px 32px 16px 32px;background-color:#fff;color:#000;box-shadow: 2px 2px 2px 2px #f1f2f6;">
        <a class="navbar-brand mx-auto" href="index.php" style="color:#000;">
            <img src="img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <b>Lingkungan</b>
        </a>
    </nav>



    <div class="container-fluid" style="text-align:center;padding:32pt;">
        <h3>Pengaturan Kota</h3>


        <table class="table mt-4 mx-auto accordion" id="accordionExample">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Kota</th>
                    <th scope="col">Kota</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql_list_city="SELECT * FROM kota ORDER BY id_kota DESC";
$result_list_city = $conn->query($sql_list_city);
?>
                <tr>
                    <th scope="row" class="align-middle">Insert</th>
                    <form
                            action="proses_city.php?city=<?php echo $result_list_city->num_rows+1; ?>"
                            method="post" enctype="multipart/form-data">
                    <td><input type="text" class="form-control" id="exampleFormControlInput1" name="nama"required
                            placeholder="Tambah Kota"></td>
                    <td colspan="2"><input type="submit" class="form-control btn-primary" id="exampleFormControlInput1"
                            name="submit_insert" value="Tambah"></td>
                            </form>
                </tr>
                <?php
                $idcity=0;
if ($result_list_city->num_rows > 0) {
    while ($row = $result_list_city->fetch_assoc()) {
        $id=$row["id_kota"]; ?>






                <tr>
                    <th scope="row" class="align-middle"><?php echo $row["id_kota"]; ?>
                    </th>
                    <td><?php echo $row["nama_kota"]; ?>
                    </td>
                    <td class="align-middle"><a href="#"><button class="btn btn-link collapsed" style="padding:0;"
                                type="button" data-toggle="collapse"
                                data-target="#collapse<?php echo $row["id_kota"]; ?>"
                                aria-expanded="false"
                                aria-controls="collapse<?php echo $row["id_kota"]; ?>">
                                Ubah
                            </button></a></td>
                    <td class="align-middle">
                        <form
                            action="proses_city.php?city=<?php echo $row["id_kota"]; ?>"
                            method="post" enctype="multipart/form-data">
                            <input class="btn btn-link collapsed" style="padding:0;color:#f00;" type="submit"
                                name="submit_delete" value="Hapus">
                        </form>
                    </td>
                </tr>


                <tr id="collapse<?php echo $row["id_kota"]; ?>"
                    class="collapse table-info"
                    aria-labelledby="heading<?php echo $row["id_kota"]; ?>"
                    data-parent="#accordionExample">
                    <th scope="row" class="align-middle">Edit <?php echo $row["id_kota"]; ?>
                    </th>
                    <form
                        action="proses_city.php?city=<?php echo $row["id_kota"]; ?>"
                        method="post" enctype="multipart/form-data">
                        <td><input type="text" class="form-control" id="exampleFormControlInput1" name="nama"
                                placeholder="Nama Kota" required
                                value="<?php echo $row["nama_kota"]; ?>">
                        </td>
                        <td class="align-middle"><input type="submit" class="form-control btn-dark"
                                id="exampleFormControlInput1" name="submit" value="Ubah"></td>
                    </form>
                    <td class="align-middle"><a href="#"><button class="btn btn-link collapsed" style="padding:0;"
                                type="button" data-toggle="collapse"
                                data-target="#collapse<?php echo $idcity; ?>"
                                aria-expanded="false"
                                aria-controls="collapse<?php echo $idcity; ?>">
                                Batal
                            </button></a></td>
                </tr>


                <?php
    }
}
?>







            </tbody>
        </table>


    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>