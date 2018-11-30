<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_GET['mobile_id'])){
    $mobile_id = $_GET['mobile_id'];
    $stmt = $connect->prepare('SELECT * FROM mobiles WHERE mobile_id = ?  LIMIT 1 ');
    $stmt->execute(array($mobile_id));
    $count = $stmt->rowCount();

    if($count > 0){
        $stmt = $connect->prepare("DELETE FROM mobiles WHERE mobile_id = :zid");
        $stmt->bindParam(":zid" , $mobile_id );
        $stmt->execute();
        header("location:mobiles.php");
    }
}

?>