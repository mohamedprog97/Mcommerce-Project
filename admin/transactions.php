<?php
$nonavbar ="";
$nobreadCrumb ="";
include("initialize.php");

$rows = selectItem("*" , "transaction" );
?>
<div class="container">
    <h1 class="page-title admin-title">transactions</h1>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="text-center">transaction id</th>
            <th class="text-center">transaction  user id</th>
            <th class="text-center">transaction  mobile id</th>
            <th class="text-center">transaction  date</th>
        </tr>
        <?php
        foreach ($rows as $row){ ?>
            <tr>
                <td class="text-center"><?php echo $row["trans_id"] ?></td>
                <td class="text-center"><?php echo $row["tran_user_id"] ?></td>
                <td class="text-center"><?php echo $row["tran_mobile_id"] ?></td>
                <td class="text-center"><?php echo $row["trans_date"] ?></td>
            </tr>
        <?php }

        ?>
    </table>
</div>

