<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web Tutorials">
        <meta name="keywords" content="HTML, CSS, test">
        <meta name="author" content="WT Pundi Mas">
        <meta name="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <title>Student Example</title>
    </head>
    <body>
        <?php
            //echo form_open('stud_controller/now_date');
            //$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
            //$time = now('Asia/Jakarta');
            //echo mdate($datestring, $time);
            //echo form_close();

            //echo rad2deg(10);

            //$isi_file = file_get_contents("isi_file.php");
            //echo $isi_file;

            /*$token = strtok("kata ini yang aku ingat", " ");
            while ($token) {
                echo $token . "<br>";
                $token = strtok(" ");
            }*/

            /*$tokoh = "Tintin & Prof. Calculus";
            echo "<a href=\"info_view_test.php?data=$tokoh\">Kirim data</a>";
            */

            /*$nama = array("user_id","100","table_1.userlevel",'2');
            list($index,$value,$na3ma)=$nama;*/
            //print_r($nama);
            //echo "<pre>";
            /*$nama[] = "dsdf";
            $nama[] = "gadg";
            $nama[] = "adsfg";*/
            //print_r($value);

            /* while(list($index,$value) = each($nama)) {
                echo "Index : $index -> Nilai: $value<br>\n";
            }*/

            // var_dump(each($nama));
            //print_r($nama);

            $kota = array("
                        Indonesia" => array("Jakarta",
                                            "Bandung",
                                            "Denpasar"),
                        "Austria" => array("Vienna",
                                            "Innsbruck"),
                        "Belanda" => array("Amsterdam",
                                            "Delft"),
                        "Thailand" => array("Bangkok",
                                            "Chiang Mai",
                                            "Chiang Rai",
                                            "Pattaya")
            );

            /*while(list($negara, $daftar_kota) = each($kota)) {
                echo "$negara : <br>";
                while(list($index, $nama_kota) = each($daftar_kota)) {
                    echo ($index + 1) . "." . $nama_kota . "<br>";
                }
                echo "<br>";
            }*/
            /*while(list($negara, $daftar_kota) = each($kota)) {
                echo "$negara:<br>";
                for($kolom = 0; $kolom < count($daftar_kota); $kolom++) {
                    echo $kolom+1 . ". " . $kota[$negara][$kolom] . "<br>";
                }
                echo "<br>";
            }*/

            /*$nama = array("Dian", "Edi", "Citra", "Simon", "Hardi");
            echo "Data asli:<br>";
            foreach ($nama as $kunci => $isi) {
                echo $kunci + 1 . ". " . $isi . "<br>";
            }
            echo "<hr>";
            sort($nama);
            echo "Hasil <b>sort()</b>:<br>";
            foreach($nama as $kunci => $isi) {
                echo $kunci + 1 . ". " . $isi . "<br>";
            }
            echo "<hr>";

            rsort($nama);
            echo "Hasil <b>rsort()</b>:<br>";
            foreach ($nama as $kunci => $isi) {
                echo $kunci + 1 . ". " . $isi . "<br>";
            }*/

            /*function cetak($teks, $jenis_font = "Times", $ukuran = 35) {
                echo "<span style=\"font-family: $jenis_font;" .  "font-size: {$ukuran}px;\"> $teks </span><br>\n";
            }
            cetak("ini tulisannya", "jokerman", 45);*/

            /*function ubah(&$warna) {
                echo "Di fungsi: <br>";
                echo "Nilai \$warna semula: $warna<br>";
                $warna = "hijau";
                echo "Nilai \$warna sekarang: $warna<br>";
                echo "----- Akhir fungsi:<br>";
            }
            $warna = "biru";
            echo "Nilai\$warna sebelum ubah() dipanggil: $warna<br>";
            ubah($warna);
            echo "Nilai \$warna setelah ubah() dipanggil: $warna<br>";*/

            

            /*$minibus = new Mobil();
            $minibus->tipe = "Rush";
            $minibus->pabrikan = "Toyota";
            $minibus->cc = "1495";

            $sedan = new Mobil();
            $sedan->tipe = "picanto";
            $sedan->pabrikan = "kia";
            $sedan->cc = "998";*/

            /*include_once("C:\\xampp\htdocs\CodeIgniter\application\libraries\mobil.php");
            $minibus = new Mobil("Rush", "Toyota", 1495);
            $sedan = new Mobil("Picanto", "Kia", 998);
            echo "<pre>";
            echo "<h1>Sebelum Data di Ubah</h1>";
            $minibus->lihat_info();
            $sedan->lihat_info();
            echo "<h1>Setelah Data di Ubah</h1>";
            $minibus->ubah_cc(1500);
            $sedan->ubah_cc(1500);
            $minibus->lihat_info();
            $sedan->lihat_info();
            echo "<h1>Ambil info cc</h1>";
            echo $minibus->ambil_cc();
            echo "<br>";
            echo $sedan->ambil_cc();
            echo "<hr>";*/

            if(isset($_GET["nama"])) {
                $nama = $_GET["nama"];
            } else {
                $nama = "";
            }
            if (isset($_GET["usia"])) {
                $usia = $_GET["usia"];
            } else {
                $usia = "";
            }
            if(isset($_GET["pesan"])) {
                $pesan = $_GET["pesan"];
            } else {
                $pesan = "";
            }

            echo "<form method='post' action='cekdata.php'>";
            echo "<span>Nama : </span>";
            echo "<input type='text' name='nama'>";
            echo "<br>";
            echo "<span>Usia : </span>";
            echo "<input type='text' name='usia'>";
            echo "<br>";
            echo "<span>Kelas : </span>";
            echo "<input type='text' name='kelas'>";
            echo "<br>";
            echo "<input type='submit' value='kirim'>";
            echo "<input type='reset' value='kosongkan'>";
            echo "<br>";
            echo "<textarea name='sumber' rows='6' cols='20' warp='soft'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Aliquam autem dolor dolorum eligendi eos fugit incidunt laboriosam natus non officiis optio, 
            perferendis qui quia quisquam repellendus tempora totam veritatis voluptatibus.</textarea>";
            echo "<select name='select-musik[]' multiple>";
            echo "<option value='Jazz'>Jass";
            echo "<option value='Rock'>Rock";
            echo "<option value='Keroncong'>Keroncong";
            echo "</select>";
            //echo getdate();

            echo "</form>";

            echo "<hr>";
            if(!empty($pesan)) {
                echo "Pesan: <br> $pesan";
            }
            echo print_r($_POST);
        ?>
        <?php
            if(isset($_POST["select-tanggal"])) {
                $tanggal = $_POST["select-tanggal"];
            } else {
                $tanggal = "";
            }
            if(isset($_POST["select-bulan"])) {
                $bulan = $_POST["select-bulan"];
            } else {
                $bulan = "";
            }
            if(isset($_POST["select-tahun"])) {
                $tahun = $_POST["select-tahun"];
            } else {
                $tahun = "";
            }
        ?>
        <form method="post">
            <p>
                <label>Tanggal lahir:</label>
                <?php
                    buat_kombo("select-tanggal", 1, 31, $tanggal);
                    buat_kombo("select-bulan", 1, 21, $bulan);
                    buat_kombo("select-tahun", 1901, getdate()["year"], $tahun);
                ?>
            </p>
            <input type="submit" value="Hitung Usia">
        </form>
        <hr>
        <?php
            if(trim($tanggal) == "" or trim($bulan) == "" or trim($tahun) == "") {
                echo "Pilih tanggal lahir terlebih dulu";
            } else {
                echo "Usia = " . hitung_usia($tanggal, $bulan, $tahun) . " hari";
            }
            $hari = mktime(10,0,0,14,9,1996);
            echo date("l",$hari) . "<br>";

            $pegangan = fopen("test.dat","w");
            fputs($pegangan, "testing testing aja \n enter");
            fclose($pegangan);


        ?>
    </body>
</html>
<?php
    function buat_kombo($nama, $dari, $hingga, $bawaan = " ") {
        echo "<select name=\"$nama\">\n";
        echo "<option value=\" \"> </option>\n";
        for ($index = $dari; $index <= $hingga; $index++) {
            if($index == $bawaan) {
                $selected = "selected";
            } else {
                $selected = "";
            }

            echo "<option value=\"$index\" $selected>$index</option>";
        }
        echo "</select>\n";
    }
    function hitung_usia($tanggal, $bulan, $tahun) {
        $tgl_lahir = mktime(0,0,0,$bulan,$tanggal,$tahun);
        $waktu_sekarang = getdate();
        $tgl_kini = $waktu_sekarang["mday"];
        $bln_kini = $waktu_sekarang["mon"];
        $thn_kini = $waktu_sekarang["year"];
        $tgl_sekarang = mktime(0,0,0,$bln_kini,$tgl_kini,$thn_kini);
        $usia_hari = floor(($tgl_sekarang - $tgl_lahir) / (60 * 60 * 24));
        return $usia_hari;
    }
    
?>