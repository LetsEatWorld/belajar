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
            left: 800px;
        }
        .status-btn {
            margin: 10px 0;
        }
        .reply {
            margin: 0 50px;
        }
        @keyframes hovered {
            from {background-color: white;}
            to {background-color: #ccc}
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
            bottom: 0px;
            left: 100px;
            padding: 5px;
            border-radius: 10px;
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
<?php if($this->session->logged_in) {?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Facebook</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $this->session->user_id; ?></a></li>
                <li><a href="<?=base_url()?>test/Passing_data/signout"><span class="glyphicon glyphicon-log-in""></span> Logout</a></li>
            </ul>
        </div>
    </nav>
<?php } else { ?>
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
<?php }; ?>
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
                    <form action="<?=base_url()?>test/passing_data/signin" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="userid" type="text" class="form-control" name="userid" placeholder="User ID">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <br>
                        <Input type="Submit" class="btn btn-primary btn-block" value="Log In">
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
                    <form action="<?=base_url()?>test/passing_data/signup" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="user-id" type="text" class="form-control" name="userid" placeholder="User ID">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Name">
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
                        <Input type="Submit" class="btn btn-primary btn-block" value="Sign Up">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <form action="<?= base_url(); ?>passdata/getstatus" method="post">
            <label for="status">Status : </label>
            <input type="text" class="form-control" name="status" placeholder="Apakah yang anda pikirkan?">
            <input type="submit" class="btn btn-primary status-btn" id="submit" value="Post">
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <button type="button" class="btn btn-primary">Timeline <span class="badge"><?= count($status)?></span></button>
            <hr>
            <?php
            foreach($status as $s) :?>
               <div class="timeline">
                   <a href="#"><?/*= base_url(); */?><!--test/Passing_data/status_detail/--><?/*=$s['status_id'];*/?>
                    <h1><?= $s['message'] ?></h1>
                    <span><?= $s['tanggal'] ?></span>
                    <span><?= "(ID = " . $s['status_id'] . ")" ?></span>
                    <span><?= "(Status updated by = " . $s['user_id'] . ")" ?></span>
                   </a>
                   <a href="<?=base_url(); ?>test/passing_data/del_status/<?=$s['status_id']?>" class="delete"> remove status</a>
                </div>
                <div class="comment-list">
                    <?php foreach ($status_comment as $sc):?>
                        <?php
                        if($s['status_id'] == $sc['c_sid']) {
                            echo "<div>";
                                echo "<h3>" . $sc['c_msg'] . "</h3>";
                                echo "<span>" . $sc['c_uid'] . "</span>";
                                echo "<a href=\"" .  base_url() . "test/passing_data/del_comment/" . $sc['c_id'] . "\"". "class=\"delete\">delete comment</a>";
                                echo "<hr>";
                            echo "</div>";
                        }
                        ?>
                    <?php endforeach;?>
                    <div class="form-group">
                        <?php if($this->session->logged_in) {?>
                            <form action="<?= base_url('')?>test/passing_data/get_comment/<?=$s['status_id'];?>" method="post">
                                <input type="text" class="form-control" name="comment" placeholder="Comment disini">
                                <input type="submit" class="btn btn-primary status-btn right" id="submit" value="Post">
                            </form>
                        <?php } else { ?>
                            <form action="<?= base_url('')?>test/passing_data/signup_page" method="post">
                                <input type="text" class="form-control" name="comment" placeholder="Comment disini">
                                <input type="submit" class="btn btn-primary status-btn right" id="submit" value="Post">
                            </form>
                        <?php }; ?>
                    </div>
                </div>
                <?php
                //Get Comment
                /*foreach ($comment as $c) {
                    if ($c['status_id'] == $r['status_id']) {
                        echo "<div class = \"reply\">";
                        echo "<h3>" . $c['message'] . "</h3>";
                        echo "<span>" . $c['tanggal'] . "</span>";
                        echo "<span>" . " (ID = " . $c['status_id'] . ")" . "</span>";
                        echo "</div>";
                    }
                }*/
                /*echo " <form action=\"getcomment\" method=\"post\">";
                echo "<hr>";
                echo "<input type=\"text\" class=\"form-control\" id=\"comment\" placeholder=\"Tulis komentar disini\">";
                echo "<hr>";
                echo "<input type=\"submit\" class=\"btn btn-primary right\" id=\"submit\" value=\"Post\">";
                echo "<input type=\"hidden\" value=\"Post\">";*/
                ?>
                </form>
            <?php endforeach;?>

            <!--<div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <input type="text" class="form-control" id="comment" placeholder="Tulis komentar disini">
                </div>
            </div>-->
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