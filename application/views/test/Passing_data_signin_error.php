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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=base_url();?>passdata">Facebook</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in""></span> Sign In</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="container">
        <h2>Failed to log in</h2>
        <hr>
        <p>
            Your User ID or Password you submit was incorrect! <br>
            Please
            <a href="<?=base_url()?>test/Passing_data/login_page">Try again</a>
        </p>
    </div>

</div>
</body>
</html>