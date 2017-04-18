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
</head>
<body>
<div class="container">
    <h1>Add Column</h1>
    <hr>
    <form class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-3">
                <input class="form-control" id="col_name" type="text" placeholder="Column Name">
            </div>
            <div class="col-sm-2">
                <select class="form-control" id="sel1">
                    <option>VARCHAR</option>
                    <option>INT</option>
                </select>
            </div>
            <div class="col-sm-2">
                <input class="form-control" id="col_name" type="text" placeholder="Constrain">
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" value="ai">Auto Increment</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" value="pk">PRIMARY KEY</label>
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="+">
        </div>
    </form>
</div>
</body>
</html>