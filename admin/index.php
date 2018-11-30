<?php
session_start();
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar= "";
include("initialize.php");
include ("admin_upperbar.php");

if(isset($_SESSION['admin name'])){
?>
<div class="container">
    <h1 class="page-title admin-title">Admin panel</h1>
    <div class="col-sm-6">
        <a href="brands.php"><div class="show-brands control-box">
            <div class="col-md-4 control-box-icon">
                <i class="fa fa-flag"></i>
            </div>
            <div class="col-md-8">
                <h2 class="control-box-title">brands</h2>
            </div>
        </div>
        </a>
    </div>
    <div class="col-sm-6">
        <a href="mobiles.php"><div class="show-mobiles control-box">
            <div class="col-md-4 control-box-icon">
                <i class="fa fa-mobile-phone"></i>
            </div>
            <div class="col-md-8">
                <h2 class="control-box-title">mobiles</h2>
            </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6">
        <a href="users.php"><div class="show-users control-box">
            <div class="col-md-4 control-box-icon">
                <i class="fa fa-group"></i>
            </div>
            <div class="col-md-8">
                <h2 class="control-box-title">users</h2>
            </div>
        </div>
        </a>
    </div>
    <div class="col-sm-6">
        <a href="transactions.php"><div class="show-transactions control-box">
            <div class="col-md-4 control-box-icon">
                <i class="fa fa-money"></i>
            </div>
            <div class="col-md-8">
                <h2 class="control-box-title">boughts</h2>
            </div>
            </div>
        </a>
    </div>
</div>
<?php }else{
    header("location: admin_logIn.php");
} ?>