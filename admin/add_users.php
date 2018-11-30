<?php
$nonavbar ="";
$nobreadCrumb ="";
$noupperbar ="";
include("initialize.php");
if(isset($_POST['user_name'])) {

    $stmt  = $connect->prepare('UPDATE users  SET  user_name = ? , email = ? , password = ? , group_id = ? WHERE  user_id = ?');
    $stmt->execute(array($_POST['user_name'],$_POST['email'],$_POST['pass'],$_POST['gid'],$_POST['id']));


    $stmt = $connect->prepare("INSERT INTO users(user_name, email, password,create_account_date )

                                                 VALUES            (:zname,   :zmail,   :zpass, now() )
                                       ");

    $stmt->execute(array(
        'zname' => $_POST['user_name'] ,
        'zmail' => $_POST['email'] ,
        'zpass' => $_POST['pass'],
    ));
    header("location:users.php");
}
?>
<div class="container">
    <h1 class="page-title admin-title">Add user</h1>
    <form method="post" class="form-group admin-form">
        <?php
        echo "<lable>user name</lable>";
        echo "<input name='user_name' class='form-control' type='text'>";
        echo "<lable>user email</lable>";
        echo "<input name='email' class='form-control' type='email' >";
        echo "<lable>user password</lable>";
        echo "<input name='pass' class='form-control' type='text'>";
        echo "<lable>user group id</lable>";
        echo "<input name='gid' class='form-control' type='text' >";
        ?>
        <input type="submit">
    </form>
</div>
