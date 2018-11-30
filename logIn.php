<?php
$nobreadCrumb = "";
$nonavbar ="";
include ("initialize.php");
if(isset($_SESSION['user name'])){
    header("location: index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userName = filter_var($_POST['userName'] , FILTER_SANITIZE_STRING);
    $pass     = filter_var($_POST['pass']      , FILTER_SANITIZE_STRING);

    $formErrors = array();

    if(strlen($userName) < 3){
        $formErrors[] = "user name must be more than <strong>2</strong> characters";
    }

    if(empty($formErrors)){

        $userCount = checkItem("user_name" , "users", $userName);
        if($userCount > 0){
            $res = selectItem("password" , "users" , array($userName) , "user_name = ?" , false);

            if($res["password"] == $pass){
                $_SESSION['user name'] = $userName;
                header("location: index.php");
            }else{
                echo '<div class="container"><div class="alert alert-danger text-center"><h4>user name OR email is wrong</h4></div></div>';
            }

        }else{

            echo '<div class="container"><div class="alert alert-danger text-center"><h4>user name OR email is wrong</h4></div></div>';
        }
    }
}
?>
<div class="container">
    <h1 class="page-title sign-in-form-header text-center">Log in </h1>
    <form class="sign-in-form" action="" method="POST">

        <div class="form-group">
            <input class="form-control" data-class='user' requireLen="3" type="text" name="userName" placeholder="user name" autocomplete="off" required
                   value="" />
            <i class="fa fa-user fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert alert-user">user name must be more than <strong>2</strong> characters</div>
        </div>


        <div class="form-group">
            <input class="form-control" data-class='pass' requireLen="5" type="password" name="pass" placeholder="password" autocomplete="off" required
                   value="" />
            <i class="fa fa-user fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert alert-pass">user name must be more than <strong>4</strong> characters</div>
        </div>


        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="log in">
            <i class="fa fa-send fa-fw"></i>
        </div>

        <div class="sign-in-hint">
            Don't hav an account yet ? <a href="register.php">create account</a>
        </div>

    </form>


</div>

<?php include $templateFile . "footer.php"; ?>

