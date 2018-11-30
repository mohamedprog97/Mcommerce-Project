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

    $stmt = $connect->prepare("INSERT INTO brands (brand_name)

                                                 VALUES       (:zname)
                                       ");
    $stmt->execute(array(
        'zname' => $_POST['brand'] ,
    ));
    header("location:brands.php");
}
?>
<div class="container">
    <h1 class="page-title admin-title">Add Brand</h1>
    <form method="post" class="form-group admin-form">
        <?php
        echo "<input name='brand' class='form-control' type='text'>";
        ?>
        <input type="submit">
    </form>
</div>
