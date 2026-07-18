<?php
    session_start();
    if(!isset($_SESSION['name'])){
       header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script>

     function validate() {

    let status = true;

    let no = document.getElementById("txtno");

    if (no.value.length == 10 &&
        no.value >= 6000000000 &&
        no.value <= 9999999999) {

        no.style.borderColor = "";
    }
    else {
        status = false;
        no.style.borderColor = "red";
        alert("Enter a valid 10 digit mobile number");
    }

    return status;
}
</script>

</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <div class="col-sm-12 py-2">
                <?php include ('header.php') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 border-end" style="min-height:612px">
                <?php include('sidebar.php') ?>
            </div>
            <div class="col-sm-10">
                <h2 class="mb-3">User Profile</h2>
                <?php if(isset($msg)) echo $msg; ?>
                <form method="post" onsubmit="return validate()">
                    <label>Full Name</label>
                    <input type="text" name="txtfname" value="<?php if(isset($row[1])) echo $row[1]; ?>" class="form-control mb-3" required>
                    <label>Email ID</label>
                    <input type="email" value="<?php if(isset($row[2])) echo $row[2]; ?>" name="txtuemail" class="form-control mb-3" required>
                    <label>Mobile Number</label>
                    <input type="text" id="txtno" name="txtno" value="<?php if(isset($row[3])) echo $row[3]; ?>" class="form-control mb-3" required>
                    <button type="submit" name="btnupdate" class="btn btn-primary w-100">Update Profile</button>
                </form>
                <?php
                   $con = mysqli_connect("localhost", "root","","dets_db");

                   $msg = "";

                   if(isset($_POST['btnupdate'])){
                   $name = $_POST['txtfname'];
                   $no = $_POST['txtno'];

                //    $email = $_POST['txtuemail'];

                   $qry = "UPDATE tb1user
                   SET fullname='$name',
                   mobilenumber='$no'
                   WHERE userid=".$_SESSION['uid'];
                   mysqli_query($con, $qry);
                   if(mysqli_affected_rows($con)>0){
                   $msg = "<div class='alert alert-success alert-dismissible fade show mt-3'>
                    <strong>Success!</strong> Profile updated successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>";
                   }
                else{
                    $msg = "<div class='alert alert-danger alert-dismissible fade show mt-3'>
                    <strong>Error!</strong> Profile update failed.
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>";
                }
                echo $msg ;
        }

                $qry = "SELECT * FROM tb1user WHERE userid=".$_SESSION['uid'];
                $result = mysqli_query($con, $qry);
                $row = mysqli_fetch_array($result);

                $_SESSION['name'] = $row[1];

                mysqli_close($con);
             ?>
            </div>
        </div>
        <div class="row footer">
            <div class="col-sm-12 py-1">
                <?php include('footer.php') ?>
            </div>
        </div>
    </div>
</body>
</html>
