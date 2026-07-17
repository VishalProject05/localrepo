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
                <form method="post">
                    <div class="mb-3">
                        <b><label>Start Year</label></b>
                        <input type="text" name="txtyear1" placeholder="Enter Start Year" class="form-control">
                    </div>
                    <div class="mb-3">
                        <b><label>End Year</label></b>
                        <input type="text" name="txtyear2" placeholder="Enter End Year" class="form-control">
                    </div>
                    <button type="submit" name="btnreg" class="btn btn-primary w-100 btn-danger">Show Report</button>
                </form>
                <?php
                    if(isset($_POST['btnreg'])){
                        //$uid = $_SESSION['uid'];
                        $sdate = $_POST['txtyear1']."-01-01";
                        $edate = $_POST['txtyear2']."-12-31";
                        $con = mysqli_connect("localhost","root","","dets_db");
                        $qry = "SELECT * FROM tblexpence WHERE expensedate BETWEEN '$sdate' AND '$edate'";
                        $result = mysqli_query($con, $qry);
                        if(mysqli_num_rows($result)>0){
                            echo "<table class='table  table-striped'>";
                            echo "<tr style='background-color: rosybrown; color: white'>";
                            echo "<th>Expense Date</th>";
                            echo "<th>Categorie</th>";
                            echo "<th>Expense Item Name</th>";
                            echo "<th>Expense Amount</th>";
                            echo "</tr>";
                            $total = 0;
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>$row[2]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";
                                echo "<td>$row[5]</td>";
                                $total += $row[5];
                                echo "</tr>";
                            }
                            echo "<tr style='background-color: rosybrown; color: white; text-weight:bold; text-align:center'>";
                            echo "<td colspan='4'>Total Amount : $total</td>";
                            echo "</tr>";
                            echo "</table>";
                        }
                        else{
                            echo "<h3 class='text-warning'>No Record Found !!!</h3>";
                        }
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