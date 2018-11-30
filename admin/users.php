<?php
$nonavbar ="";
$nobreadCrumb ="";
include("initialize.php");

$rows = selectItem("*" , "users" );
?>
<div class="container">
    <h1 class="page-title admin-title">users</h1>
    <a href="add_users.php" class='btn btn-primary'><i class="fa fa-plus"></i> add new </a>
    <br><br>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">user name</th>
            <th class="text-center">user email</th>
            <th class="text-center">user password</th>
            <th class="text-center">user group id</th>
            <th class="text-center">action</th>
        </tr>
        <?php
        foreach ($rows as $row){ ?>
            <tr>
                <td class="text-center"><?php echo $row["user_id"] ?></td>
                <td class="text-center"><?php echo $row["user_name"] ?></td>
                <td class="text-center"><?php echo $row["email"] ?></td>
                <td class="text-center"><?php echo $row["password"] ?></td>
                <td class="text-center"><?php echo $row["group_id"] ?></td>
                <td class="text-center">
                    <?php
                    echo "<a href='edit_user.php?user_id=".$row['user_id']."' class='btn btn-success'><i class=\"fa fa-pencil\"></i> Edit</a>";
                    echo " ";
                    echo "<a href='delete_user.php?user_id=".$row['user_id']."' class='btn btn-danger'><i class=\"fa fa-close\"></i> Delete</a>";
                    ?>
                </td>
            </tr>
        <?php }

        ?>
    </table>
</div>

