<?php
$nonavbar ="";
$nobreadCrumb ="";
include("initialize.php");

$rows = selectItem("*" , "brands" );
?>
<div class="container">
    <h1 class="page-title admin-title">Brands</h1>
    <a href="add_brand.php" class='btn btn-primary'><i class="fa fa-plus"></i> add new </a>
    <br><br>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">brand name</th>
            <th class="text-center">action</th>
        </tr>
    <?php
    foreach ($rows as $row){ ?>
        <tr>
            <td class="text-center"><?php echo $row["brand_id"] ?></td>
            <td class="text-center"><?php echo $row["brand_name"] ?></td>
            <td class="text-center">
                <?php
                echo "<a href='edit_brand.php?brand_id=".$row['brand_id']."' class='btn btn-success'><i class=\"fa fa-pencil\"></i> Edit</a>";
                echo " ";
                echo "<a href='delete_brand.php?brand_id=".$row['brand_id']."' class='btn btn-danger'><i class=\"fa fa-close\"></i> Delete</a>";
                ?>
            </td>
        </tr>
    <?php }

    ?>
    </table>
</div>

