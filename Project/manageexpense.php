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
                <h2 class="mb-4">Expense Detail's</h2>
                <table class="table table-striped">
                    <!-- <caption><h2>Expense Detail's</h2></caption> -->
                    <tr style="background-color: rosybrown; color: white">
                        <th>Expense Date</th>
                        <th>Categorie</th>
                        <th>Expense Item Name</th>
                        <th>Expense Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $con = mysqli_connect("localhost","root","","dets_db");
                        $qry = "Select * from tblexpence where userid = $_SESSION[uid] order by expensedate desc";
                        $result = mysqli_query($con, $qry);
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td><a href='delete.php?id=$row[0]'>Delete</a></td>";
                            echo "</tr>";
                        }
                        mysqli_close($con);
                    ?>
            </table>
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

