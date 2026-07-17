<?php
    $id = $_REQUEST['id'];
    $con = mysqli_connect("localhost", "root","","dets_db");
    $qry = "delete from tblexpence where id = $id";
    mysqli_query($con, $qry);
    header("location:manageexpense.php");
?>