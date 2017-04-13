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
            <li><a href="daftar">daftar</a></li>
            <li><a href="">tampil</a></li>
            <li><a class="active" href="#">login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <form class="form-horizontal" action="" method="post">
        <?php /*echo form_open('form');*/ ?>
        <h1>LOGIN</h1>
        <hr>
        <div class="contain form-group">
            <div class="form-group">
                <label for="id">ID :</label>
                <input type="text" name="id" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" name="pass" class="form-control">
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