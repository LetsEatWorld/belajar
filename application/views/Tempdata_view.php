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
    Temp Data Example
    <h2><?php echo $this->session->tempdata('item'); ?></h2>
    <a href="<?= base_url('tempdata/add'); ?>">Add</a>
    <br>
    <a href="<?= base_url('tempdata/del'); ?>">Delete</a>
    <pre>
        <?php
        $_POST['var'] = "<h1 onClick='alert(\"asd\")'>hello</h1>";
        echo html_escape($this->input->post('var'));
        ?>
    </pre>
</body>
</html>