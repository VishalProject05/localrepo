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
    <title>addexpense</title>
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
            <div class="col-sm-2 border-end" style="min-height:612px;">
                <?php include('sidebar.php') ?>
            </div>
            <div class="col-sm-10 p-4">
                <h2>Add Expense</h2>
                <form method="post">
                    <div class="mb-3">
                        <label>Select Date</label>
                        <input type="date" name="txtdate" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <option>Travel</option>
                            <option>Food</option>
                            <option>Medicine</option>
                            <option>Rent</option>
                            <option>Education</option>
                            <option>Groceries</option>
                            <option>Apparel & Footware</option>
                            <option>Stationary</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Expense Item Name's</label>
                        <input type="text" name="txtitem" placeholder="Item name here" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Expense Cost</label>
                        <input type="number"name="txtcost" placeholder="Price Here" class="form-control">
                    </div>
                    <button type="submit" name="btnadd" class="btn btn-primary w-100">Add Expense Detail</button>
                </form>
                <?php 
                    if(isset($_REQUEST['btnadd'])){
                        $date = $_REQUEST['txtdate'];
                        $cat = $_REQUEST['category'];
                        $itemname = $_REQUEST['txtitem'];
                        $cost = $_REQUEST['txtcost'];
                        $uid = $_SESSION['uid'];
                        $con = mysqli_connect("localhost","root","","dets_db");
                        $qry = "insert into tblexpence(userid,  expensedate, categoryname, expenceitem, expencecost) values($uid, '$date','$cat','$itemname', $cost)";
                        mysqli_query($con, $qry);
                        if(mysqli_affected_rows($con)>0)
                            echo "<p class='text-success'>Expence Added Successfully !!!!</p>";
                        else
                            echo "<p class='text-danger'>Error in adding the expence !!!!</p>";
                        mysqli_close($con);
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