<?php require "partials/header.html";?>
<?php 
include "../../config.php";
require "../../function.php";?>

<?php
//CLICKED LOGIN SECTION
if (isset($_POST['login'])) {
    // echo "clicked login";
    $adminname = $_POST["adminname"];
    $password = $_POST["password"];

    $query = "SELECT adminId FROM " . ADMIN . " WHERE password='" . $password . "' AND adminName='" . $adminname . "'";
    //Check if record exist

    if (isExistA($query)) :
        
        // $user_data=getSingleDataByCondition($query);
        // $_SESSION["username"] = $username;
        // $_SESSION["id"]=$user_data['id'];
    ?>
        <!-- Start Loginsuccessful Section -->
        <?php 
           
            require('../../controller/adminloginsuccesscontroller.php');
        ?>
        <!-- End LoginSuccessful Section -->

    <?php else: ?>
        <!-- Start Loginfail Section --> 
        <?php     
            require('../../controller/adminloginfailcontroller.php');?>
        <!-- End LoginFail Section -->
    <?php endif;?>

<?php
} 

//UNCLICKED LOGIN SECTION
else { ?>
        <!-- start navbar section -->
        <nav class="navbar navbar-expand-lg sticky-top">
                    <a href="index.php" class="navbar-brand text-light mx-2">
                        <img src="../../assets/logo/logo1.png" alt="logo" width="100px"/>
                        <span class="text-uppercase mx-2 h4">Cat Breeds Recommendation System</span>
                    </a>

                    
                    <button class="navbar-toggler navbuttons" data-bs-toggle="collapse" data-bs-target="#nav">
                        <div class="bg-light lines1"></div>
                        <div class="bg-light lines2"></div>
                        <div class="bg-light lines3"></div>
                    </button>
        
                    <div class="navbar-collapse collapse justify-content-end text-uppercase fw-bold" id="nav">
                        <ul class="navbar-nav bolds">
                            <li class="navbar-item items1"><a href="index.php" class="nav-link menuitems">Home</a></li>
                            <li class="navbar-item items2"><a href="recommendation.php" class="nav-link menuitems" >Recommendation</a></li>
                            <li class="navbar-item items3"><a href="gallery.php" class="nav-link menuitems">Gallary</a></li>
                            <li class="navbar-item items4"><a href="contactus.php" class="nav-link menuitems">Contact Message</a></li>
                            <li class="navbar-item items5"><a href="" class="nav-link menuitems actives">IsAdmin?</a></li>
                            <!-- <li class="navbar-item"><a href="" class="nav-link menuitems" >Cost Details</a></li> -->
                        </ul>
                    </div>
                    
            
        </nav>
        <!-- end navbar section -->

        <!-- start admin login success -->
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-5 col-6 logins mt-5">
                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="adminname"><span class="fas fa-user"></span> Admin Name</label>
                        <input type="text" name="adminname" id="adminname" class="form-control" autocompleted="off" required/>
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><span class="fas fa-key"></span>  Password</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="false" required/>
                    </div>
                    <div class="d-flex justify-content-end mt-5 mb-3">
                        <button type="reset" class="btn btn-info mr-2">Reset</button>
                        <button type="submit" class="btn btn-success" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end admin login fail -->
<?php }?>
<?php require "partials/footer.html";?>