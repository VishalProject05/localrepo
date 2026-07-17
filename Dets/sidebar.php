

<ul class="nav flex-column">
<img src="<?php
        if(isset($_SESSION['pic'])){
            echo $_SESSION['pic'];
        }
    ?>" 
    alt="img" width="130px" height="130px" class="rounded-circle">
    <!-- Dashboard -->
    <li class="nav-item">
        <a href="dashboard.php" class="nav-link">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>
    </li>

    <!-- Expenses Dropdown -->
    <li class="nav-item">
        <a class="nav-link d-flex justify-content-between"
           data-bs-toggle="collapse"
           href="#expenseMenu">

            <span><i class="fa-solid fa-wallet"></i> Expenses</span>
            <i class="fa-solid fa-chevron-down"></i>
        </a>

        <div class="collapse" id="expenseMenu">
            <ul class="nav flex-column ms-4">
                <li><a href="addexpense.php" class="nav-link"><i class="fa-solid fa-arrow-right"></i> Add Expense</a></li>
                <li><a href="manageexpense.php" class="nav-link"><i class="fa-solid fa-arrow-right"></i> Manage Expense</a></li>
            </ul>
        </div>
    </li>

    <!-- Expense Report Dropdown -->
    <li class="nav-item">
        <a class="nav-link d-flex justify-content-between"
           data-bs-toggle="collapse"
           href="#reportMenu">

            <span><i class="fa-solid fa-chart-line"></i> Expense Report</span>
            <i class="fa-solid fa-chevron-down"></i>
        </a>

        <div class="collapse" id="reportMenu">
            <ul class="nav flex-column ms-4">
                <li><a href="daywise.php" class="nav-link"><i class="fa-solid fa-arrow-right"></i> Daywise Expense</a></li>
                <li><a href="monthwise.php" class="nav-link"><i class="fa-solid fa-arrow-right"></i> Monthwise Expense</a></li>
                <li><a href="yearwise.php" class="nav-link"><i class="fa-solid fa-arrow-right"></i> Yearwise Expense</a></li>
            </ul>
        </div>
    </li>

    <!-- Other Menu -->
    <li class="nav-item">
        <a href="profile.php" class="nav-link">
            <i class="fa-solid fa-user"></i> Profile
        </a>
    </li>

    <li class="nav-item">
        <a href="uploadprofilepic.php" class="nav-link">
            <i class="fa-solid fa-camera"></i> Upload Profile Pic
        </a>
    </li>

    <li class="nav-item">
        <a href="changepassword.php" class="nav-link">
            <i class="fa-solid fa-pen-to-square"></i> Change Password
        </a>
    </li>

    <li class="nav-item">
        <a href="logout.php" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </li>

</ul>
