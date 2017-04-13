<!DOCTYPE html>
<html lang="en">
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
    <?php
        echo $this->session->flashdata('email_sent');
        echo form_open('/Email_controller/send_mail');
    ?>
    <input type="email" name="email" required>
    <input type="submit" value="SEND MAIL">
    <?php
        echo form_close();
    ?>
</body>
</html>