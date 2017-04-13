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
    <h3>Your file was successfully uploaded!</h3>
    <ul>
        <?php foreach ($upload_data as $item => $value);?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
        <?phpendforeach;?>
    </ul>
    <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</body>
</html>