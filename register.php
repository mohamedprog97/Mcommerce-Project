<?php
$nobreadCrumb = "";
$nonavbar ="";
include ("initialize.php");
if(isset($_SESSION['user name'])){
    header("location: index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userName = filter_var($_POST['userName'] , FILTER_SANITIZE_STRING);
    $email    = filter_var($_POST['email']    , FILTER_SANITIZE_EMAIL);
    $pass     = filter_var($_POST['pass']      , FILTER_SANITIZE_STRING);
    $msg      = filter_var($_POST['msg']      , FILTER_SANITIZE_STRING);

    $formErrors = array();

    if(strlen($userName) < 3){
        $formErrors[] = "user name must be more than <strong>2</strong> characters";
    }

    if(empty($formErrors)){

        $userCount = checkItem("user_name" , "users", $userName);
        if($userCount > 0){
            echo '<div class="container"><div class="alert alert-danger text-center"><h4>this user already exist choose another name</h4></div></div>';

        }else{
            $stmt = $connect->prepare("INSERT INTO users(user_name, email, password, msg , create_account_date )

                                                 VALUES            (:zname,   :zmail,   :zpass,   :zmsg , now() )
                                       ");

            $stmt->execute(array(
                'zname' => $userName ,
                'zmail' => $email ,
                'zpass' => $pass,
                'zmsg' => $msg,
            ));
            echo '<div class="container"><div class="alert alert-success text-center"><h4>Your Account Created Successfully :)</h4></div></div>';
        }
    }
}
?>
<div class="container">
    <h1 class="page-title crate-account-header text-center">Create Account</h1>
    <form class="create-account" action="" method="POST">

        <div class="form-group">
            <input class="form-control" data-class='user' requireLen="3" type="text" name="userName" placeholder="user name" autocomplete="off" required
                   value="" />
            <i class="fa fa-user fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert alert-user">user name must be more than <strong>2</strong> characters</div>
        </div>


        <div class="form-group">
            <input class="form-control" data-class='email' requireLen="1" type="email" name="email" placeholder="email" autocomplete="off" required
                   value="" />
            <i class="fa fa-envelope fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert alert-email">email can't be <strong>empty</strong></div>
        </div>

        <div class="form-group">
            <input class="form-control" data-class='pass' requireLen="5" type="password" name="pass" placeholder="password" autocomplete="off" required
                   value="" />
            <i class="fa fa-user fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert alert-pass">user name must be more than <strong>4</strong> characters</div>
        </div>

        <div class="form-group">
            <textarea class="form-control" data-class='msg'  type="text" name="msg" placeholder="your message!"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="create account">
            <i class="fa fa-send fa-fw"></i>
        </div>

        <div class="sign-in-hint">
            Already hav an account ? <a href="logIn.php">sign in</a>
        </div>

    </form>


</div>

<?php include $templateFile . "footer.php"; ?>

