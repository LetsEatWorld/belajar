<?php
    $nama = $_GET["nama"];
    $usia = $_GET["usia"];

    $pesan = "";

    if($nama === "") {
        $pesan = "Nama tidak boleh kosong<br>";
    }
    $bil_usia = intval($usia);
    if($bil_usia < 17) {
        $pesan .= "Usia harus >= 17<br>";
    }
    if($bil_usia != floatval($usia)) {
        $pesan .= "Usia harus berupa bilangan bulat<br>";
    }
    if(!empty($pesan)) {
        $data_get = "nama=$nama&usia=$usia&pesan=$pesan";
        header("Location: http://localhost/codeigniter/index.php/stud_controller/ambil_data_form?" . $data_get);
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Validasi Data</title>
    </head>
    <body>
        <?php
            print("Valid<br>");
            print("Data : ");
            print_r($_GET);
        ?>
    </body>
</html>
