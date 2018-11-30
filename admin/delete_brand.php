<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_GET['brand_id'])){
    $brand_id = $_GET['brand_id'];
    $stmt = $connect->prepare('SELECT * FROM brands WHERE brand_id = ?  LIMIT 1 ');
    $stmt->execute(array($brand_id));
    $count = $stmt->rowCount();

    if($count > 0){
        $stmt = $connect->prepare("DELETE FROM brands WHERE brand_id = :zid");
        $stmt->bindParam(":zid" , $brand_id );
        $stmt->execute();

        header("location:brands.php");
    }
}

?>