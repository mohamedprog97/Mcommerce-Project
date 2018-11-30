<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $stmt = $connect->prepare('SELECT * FROM users WHERE user_id = ?  LIMIT 1 ');
    $stmt->execute(array($user_id));
    $dataRow = $stmt->fetch();
}

if(isset($_POST['user_name'])) {

    $stmt  = $connect->prepare('UPDATE users  SET  user_name = ? , email = ? , password = ? , group_id = ? WHERE  user_id = ?');
    $stmt->execute(array($_POST['user_name'],$_POST['email'],$_POST['pass'],$_POST['gid'],$_POST['id']));
    header("location:users.php");
}
?>
<div class="container">
    <h1 class="page-title admin-title">Edit user</h1>
    <form method="post" class="form-group admin-form">
        <?php
        echo "<lable>user name</lable>";
        echo "<input name='user_name' class='form-control' type='text' value='".$dataRow['user_name']."'>";
        echo "<lable>user email</lable>";
        echo "<input name='email' class='form-control' type='email' value=".$dataRow["email"].">";
        echo "<lable>user password</lable>";
        echo "<input name='pass' class='form-control' type='text' value=".$dataRow["password"].">";
        echo "<lable>user group id</lable>";
        echo "<input name='gid' class='form-control' type='text' value=".$dataRow["group_id"].">";
        echo "<input name='id' class='form-control' type='hidden' value=".$_GET['user_id'].">";
        ?>
        <input type="submit">
    </form>
</div>
