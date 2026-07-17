<?php
    session_start();
    if(!isset($_SESSION['name'])){
       header("location:login.php");
    }
?>

<?php
$con = mysqli_connect("localhost","root","","dets_db");

$uid = $_SESSION['uid'];

// Total Expense
$q1 = mysqli_query($con,"SELECT SUM(expencecost) AS total FROM tblexpence WHERE userid='$uid'");
$r1 = mysqli_fetch_assoc($q1);
$totalExpense = $r1['total'] ? $r1['total'] : 0;

// Current Year Expense
$year = date("Y");
$q2 = mysqli_query($con,"SELECT SUM(expencecost) AS total FROM tblexpence
WHERE userid='$uid' AND YEAR(expensedate)='$year'");
$r2 = mysqli_fetch_assoc($q2);
$yearExpense = $r2['total'] ? $r2['total'] : 0;

// Current Month Expense
$month = date("m");
$q3 = mysqli_query($con,"SELECT SUM(expencecost) AS total FROM tblexpence
WHERE userid='$uid'
AND YEAR(expensedate)='$year'
AND MONTH(expensedate)='$month'");
$r3 = mysqli_fetch_assoc($q3);
$monthExpense = $r3['total'] ? $r3['total'] : 0;

// Today Expense
$today = date("Y-m-d");
$q4 = mysqli_query($con,"SELECT SUM(expencecost) AS total FROM tblexpence
WHERE userid='$uid'
AND expensedate='$today'");
$r4 = mysqli_fetch_assoc($q4);
$todayExpense = $r4['total'] ? $r4['total'] : 0;

mysqli_close($con);
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
<style>
    .circle-box{
    width:200px;
    height:200px;
    border:2px solid #bdbdbd;
    border-radius:50%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    margin:auto;
    background:#fff;
    transition:.3s;
}
.circle-box:hover{
    box-shadow:0 0 15px rgba(0,0,0,.2);
    transform:scale(1.05);
} 

/* .circle-box h4{
    font-size:28px;
    font-weight:bold;
    margin:0;
}

.circle-box h3{
    font-size:32px;
    font-weight:bold;
    margin-top:10px;
} */

h1{
    font-weight:bold;
}

p{
    font-size:18px;
}
</style>
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

    <!-- Iski jagah ye code -->
    <div class="col-sm-10 p-4">

        <h1>Welcome to Expence Tracking System</h1>

        <p class="text-secondary">
            A daily expense tracking system is a tool that monitors personal or business cash flow
            by recording daily expenditures. It helps users to analyze spending habits and achieve
            financial goals through organized financial data.
        </p>

        <div class="row mt-5 text-center">

            <div class="col-md-3 mb-4">
                <div class="circle-box">
                    <h4>Total Expense</h4>
                    <h3>₹ <?php echo $totalExpense; ?></h3>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="circle-box">
                    <h4>Current Year Expense</h4>
                    <h3>₹ <?php echo $yearExpense; ?></h3>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="circle-box">
                    <h4>Current Month Expense</h4>
                    <h3>₹ <?php echo $monthExpense; ?></h3>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="circle-box">
                    <h4>Today Expense</h4>
                    <h3>₹ <?php echo $todayExpense; ?></h3>
                </div>
            </div>

        </div>

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