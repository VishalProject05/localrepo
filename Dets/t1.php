<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="sm1.php">Open next page</a>
    <form method="post">
        <input type="text" name="txtname" value="<?php
        if(isset($_COOKIE['mydata']))
        echo $_COOKIE['mydata']; ?>" placeceholder="enter your name">
        <input type="submit" name="btnsub" value="Display">
    </form>
    <?php 
    if(isset($_REQUEST['btnsub'])){
        $name=$_REQUEST['txtname'];
        // header("location:sm1.php?a1=$name");
        setcookie("mydata",$name,time()+120);
    }
    ?>
</body>
</html>