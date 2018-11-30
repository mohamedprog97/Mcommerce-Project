<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_POST['mobile'])) {
    $stmt = $connect->prepare("INSERT INTO mobiles(mobile_name, price, rate , m_brand_id)

                                                 VALUES  (:zname,   :zprice,   :zrate , :zbrand_id)
                                       ");

    $stmt->execute(array(
        'zname' => $_POST['mobile'] ,
        'zprice' => $_POST['price'] ,
        'zrate' => $_POST['rate'],
        'zbrand_id' => $_POST['m_brand_id'],
    ));
    header("location:mobiles.php");
}
?>
<div class="container">
    <h1 class="page-title admin-title">Add mobile</h1>
    <form method="post" class="form-group admin-form">
        <?php
        echo "<lable>mobile name</lable>";
        echo "<input name='mobile' class='form-control' type='text'>";
        echo "<lable>mobile price</lable>";
        echo "<input name='price' class='form-control' type='text'>";
        echo "<lable>mobile rate from [ 1 : 5 ]</lable>";
        echo "<input name='rate' class='form-control' type='text'>";
         $rows = selectItem("*" , "brands" );
         echo "<select name='m_brand_id'>";
         foreach ($rows as $row){
             echo "<option value='".$row["brand_id"]."'>".$row["brand_name"]."</option>";
         }
        echo "</select>";
        ?>
        <input type="submit">
    </form>
</div>
