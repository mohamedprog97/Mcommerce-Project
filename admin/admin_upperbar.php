<?php
if(isset($_SESSION['admin name'])){ ?>
<!-- start upper-bar -->
<nav class="upper-bar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><span class="main-color">m</span>commerce</a>
        <div class="input-group-btn">
            <button class="btn btn-success uname">
                <?php echo "welcome ". $_SESSION['admin name']; ?>
            </button>
            <button class="btn btn-success btn-icon">
                <a href="admin_logout.php"><i class="fa fa-sign-out"></i> log out</a>
            </button>
        </div>
        <form class="navbar-form navbar-right" role="search" method="post" action="search.php">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
</nav>
<!-- end upper-bar -->
<?php } ?>
