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
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label>Upload new picture</label><br>
                    <input type="file" name="txtfile" value="" class="form-control">
                </div>
                <button name="btnupload" type="submit" class="btn btn-info">Picture upload successfully!!!</button>
                </form>
                <?php
                    if(isset($_POST['btnupload'])){
                        if($_FILES['txtfile']['error'] == 0 ){
                            if($_FILES['txtfile']['type']=='image/jpeg' || $_FILES['txtfile']['type']=='image/png' || $_FILES['txtfile']['type']=='image/jpg' || $_FILES['txtfile']['type']=='image/webp'){
                                    $from = $_FILES['txtfile']['tmp_name'];
                                    $to = $_SERVER['DOCUMENT_ROOT']."/Project/picture/".$_FILES['txtfile']['name'];
                                    if(move_uploaded_file($from, $to)){
                                        $_SESSION['pic'] = "picture/".$_FILES['txtfile']['name'];
                                        echo "<p class='text-success'>Picture Uploaded</p>";
                                    }
                                    else
                                        echo "<p class='text-danger'>Error in uploading the file</p>";
                            }
                            else
                                echo "<p class='text-danger'>Invalid file format (Use jpeg, png type)</p>";
                        }
                        else{
                            echo "<p class='text-danger'>File is cruptted</p>";
                        }
                    }
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
