<!-- <?php
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
?> -->




<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("location:login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "dets_db");

if (!$conn) {
    die("Database Connection Failed");
}

$uid = $_SESSION['uid'];

$old = trim($_POST['oldpassword']);
$new = trim($_POST['newpassword']);
$confirm = trim($_POST['confirmpassword']);

// Check New Password and Confirm Password
if ($new != $confirm) {
    echo "<script>
    alert('New Password and Confirm Password do not match.');
    window.location='changepassword.php';
    </script>";
    exit();
}

// Strong Password Validation
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!?])[A-Za-z\d@#$%^&*!?]{8,}$/', $new)) {
    echo "<script>
    alert('Password must contain:\\n\\nMinimum 8 characters\\nOne Uppercase Letter\\nOne Lowercase Letter\\nOne Number\\nOne Special Character');
    window.location='changepassword.php';
    </script>";
    exit();
}

// Fetch User
$qry = "SELECT password FROM tb1user WHERE userid='$uid'";
$result = mysqli_query($conn, $qry);

if (mysqli_num_rows($result) == 0) {
    echo "<script>
    alert('User not found.');
    window.location='login.php';
    </script>";
    exit();
}

$row = mysqli_fetch_assoc($result);

// Verify Current Password
if (!password_verify($old, $row['password'])) {
    echo "<script>
    alert('Current Password is Incorrect.');
    window.location='changepassword.php';
    </script>";
    exit();
}

// Hash New Password
$newHash = password_hash($new, PASSWORD_DEFAULT);

// Update Password
$update = "UPDATE tb1user SET password='$newHash' WHERE userid='$uid'";

if (mysqli_query($conn, $update)) {

    session_destroy();

    echo "<script>
    alert('Password Changed Successfully.');
    window.location='login.php';
    </script>";

} else {

    echo "<script>
    alert('Password Change Failed.');
    window.location='changepassword.php';
    </script>";

}

mysqli_close($conn);
?>