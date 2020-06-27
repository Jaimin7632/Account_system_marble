<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BlackQR</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
   <link rel="stylesheet" href="fontawesome/web-fonts-with-css/css/fontawesome-all.css" >

    <script src="assets/js/angular179.js"></script>
    <link href="assets/css/style.css" rel="stylesheet" />
    
</head>
<body  ng-app="myApp" ng-controller="customersCtrl">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                 <img src="assets/img/sutc.png">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav" id="nav">
                    <li id="payment">
                        <a href="index.php">
                            <i class="far fa-credit-card"></i>
                            <p>New Payment</p>
                        </a>
                    </li>
                    <li id="update_bills">
                        <a href="update_bill.php">
                            <i class="far fa-credit-card"></i>
                            <p>Update Bills</p>
                        </a>
                    </li>
                    <li id="payment_report">
                        <a href="./payment_report.php">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Payment Report</p>
                        </a>
                    </li>
                    <li id="maintain_stock">
                        <a href="./maintain_stock.php">
                            <i class="far fa-credit-card"></i>
                            <p>Maintain Stock</p>
                        </a>
                    </li>
                    <li id="stock_report">
                        <a href="./stock_report.php">
                            <i class="far fa-hdd"></i>
                            <p>Stock Report</p>
                        </a>
                    </li>
                    <li id="daily_expenditure">
                        <a href="./daily_expenditure.php">
                            <i class="far fa-hdd"></i>
                            <p>Daily Expenditure</p>
                        </a>
                    </li>
                    <li id="edit_details">
                        <a href="./edit_details.php">
                            <i class="fas fa-edit"></i>
                            <p>Edit details</p>
                        </a>
                    </li>
                   
                    <li class="active-pro">
                        <a href="http://www.blackqr.com">
                            
                            <p><center>BLACKQR</center></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                    </div>
                    
                </div>
            </nav>
            <?php include 'utils/connection.php';  ?>
           