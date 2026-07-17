<?php
session_start();

if(!isset($_SESSION['name']))
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card">

<div class="card-header bg-primary text-white">
<h3>Change Password</h3>
</div>

<div class="card-body">

<form action="change_password_code.php" method="post">

<div class="mb-3">
<label>Current Password</label>
<input type="password" name="oldpassword" class="form-control" required>
</div>

<div class="mb-3">
<label>New Password</label>
<input type="password" name="newpassword" class="form-control" required>
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input type="password" name="confirmpassword" class="form-control" required>
</div>

<input type="submit" value="Change Password" class="btn btn-success w-100">

</form>
<!-- <?php
if(isset($_POST['oldpassword']))
{
    $conn = mysqli_connect("localhost","root","","dets_db");

    $uid = $_SESSION['uid'];

    $old = $_POST['oldpassword'];
    $new = $_POST['newpassword'];
    $confirm = $_POST['confirmpassword'];

    if($new != $confirm)
    {
        echo "<script>
        alert('New Password and Confirm Password do not match');
        </script>";
    }
    else
    {
        $qry = "SELECT * FROM tb1user WHERE userid='$uid'";
        $result = mysqli_query($conn,$qry);
        $row = mysqli_fetch_assoc($result);

        if($row['password'] != $old)
        {
            echo "<script>
            alert('Current Password is Incorrect');
            </script>";
        }
        else
        {
            $update = "UPDATE tb1user SET password='$new' WHERE userid='$uid'";
            mysqli_query($conn,$update);

            session_destroy();

            echo "<script>
            alert('Password Changed Successfully');
            window.location='login.php';
            </script>";
        }
    }

    mysqli_close($conn);
}
?> -->

</div>

</div>

</div>

</div>

</div>

</body>
</html>