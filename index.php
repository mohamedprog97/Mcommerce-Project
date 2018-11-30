<?php
include("initialize.php");
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

if(isset($_GET['add_item_id']) && isset($_SESSION['user name'])){
    $transData = $connect->prepare("INSERT INTO transaction(tran_user_id, tran_mobile_id, trans_date )

                                                 VALUES            (:zuserid,   :zmobileid, now() )
                                       ");
    $user_id =  selectItem("user_id" , "users" , $values = array($_SESSION['user name']) , "user_name = ? " , $getAll = false);
    $mobile_id = $_GET['add_item_id'];
    $transData->execute(array(
        'zuserid' => $user_id['user_id'] ,
        'zmobileid' => $mobile_id ,
    ));
}
?>
<div class="comtainer-fluid">
<!-- start widgets -->
    <?php
    $rows = selectItem("*" , "brands");
    ?>
  <div class="col-md-2 hidden-sm hidden-xs">
    <aside class="widgets">
      <h3 class="cat">catigory</h3>
      <ul class="cat-item-list list-unstyled">
          <?php
          foreach ($rows as $row ){
              $count = countItem("m_brand_id","mobiles","m_brand_id = ".$row['brand_id']);
              $allSubItem = selectItem("*","mobiles", array($row["brand_id"]) , "m_brand_id = ?" );
              echo '<li class="cat-item">';
              echo '<i class="fa fa-plus-square" data-target="'.$row["brand_name"].'"></i>';
              echo '<label>'.$row["brand_name"].' ('.$count.')</label>';
                echo '<ul class="brand-list ' .$row["brand_name"].'-list list-unstyled">';
                    foreach ($allSubItem as $subItem){
                        echo '<li>'.$subItem["mobile_name"].'</li>';
                    }

                echo '</ul>';
              echo '</li>';
          }
          ?>
      </ul>
    </aside>
  </div>
<!-- end widgets -->

<!-- start products -->

<div class="col-md-10 col-xs-12">
    <div class="pro-control hidden-sm hidden-xs">

     <div class="label-cont">
      <label class="pull-left">sorted by : </label>
     </div>
      <div class="col-md-2 col-sm-12 op-cont">
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if(isset($_GET['sorted_by']) && $_GET['sorted_by'] != "mobile_id" ){
                    echo $_GET['sorted_by'];
                }else{
                    echo "defulte";
                }
                ?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="sorted_by=mobile_id" class="control">defulte</a></li>
               <li role="separator" class="divider"></li>
              <li><a href="sorted_by=price" class="control">price</a></li>
               <li role="separator" class="divider"></li>
              <li><a href="sorted_by=rate" class="control">rate</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div lass="label-cont">
       <label class="pull-left">sorted type: </label>
      </div>
      <div class="col-sm-2 op-cont">
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if(isset($_GET['sorted_type'])){
                    echo $_GET['sorted_type'];
                }else{
                    echo "ASC";
                }
                ?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="sorted_type=ASC" class="control">ASC</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="sorted_type=DESC" class="control">DESC</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div lass="label-cont">
       <label class="pull-left"> # display item : </label>
      </div>
       <div class="col-sm-1 op-cont">
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if(isset($_GET['item_num']) && $_GET['item_num'] != "1000000"){
                    echo $_GET['item_num'];
                }else if(isset($_GET['item_num']) && $_GET['item_num'] == "1000000"){
                    echo "all item";
                }else{
                    echo "3";
                }
                ?>
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="item_num=3" class="change-num-of-item-to-view control">3</a></li>
               <li role="separator" class="divider"></li>
              <li><a href="item_num=5" class="change-num-of-item-to-view control">5</a></li>
               <li role="separator" class="divider"></li>
              <li><a href="item_num=10" class="change-num-of-item-to-view control">10</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="item_num=1000000" class="change-num-of-item-to-view control">all item</a></li>
            </ul>
          </div>
        </div>
       </div>

       <div class="col-md-1 col-lg-2 pull-right op-cont hidden-sm hidden-xs">
        <i class="fa fa-align-justify pull-right"></i>
        <i class="fa fa-th-large pull-right active"></i>
       </div>

    </div>
    <div class="products">
        <?php
        foreach ($mobile_rows as $row){
            $cat = selectItem("brand_name" , "brands", array($row['m_brand_id']) , $condition = "brand_id = ? LIMIT 1" , false);
            echo'<div class="col-lg-4 col-md-6 col-xs-12">';
                echo'<div class="product-data">';
                    echo'<div class="col-md-4 col-xs-6">';
                         if($row['image'] != ""){
                             echo'<img src="layout/images/'.$row['image'].'">';
                         }else{
                             echo'<i class="fa fa-mobile default-img"></i>';
                         }
                    echo'</div>';
                    echo'<div class="col-md-8 col-xs-6">';
                      echo'<span class="mobile-name">'.$row['mobile_name'].'</span>';
                      echo'<span class="mobile-price">$'.$row['price'].'</span>';
                      echo'<div class="user-feedback">';
                         echo'<i class="fa fa-heart-o"></i>';
                         if(isset($_SESSION['user name'])){
                             $user_id =  selectItem("user_id" , "users" , $values = array($_SESSION['user name']) , "user_name = ? " , $getAll = false);
                             $all_transData = selectItem("tran_user_id , tran_mobile_id" , "transaction" , array($user_id["user_id"],$row['mobile_id']) , "tran_user_id = ? AND tran_mobile_id = ?");
                             $count = checkItem("tran_user_id" , "transaction" , $user_id["user_id"]);
                             if($count > 0){
                                 $arr = array();
                                 foreach ($all_transData as $transData){
                                    array_push($arr,$transData['tran_mobile_id']);
                                 }
                                 if(in_array($row['mobile_id'], $arr)){
                                     echo'<a class="boughtLink disable" href="?add_item_id='.$row['mobile_id'].'"><i class="fa fa-shopping-cart active"></i> </a>';
                                 }else{
                                     echo'<a class="boughtLink" href="?add_item_id='.$row['mobile_id'].'"><i class="fa fa-shopping-cart"></i> </a>';
                                 }
                             }else{
                                 echo'<a class="boughtLink" href="?add_item_id='.$row['mobile_id'].'"><i class="fa fa-shopping-cart"></i> </a>';
                             }
                         }else{
                             echo'<a class="boughtLink" href="?add_item_id='.$row['mobile_id'].'"><i class="fa fa-shopping-cart"></i> </a>';
                         }
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