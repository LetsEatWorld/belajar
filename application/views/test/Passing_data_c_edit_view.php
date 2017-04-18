<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web Tutorials">
    <meta name="keywords" content="HTML, CSS, test">
    <meta name="author" content="WT Pundi Mas">
    <meta name="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .right {
            position: relative;
            left: 880px;
            margin: 10px;
        }
        .form-group {
            margin: 50px 0;
        }
        .logo {
            font-family: Verdana;
            font-weight: bolder;
        }
    </style>
</head>
<body>
<?php if($this->session->logged_in) {?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="<?= base_url()?>/passdata">fb</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $this->session->email; ?></a></li>
                <li><a href="<?=base_url()?>test/Passing_data/signout"><span class="glyphicon glyphicon-log-in""></span> Logout</a></li>
            </ul>
        </div>
    </nav>
<?php } else {
    redirect('passdata');
}; ?>

<div class="container">
    <h1>Edit Comment</h1>
    <hr>
    <div class="form-group">
        <form action="<?= base_url(); ?>test/Passing_data/edit_comment/<?= $this->session->userdata('current_c_id');?>/" method="post">
            <!--<label for="comment">Comment : </label>-->
            <input type="text" class="form-control" name="comment" placeholder="Tulis komentar disini!">
            <input type="submit" class="btn btn-primary status-btn right" id="submit" value="Post">
        </form>
    </div>
</div>
</body>
</html>