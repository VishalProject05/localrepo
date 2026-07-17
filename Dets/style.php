<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .profile-img{
            width: 200px;
            height: 180px;
            margin: 5px;
           
        }

        .menu {
            background-color:skyblue;
            min-height: 83vh;
        }

        .menu ul li {

            width: 100%;
        }

        .menu ul li a {
            color: #34495e;
            display: block;
            width: 100%;
            font-weight: 500;
            text-decoration: none;
            font-size: 16px;
            padding: 12px 16px;
            border-radius:5px;
    </style>
</head>

<body>
  
    
    <section class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-sm-3 menu">
                <div class="profile">
                <img class="img-fluid profile-img"src="image.jpeg" alt="img">
                </div>
                <ul>
                    <li><a href=""><i class="fa-solid fa-house"></i>Dashboard</a></li>
                     <li>
                        <a href="#Expense" data-bs-toggle="collapse"><i class="fa-solid fa-bars"></i>
                            Expenses
                        </a>

                        <ul class="collapse" id="Expense">
                            <li><a href=""><i class="fa-solid fa-arrow-right"></i>Add Expense</a></li>
                            <li><a href=""><i class="fa-solid fa-arrow-right"></i>Manage Expense</a></li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="#report" data-bs-toggle="collapse"><i class="fa-solid fa-bars"></i>
                            Expense Report
                        </a>

                        <ul class="collapse" id="report">
                            <li><a href=""><i class="fa-solid fa-arrow-right"></i>Daywise Report</a></li>
                            <li><a href=""><i class="fa-solid fa-arrow-right"></i>Monthwise Report</a></li>
                            <li><a href=""><i class="fa-solid fa-arrow-right"></i>Yearwise Report</a></li>
                        </ul>
                    </li>
                     <li><a href=""><i class="fa-solid fa-user"></i>Profile</a></li>
                      <li><a href=""><i class="fa-solid fa-camera"></i>Upload Profile pic</a></li> 
                      <li><a href=""><i class="fa-solid fa-file-pen"></i>Change password</a></li> 
                      <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>

                </ul>
            </div>
            <div class="col-sm-9"></div>

        </div>
    </section>
    

</body>

</html>