<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidebar{
    width:250px;
    height:100vh;
    background:#103265;
    position:fixed;
    left:0;
    top:0;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px 20px;
    text-decoration:none;
    border-bottom:1px solid rgba(255,255,255,.2);
}

.sidebar a:hover{
    background:#0d6efd;
}
    </style>
</head>
<body>
    <div class="sidebar">
    <h4 class="text-center text-white py-3">Menu</h4>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="addexpense.php">➕ Add Expense</a>
    <a href="viewexpense.php">📋 View Expense</a>
    <a href="profile.php">👤 Profile</a>
    <a href="changepassword.php">🔒 Change Password</a>
    <a href="logout.php">🚪 Logout</a>
</div>
</body>
</html>