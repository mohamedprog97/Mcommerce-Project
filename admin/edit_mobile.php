<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_GET['mobile_id'])){
    $mobile_id = $_GET['mobile_id'];
    $stmt = $connect->prepare('SELECT * FROM mobiles WHERE mobile_id = ?  LIMIT 1 ');
    $stmt->execute(array($mobile_id));
    $dataRow = $stmt->fetch();
}

if(isset($_POST['mobile'])) {

    $stmt  = $connect->prepare('UPDATE mobiles  SET  mobile_name = ? , price = ? , rate = ? WHERE  mobile_id = ?');
    $stmt->execute(array($_POST['mobile'],$_POST['price'],$_POST['rate'],$_POST['id']));
    header("location:mobiles.php");
}
?>
<div class="container">
    <h1 class="page-title admin-title">Edit mobile</h1>
    <form method="post" class="form-group admin-form">
        <?php
        echo "<lable>mobile name</lable>";
        echo "<input name='mobile' class='form-control' type='text' value='".$dataRow['mobile_name']."'>";
        echo "<lable>mobile price</lable>";
        echo "<input name='price' class='form-control' type='text' value=".$dataRow["price"].">";
        echo "<lable>mobile rate from [ 1 : 5 ]</lable>";
        echo "<input name='rate' class='form-control' type='text' value=".$dataRow["rate"].">";
        echo "<input name='id' class='form-control' type='hidden' value=".$_GET['mobile_id'].">";
        ?>
        <input type="submit">
    </form>
</div>
