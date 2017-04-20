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
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
    <style>
        .logo {
            font-family: Verdana;
            font-weight: bolder;
        }
        .right {
            position: relative;
            left: 94%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Insert Data</h1>
    <hr>
    <form class="form-horizontal" action="<?= base_url(); ?>/test/passing_data/insert_data" method="post">
        <div class="form-group">
            <?php foreach ($result as $field) : ?>
                <?php if(strpos($field->name, 'id') === false) { ?>
                    <div class="col-sm-2">
                        <label for=""><?= $field->name ?> :</label>
                        <input name="col_data[<?= $field->name ?>]" class="form-control" id="col_name" type="text" placeholder="Enter <?= $field->name ?>">
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <input type="submit" class="btn btn-info right" value="+ Row">
    </form>
    <br>
    <h1>Table <?= $this->session->userdata('current_table') ?> 's Row Data</h1>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <?php foreach ($result as $field) : ?>
                <th><?= $field->name; ?></th>
            <?php endforeach;?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($full_result as $full_field) : ?>
            <tr>
                <?php foreach ($full_field as $field) : ?>
                    <td><?= $field; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?=base_url()?>test/passing_data/create_db" class="btn btn-info right" role="button">Done</a>
</div>
</body>
</html>