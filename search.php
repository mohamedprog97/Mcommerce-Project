<?php
include ("initialize.php");
if(!isset($_GET['sorted_by']) && !isset($_GET['sorted_type']) && !isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles");
}else if(isset($_GET['sorted_by']) && !isset($_GET['sorted_type']) && !isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? ORDER BY ".$_GET['sorted_by']);
}else if(!isset($_GET['sorted_by']) && isset($_GET['sorted_type']) && !isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? ORDER BY mobile_id ".$_GET['sorted_type']);
}
else if(!isset($_GET['sorted_by']) && !isset($_GET['sorted_type']) && isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? LIMIT ".$_GET['item_num']);
}
else if(!isset($_GET['sorted_by']) && isset($_GET['sorted_type']) && isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? ORDER BY mobile_id ".$_GET['sorted_type']." LIMIT ".$_GET['item_num']);
}
else if(isset($_GET['sorted_by']) && !isset($_GET['sorted_type']) && isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? ORDER BY ".$_GET['sorted_by']." LIMIT ".$_GET['item_num']);
}
else if(isset($_GET['sorted_by']) && isset($_GET['sorted_type']) && !isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? ORDER BY ".$_GET['sorted_by']." ".$_GET['sorted_type']);
}
else if(isset($_GET['sorted_by']) && isset($_GET['sorted_type']) && isset($_GET['item_num'])){
    $mobile_rows = selectItem("*" , "mobiles",array(0),"	mobile_id > ? ORDER BY ".$_GET['sorted_by']." ".$_GET['sorted_type']." LIMIT ".$_GET['item_num']);
}
if(isset($_POST['search'])){
    $mobile_rows = selectItem("*" , "mobiles" , array() , "mobile_name like '%".$_POST['search']."%'") ;
}
?>
    <div class="comtainer-fluid">

        <!-- start products -->

        <div class="col-md-12 col-xs-12">
            <h1 class="page-title">search Result</h1>
            <div class="products">
                <?php
                foreach ($mobile_rows as $row){
                    $cat = selectItem("brand_name" , "brands", array($row['m_brand_id']) , $condition = "brand_id = ? LIMIT 1" , false);
                    echo'<div class="col-lg-4 col-md-6 col-xs-12">';
                    echo'<div class="product-data">';
                    echo'<div class="col-md-4 col-xs-6">';
                    echo'<img src="layout/images/'.$row['image'].'">';
                    echo'</div>';
                    echo'<div class="col-md-8 col-xs-6">';
                    echo'<span class="mobile-name">'.$row['mobile_name'].'</span>';
                    echo'<span class="mobile-price">$'.$row['price'].'</span>';
                    echo'<div class="user-feedback">';
                    echo'<i class="fa fa-heart-o"></i>';
                    echo'<i class="fa fa-shopping-cart"></i>';
                    echo'</div>';
                    echo'</div>';
                    echo'<div class="col-xs-12 last-info">';
                    echo'<span class="mobile-rate">';
                    echo'<span class="rate"> <i class="fa fa-eye"></i>Rate : </span>';
                    for($i = 1 ; $i<=5 ; $i++){
                        if($i <= $row['rate']){
                            echo'<i class="fa fa-star"></i>';
                        }else{
                            echo'<i class="fa fa-star-o"></i>';
                        }
                    }

                    echo'</span>';
                    echo'<span class="mobile-barnd">';
                    echo'<span class="mobile-cat"> <i class="fa fa-tag"></i>Category : </span>';
                    echo'<span>'.$cat['brand_name'].'</span>';
                    echo'</span>';
                    echo'</div>';
                    echo'</div>';
                    echo'</div>';
                }
                ?>
            </div>
        </div>
        <!-- end products --->
    </div>

<?php include $templateFile . "footer.php"; ?>