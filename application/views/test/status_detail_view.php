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
    <style>
        table tr td, tr th {
            padding: 10px;
        }
        .right {
            position: relative;
            left: 850px;
        }
        .status-btn {
            margin: 10px 0;
        }
        .reply {
            margin: 0 50px;
        }
        @keyframes hovered {
            from {background-color: white;}
            to {background-color: #ccc;}
        }
        .timeline {
            padding: 10px;
        }
        .timeline:hover {
            background-color: white;
            animation-name: hovered;
            animation-duration: 1s;
            animation-timing-function: ease-out;
        }
        .comment-list {
            margin-left: 50px;
        }
        .delete {
            position: relative;
            bottom: 50px;
            left: 700px;
            padding: 5px;
            border-radius: 50px;
        }
        .delete:hover {
            background-color: white;
            animation-name: hovered;
            animation-duration: 1s;
            animation-timing-function: ease-out
        }
    </style>

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Facebook</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in""></span> Login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="userid" type="text" class="form-control" name="userid" placeholder="User ID">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="signup" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="userid" type="text" class="form-control" name="userid" placeholder="User ID">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="pass" type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="repass" type="password" class="form-control" name="repass" placeholder="Retype Password">
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="<?= base_url(); ?>passdata/"><button type="button" class="btn btn-primary">Back &nbsp;<span class="badge">&lt;</span></button></a>
                <div>
                    <h1><?= $status['message']; ?></h1>
                    <span><?= $status['tanggal']; ?></span>
                </div>
            <hr>
            <div class="comment-list">
                <?php foreach ($status_comment as $sc):?>
                    <div>
                        <h3><?= $sc['message'] ?></h3>
                        <span><?= $sc['tanggal'] ?></span>
                        <a href="<?= base_url()?>test/passing_data/del_comment/<?= $sc['comment_id']; ?>" class="delete">x</a>
                        <hr>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="form-group">
                <form action="<?= base_url('')?>test/passing_data/get_comment/<?=$status['status_id'];?>" method="post">
                    <input type="text" class="form-control" name="comment" placeholder="Comment disini">
                    <input type="submit" class="btn btn-primary status-btn right" id="submit" value="Post">
                </form>
            </div>
        </div>
    </div>

    <!--Message-->
    <?php
    /*$comment_list = Array(
                    new Comment(, ),
                    new Comment(,),
                    new Comment(,)
    );*/
    //comment
    /*echo "<table>";
        echo "<tr>";
            echo "<th>Comment ID</th>";
            echo "<th>Parent</th>";
            echo "<th>From</th>";
            echo "<th>To</th>";
            echo "<th>Message</th>";
        echo "</tr>";
        foreach($result as $r) {
            echo "<tr>";
                echo "<td>" . $r['comment_id'] . "</td>";
                echo "<td>" . $r['parent'] . "</td>";
                echo "<td>" . $r['from'] . "</td>";
                echo "<td>" . $r['to'] . "</td>";
                echo "<td>" . $r['message'] . "</td>";
            echo "</tr>";
        }
    echo "</table>";
    echo "<pre>";
    var_dump($result);*/

    ?>
</div>
</body>
</html>