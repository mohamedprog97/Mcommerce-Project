<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $stmt = $connect->prepare('SELECT * FROM users WHERE user_id = ?  LIMIT 1 ');
    $stmt->execute(array($user_id));
    $count = $stmt->rowCount();

    if($count > 0){
        $stmt = $connect->prepare("DELETE FROM users WHERE user_id = :zid");
        $stmt->bindParam(":zid" , $user_id );
        $stmt->execute();
        header("location:users.php");
    }
}

?>