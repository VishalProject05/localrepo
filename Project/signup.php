<!DOCTYPE html>
<html>
<head>
<title>Signup</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:url('bg.jpg');
    background-size:cover;
    background-repeat:no-repeat;
}

.register-box{
    width:430px;
    margin:90px auto;
    background:rgba(53,170,175,.9);
}

.header{
    background:#111;
    color:white;
    text-align:center;
    padding:12px;
    font-size:28px;
    font-weight:bold;
}

.btn-register{
    width:100%;
    background:#f4a62a;
    color:white;
}

a{
    text-decoration:none;
    color:yellow;
}

</style>

</head>

<body>
<!-- <?php
if(isset($_POST['btnreg'])){

    $name    = trim($_POST['txtname']);
    $email   = trim($_POST['txtemail']);
    $mnumber = trim($_POST['txtnumber']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $cpass   = trim($_POST['txtcpassword']);   // Confirm Password
    $rdate   = date("d-m-y h:i:s a");

    // Check empty fields
    if(empty($name) || empty($email) || empty($mnumber) || empty($pass) || empty($cpass)){
        echo "<p class='text-danger'>Please fill all fields.</p>";
    }

    // Check password match
    else if($pass != $cpass){
        echo "<p class='text-danger'>Password and Confirm Password do not match.</p>";
    }

    else{

        $conn = mysqli_connect("localhost","root","","dets_db");

        $qry = $qry = "insert into tb1user(fullname,email,mobilenumber,password,regdate)values('$name','$email','$mnumber','$pass','$rdate')";

        mysqli_query($conn,$qry);

        if(mysqli_affected_rows($conn)>0){
            echo "<p class='text-success'>Signup Successfully !!</p>";
        }
        else{
            echo "<p class='text-danger'>Error in signup process!! Try Again.</p>";
        }

        mysqli_close($conn);
    }
}
?> -->
<?php
if(isset($_POST['btnreg']))
{
    $name = trim($_POST['txtname']);
    $email = trim($_POST['txtemail']);
    $mnumber = trim($_POST['txtnumber']);
    $password = trim($_POST['txtpassword']);
    $cpass = trim($_POST['txtcpassword']);

    $rdate = date("Y-m-d H:i:s");

    if(empty($name) || empty($email) || empty($mnumber) || empty($password) || empty($cpass))
    {
        echo "<script>alert('Please fill all fields');</script>";
    }
    elseif($password != $cpass)
    {
        echo "<script>alert('Password and Confirm Password do not match');</script>";
    }
    else
    {
        $conn = mysqli_connect("localhost","root","","dets_db");

        // Email already exists
        $check = mysqli_query($conn,"SELECT * FROM tb1user WHERE email='$email'");

        if(mysqli_num_rows($check)>0)
        {
            echo "<script>alert('Email already registered');</script>";
        }
        else
        {
            $hash = password_hash($password,PASSWORD_DEFAULT);

            $qry = "INSERT INTO tb1user(fullname,email,mobilenumber,password,regdate)
                    VALUES('$name','$email','$mnumber','$hash','$rdate')";

            if(mysqli_query($conn,$qry))
            {
                echo "<script>
                alert('Signup Successful');
                window.location='login.php';
                </script>";
            }
            else
            {
                echo "<script>alert('Signup Failed');</script>";
            }
        }

        mysqli_close($conn);
    }
}
?>
<div class="register-box">

    <div class="header">
      Create New Account
    </div>

    <div class="p-3">

    <form action="" method="post">

       <input type="text" name="txtname" class="form-control mb-3" placeholder="Full Name">

       <input type="email" name="txtemail" class="form-control mb-3" placeholder="Email">

       <input type="text" name="txtnumber" class="form-control mb-3" placeholder="Mobile Number" maxlength="10">

       <input type="password" name="txtpassword" class="form-control mb-3" placeholder="Password">

       <input type="password" name="txtcpassword" class="form-control mb-3" placeholder="Confirm Password">

       <button class="btn btn-register" name="btnreg">Register</button>

       <div class="text-center mt-3"><a href="login.php">Goto Login Page</a></div>

    </form>

    </div>

</div>

</body>
</html>