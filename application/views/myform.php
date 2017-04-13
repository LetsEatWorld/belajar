<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web Tutorials">
    <meta name="keywords" content="HTML, CSS, test">
    <meta name="author" content="WT Pundi Mas">
    <meta name="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../css/form_validation.css">-->
    <style>
        .container {
            margin: 0 auto;
            width: 800px;;
        }
        body{
            background-color: lightblue;
            color: white;
        }

    </style>
    <title>Student Example</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Form</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">daftar</a></li>
                <li><a href="view_data">tampil</a></li>
                <li><a href="form/login">login</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form class="form-horizontal" action="" method="post">
            <?php /*echo form_open('form');*/ ?>
            <h1>BIODATA</h1>
            <hr>
            <div class="contain form-group">
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <div class="form-group">
                    <label for="repass">Retype Password :</label>
                    <input type="password" name="repass" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">No.Telp :</label>
                    <input type="tel" name="tel" class="form-control">
                </div>
                <div><input class="btn btn-info" type="submit" value="Submit"></div>
            </div>
        </form>
        <h5>Keterangan Error :</h5>
        <hr>
        <?php echo validation_errors(); ?>
    </div>
</body>
</html>