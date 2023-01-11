<?php require "partials/header.html";?>

    
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
                            <li class="navbar-item items2"><a href="" class="nav-link menuitems" >Recommendation</a></li>
                            <li class="navbar-item items3"><a href="gallery.php" class="nav-link menuitems">Gallary</a></li>
                            <li class="navbar-item items4"><a href="contactus.php" class="nav-link menuitems">Contact Us</a></li>
                            <li class="navbar-item items5"><a href="adminlogin.php" class="nav-link menuitems actives">IsAdmin?</a></li>
                            <!-- <li class="navbar-item"><a href="" class="nav-link menuitems" >Cost Details</a></li> -->
                        </ul>
                    </div>
                    
            
        </nav>
        <!-- end navbar section -->
       
<section class="loginani">
        <!-- start admin login success -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 col-sm-5 col-6 successlogins mt-5">
                <div class="successs">
                    <h1 class="mb-3 h2">Login successful!!</h1>
                    <p>Successfully Login an account. Please! Go To <a href="../admins/index.php">Admin Page </a></p>       
                </div> 
            </div>
        </div>
        <!-- end admin login success -->
</section>
        

<?php require "partials/footer.html";?>