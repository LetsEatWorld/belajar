<!DOCTYPE html>
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
<form action="">
    <?php
        echo form_open('Stud_controller/add_student');
        echo form_label('Nama');
        echo form_input(array('id'=>'name','name'=>'name'));
        echo "<br>";
        echo form_label('Gender');
        echo form_input(array('class'=>'gender','name'=>'gender','type'=>'radio'));
        echo form_input(array('class'=>'gender','name'=>'gender','type'=>'radio'));
        echo "<br>";
        echo form_label('Email');
        echo form_input(array('id'=>'email','name'=>'email'));
        echo "<br>";
        echo form_label('No. Telp');
        echo form_input(array('id'=>'tel','name'=>'tel'));
        echo "<br>";
        echo form_submit(array('id'=>'submit','value'=>'Add'));
        echo form_close();
    ?>
</form>
</body>
</html>