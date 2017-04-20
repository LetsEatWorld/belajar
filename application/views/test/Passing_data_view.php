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
<?php } else { ?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand logo" href="<?=base_url();?>passdata">fb</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-log-in""></span> Sign Up</a></li>
            <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in""></span> Sign In</a></li>
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
                    <form action="<?=base_url()?>test/passing_data/signin" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="pass" placeholder="Enter your password">
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
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="pass" type="password" class="form-control" name="pass" placeholder="Enter your password">
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
</div>
<?php }; ?>
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
            animation-timing-function: ease-out;
        }
              .tanggal {
            font-family: Calibri;
            font-size: 10px;
        }
              .logo {
            font-family: Verdana;
            font-weight: bolder;
        }
    </style>
</head>
<body>
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
                            <span class="input-group-addon">@</span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="pass" placeholder="Enter your password">
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
                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="pass" type="password" class="form-control" name="pass" placeholder="Enter your password">
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
    <?php if($this->session->logged_in) { ?>
    <div class="form-group">
        <form action="<?= base_url(); ?>passdata/getstatus" method="post">
            <label for="status">Status : </label>
            <input type="text" class="form-control" name="status" placeholder="Apakah yang anda pikirkan?">
            <input type="submit" class="btn btn-primary status-btn" id="submit" value="Post">
        </form>
    </div>
    <?php } else { ?>
    <div class="form-group">
        <form action="<?= base_url(); ?>test/Passing_data/login_page" method="post">
            <label for="status">Status : </label>
            <input type="text" class="form-control" name="status" placeholder="Apakah yang anda pikirkan?">
            <input type="submit" class="btn btn-primary status-btn" id="submit" value="Post">
        </form>
    </div>
    <?php } ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <button type="button" class="btn btn-primary">Timeline <span class="badge"><?= count($status)?></span></button>
            <hr>
            <?php
            foreach($status as $s) :?>
               <div class="timeline">
                   <a href="#"><?/*= base_url(); */?><!--test/Passing_data/status_detail/--><?/*=$s['status_id'];*/?>
                    <h1><?= $s['message'] ?></h1>
                    <span><?= "Status updated by " . $s['name'] ?></span>
                    <span class="tanggal"><?= $s['tanggal'] ?></span>
                   </a>
                   <?php if ($s['email'] == $this->session->email) { ?>
                        <a href="<?=base_url(); ?>test/passing_data/del_status/<?=$s['status_id']?>" class="delete"> remove status </a>
                   <?php } ?>
                </div>
                <div class="comment-list">
                    <?php foreach ($status_comment as $sc):?>
                        <?php
                        /*echo $this->session->email . " " . $sc['u_email'];*/
                        if($s['status_id'] == $sc['c_sid']) {
                            echo "<div>";
                                echo "<h3>" . $sc['c_msg'] . "</h3>";
                                echo "<span> Posted by " . $sc['u_name'] . " </span>";
                                echo "<span class=\"tanggal\">" . $sc['c_tgl'] . "</span>";
                                if ($sc['u_email'] == $this->session->email) {
                                    echo "<a href=\"" . base_url() . "test/passing_data/edit_comment_page/" . $sc['c_id'] . "\"" . "class=\"delete\">edit</a>";
                                    echo "<a href=\"" . base_url() . "test/passing_data/del_comment/" . $sc['c_id'] . "\"" . "class=\"delete\">delete</a>";
                                }
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
                            <form action="<?= base_url('')?>test/passing_data/login_page" method="post">
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