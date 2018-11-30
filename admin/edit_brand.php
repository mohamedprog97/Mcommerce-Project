<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_GET['brand_id'])){
    $brand_id = $_GET['brand_id'];
    $stmt = $connect->prepare('SELECT * FROM brands WHERE brand_id = ?  LIMIT 1 ');
    $stmt->execute(array($brand_id));
    $dataRow = $stmt->fetch();
}

if(isset($_POST['brand'])) {

    $stmt  = $connect->prepare('UPDATE brands  SET  brand_name = ? WHERE  brand_id = ?');
    $stmt->execute(array($_POST['brand'],$_POST['id']));
    header("location:brands.php");
}
?>
<div class="container">
    <h1 class="page-title admin-title">Edit Brand</h1>
    <form method="post" class="form-group admin-form">
        <?php
        echo "<input name='brand' class='form-control' type='text' value=".$dataRow["brand_name"].">";
        echo "<input name='id' class='form-control' type='hidden' value=".$_GET['brand_id'].">";
        ?>
        <input type="submit">
    </form>
</div>
