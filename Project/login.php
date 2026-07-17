<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:url('bg.jpg');
    background-size:cover;
    background-repeat:no-repeat;
}

.login-box{
    width:420px;
    margin:120px auto;
    background:rgba(53,170,175,.9);
}

.header{
    background:#111;
    color:#fff;
    text-align:center;
    padding:12px;
    font-size:30px;
    font-weight:bold;
}

.btn-login{
    background:#f4a62a;
    color:white;
    width:100%;
}

a{
    text-decoration:none;
    color:white;
}
</style>

</head>
<body>

<div class="login-box">

    <div class="header">
        Expense Tracking System
    </div>

    <div class="p-4">

<?php
session_start();

if(isset($_POST['btnreg']))
{
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    $conn = mysqli_connect("localhost","root","","dets_db");

    $qry = "SELECT * FROM tb1user WHERE email='$username'";
    $result = mysqli_query($conn,$qry);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['uid'] = $row['userid'];
            $_SESSION['name'] = $row['fullname'];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            echo "<script>alert('Invalid Password');</script>";
        }
    }
    else
    {
        echo "<script>alert('Email Not Found');</script>";
    }

    mysqli_close($conn);
}
?>
<form method="post">

    <div class="mb-3">
        <label class="text-white">Username</label>
        <input type="email" name="email" class="form-control"
        placeholder="Enter Email Here" required>
    </div>

    <div class="mb-3">
        <label class="text-white">Password</label>
        <input type="password" name="password" class="form-control"
        placeholder="Enter Password Here" required>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label text-white">Remember Me !!!</label>
    </div>

    <button type="submit" class="btn btn-login" name="btnreg">
        Login
    </button>

    <div class="text-center mt-3">
        <a href="signup.php">New User Click Here!!!!</a>
    </div>

</form>

</div>
</div>

</body>
</html>