<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web Tutorials">
        <meta name="keywords" content="HTML, CSS, test">
        <meta name="author" content="WT Pundi Mas">
        <meta name="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <title>Student Example</title>
    </head>
    <body>
    <form action="<?= base_url('upload/do_upload')?>" enctype="multipart/form-data" method="post">
        <?php
            echo $error;
        ?>
        <?php
            echo form_open_multipart('upload/do_upload');
        ?>
        <input type="file" name="userfile" size="20">
        <br><br>
        <input type="submit" value="upload">
    </form>
    </body>
</html>