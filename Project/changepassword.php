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
    <script>
function validatePassword() {

    let pass = document.getElementById("newpassword").value;
    let confirm = document.getElementById("confirmpassword").value;

    let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if(!pattern.test(pass))
    {
        alert("Password must contain:\n\nMinimum 8 characters\nOne uppercase letter\nOne lowercase letter\nOne number\nOne special character");
        return false;
    }

    if(pass !== confirm)
    {
        alert("New Password and Confirm Password do not match.");
        return false;
    }

    return true;
}
</script>
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

<form action="change_password_code.php" method="post" onsubmit="return validatePassword()">
<div class="mb-3">
<label>Current Password</label>
<input type="password" name="oldpassword" class="form-control" required>
</div>

<div class="mb-3">
<label>New Password</label>
<input type="password" id="newpassword" name="newpassword" class="form-control" required>
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required>
</div>

<input type="submit" value="Change Password" class="btn btn-success w-100">

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>