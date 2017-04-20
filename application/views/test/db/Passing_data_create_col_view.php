<?php if($this->session->email == 'admin@admin.com') {?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="<?= base_url()?>/passdata">fb</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= base_url(); ?>test/passing_data/create_db_page"><span class="glyphicon glyphicon-user"></span> <?= $this->session->email; ?></a></li>
                <li><a href="<?=base_url()?>test/Passing_data/signout"><span class="glyphicon glyphicon-log-in""></span> Logout</a></li>
            </ul>
        </div>
    </nav>
<?php } elseif($this->session->logged_in && $this->session->email != 'admin@admin.com') {?>
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
    <style>
        .logo {
            font-family: Verdana;
            font-weight: bolder;
        }
        .right {
            position: relative;
            left: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Add Column</h1>
    <hr>
    <form class="form-horizontal" action="<?= base_url(); ?>/test/passing_data/create_col/<?= $this->session->userdata('current_table') ?>" method="post">
        <div class="form-group">
            <div class="col-sm-3">
                <input name="col_name" class="form-control" id="col_name" type="text" placeholder="Column Name">
            </div>
            <div class="col-sm-2">
                <select name="col_type" class="form-control" id="sel1">
                    <option value="VARCHAR">VARCHAR</option>
                    <option value="INT">INT</option>
                </select>
            </div>
            <div class="col-sm-2">
                <input name="col_constrain" class="form-control" id="col_constrain" type="text" placeholder="Constrain">
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input name="col_ai" type="checkbox" value = 1>Auto Increment</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input name="col_pk" type="checkbox">PRIMARY KEY</label>
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="+">
        </div>
    </form>
    <br>
    <h1>Table <?= $this->session->userdata('current_table') ?> 's Column Data</h1>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Col Name</th>
            <th>Type</th>
            <th>Constrain</th>
            <th>Primary Key</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($result)) { ?>
            <?php foreach ($result as $field) : ?>
                <tr>
                <td><?= $field->name ?></td>
                    <td><?= $field->type ?></td>
                    <td><?= $field->max_length ?></td>
                    <td><?= $field->primary_key ?></td>
                </tr>
            <?php endforeach;?>
        <?php } ?>
        </tbody>
    </table>
    <a href="<?=base_url()?>test/passing_data/insert_data_page" class="btn btn-info right" role="button">Next</a>
</div>
</body>
</html>