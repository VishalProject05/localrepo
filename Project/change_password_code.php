<?php
session_start();

if(!isset($_SESSION['uid']))
{
    header("location:login.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","dets_db");

$uid = $_SESSION['uid'];

$old = $_POST['oldpassword'];
$new = $_POST['newpassword'];
$confirm = $_POST['confirmpassword'];

if($new != $confirm)
{
    echo "<script>
    alert('New Password and Confirm Password do not match');
    window.location='changepassword.php';
    </script>";
    exit();
}

$qry = "SELECT * FROM tb1user WHERE userid='$uid'";
$result = mysqli_query($conn,$qry);
$row = mysqli_fetch_assoc($result);

if(password_verify($old, $row['password']))
{
    $newHash = password_hash($new, PASSWORD_DEFAULT);

    $update = "UPDATE tb1user SET password='$newHash' WHERE userid='$uid'";

    if(mysqli_query($conn,$update))
    {
        session_destroy();

        echo "<script>
        alert('Password Changed Successfully');
        window.location='login.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Password Change Failed');
        window.location='changepassword.php';
        </script>";
    }
}
else
{
    echo "<script>
    alert('Current Password is Incorrect');
    window.location='changepassword.php';
    </script>";
}

mysqli_close($conn);
?>