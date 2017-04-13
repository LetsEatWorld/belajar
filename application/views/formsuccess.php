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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="<?/*= base_url()*/?>/css/form_validation.css">-->
    <style>
        /*table, tr td {
            border: 1px dashed #ccc;
        }
        tr td {
            padding: 10px;;
        }
        .container {
            margin: 0 auto;
            width: 800px;;
        }*/
        body {
            color: white;
            background-color: lightskyblue;
        }
    </style>
    <title>Student Example</title>
</head>
<body>
<?php
    echo "<nav class=\"navbar navbar-inverse\">";
        echo "<div class=\"container-fluid\">";
            echo "<div class=\"navbar-header\">";
                echo "<a class=\"navbar-brand\" href=\"#\">Form</a>";
            echo "</div>";
            echo "<ul class=\"nav navbar-nav\">";
                echo "<li class=\"active\"><a href=\"#\">tampil</a></li>";
                echo "<li><a href=\"hapus\">hapus</a></li>";
                echo "<li><a href=\"edit\">edit</a></li>";
                echo "<li><a href=\"logout\">logout</a></li>";
            echo "</ul>";
        echo "</div>";
    echo "</nav>";
?>
    <div class="container">
        <h3>Employee List</h3>
        <p>
        <table class="table">
            <?php
            echo "<tr>";
                echo "<th>Nama</th>";
                echo "<th>Email</th>";
                echo "<th>No. Telp</th>";
                //echo "<th>Password</th>";
            echo "</tr>";
            //echo "<hr>";
            foreach ($records as $r) {
                echo "<tr>";
                    echo "<td>" . $r->name . "</td>";
                    echo "<td>" . $r->email . "</td>";
                    echo "<td>" . $r->tel . "</td>";
                    //echo "<td>" . $r->pass . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </p>
        <!--<p><?php /*echo anchor('form', 'Back'); */?></p>-->
    </div>
</body>
</html>