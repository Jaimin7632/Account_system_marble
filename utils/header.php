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
    <style type="text/css">
        input:not([disabled]),select{
            background: #f5f5f5 !important;
        }
        input:focus,.btn:focus,select:focus{
           box-shadow: 0 0 2px 1px #ff4d4d !important;
        }
        body{
            letter-spacing: 1px;
            word-spacing: 2px;
            font-weight: lighter;
        }
        .logo  img{
            width: 200px;
        }
    </style>
</head>

<body  ng-app="myApp">
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
                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="far fa-credit-card"></i>
                            <p>Payment</p>
                        </a>
                    </li>
                    <li>
                        <a href="./purchase.php">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Payment Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="./payment.php">
                            <i class="far fa-credit-card"></i>
                            <p>Maintain Stock</p>
                        </a>
                    </li>
                    <li>
                        <a href="./stock.php">
                            <i class="far fa-hdd"></i>
                            <p>Stock Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="./aaddetails.php">
                            <i class="fas fa-user-plus"></i>
                            <p>Add details</p>
                        </a>
                    </li>
                   <li >
                        <a href="./deleteinfo.php">
                            <i class="far fa-trash-alt"></i>
                            <p>Delete Details</p>
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
                        <a class="navbar-brand" href="#">Sell / invoice </a>
                    </div>
                    
                </div>
            </nav>
            <?php include 'utils/connection.php';  ?>
           