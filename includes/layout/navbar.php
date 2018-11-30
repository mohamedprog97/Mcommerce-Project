<!-- start navbar -->
<?php
if(!isset($_SESSION['cartQty'])){
    $_SESSION['cartQty'] = 0;
}
$rows = selectItem("*" , "brands");
if(isset($_GET['add_item_id'])){
    if(isset($_SESSION['user name'])){
        if(isset($_SESSION['cartQty'])){
            $_SESSION['cartQty'] += 1;
        }
    }else{
        header("location: login.php");
    }
}
?>
<div class="container-fluid">
    <nav class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed main-bg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a>
                        <i class="fa fa-home main-bg"></i>
                    </a>
                </li>
                <?php
                foreach ($rows as $row ){
                    $allSubItem = selectItem("*","mobiles", array($row["brand_id"]) , "m_brand_id = ?" );
                    echo '<li class="dropdown">';
                    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$row["brand_name"].'<span class="caret"></span></a>';
                        echo '<ul class="dropdown-menu">';
                             foreach ($allSubItem as $subItem){
                                echo '<li><a href="#">'.$subItem["mobile_name"].'</a></li>';
                             }
                        echo '</ul>';
                    echo '</li>';
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">
                        <span class="shopping-item-num"><?php echo $_SESSION['cartQty']  ?></span>
                        <i class="fa fa-shopping-cart shopping-item-num-icon"></i></a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
<!-- end navbar -->
