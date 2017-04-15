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
            <h2>Registration</h2>
            <form class="form-horizontal" action="<?=base_url()?>test/passing_data/signup" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="userid">User ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter User ID">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pass">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="repass">Retype-Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repass" name="repass" placeholder="Retype password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <hr>

    </div>
</body>
</html>