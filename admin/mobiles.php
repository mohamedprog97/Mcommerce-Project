<?php
$nonavbar ="";
$nobreadCrumb ="";
include("initialize.php");

$rows = selectItem("*" , "mobiles" );
?>
<div class="container">
    <h1 class="page-title admin-title">mobiles</h1>
    <a href="add_mobiles.php" class='btn btn-primary'><i class="fa fa-plus"></i> add new </a>
    <br><br>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">mobile name</th>
            <th class="text-center">mobile price</th>
            <th class="text-center">mobile rate</th>
            <th class="text-center">action</th>
        </tr>
        <?php
        foreach ($rows as $row){ ?>
            <tr>
                <td class="text-center"><?php echo $row["mobile_id"] ?></td>
                <td class="text-center"><?php echo $row["mobile_name"] ?></td>
                <td class="text-center"><?php echo $row["price"] ?></td>
                <td class="text-center"><?php echo $row["rate"] ?></td>
                <td class="text-center">
                    <?php
                    echo "<a href='edit_mobile.php?mobile_id=".$row['mobile_id']."' class='btn btn-success'><i class=\"fa fa-pencil\"></i> Edit</a>";
                    echo " ";
                    echo "<a href='delete_mobile.php?mobile_id=".$row['mobile_id']."' class='btn btn-danger'><i class=\"fa fa-close\"></i> Delete</a>";
                    ?>
                </td>
            </tr>
        <?php }

        ?>
    </table>
</div>

