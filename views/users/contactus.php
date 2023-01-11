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
                    <li class="navbar-item items2"><a href="recommendation.php" class="nav-link menuitems" >Recommendation</a></li>
                    <li class="navbar-item items3"><a href="gallery.php" class="nav-link menuitems">Gallary</a></li>
                    <li class="navbar-item items4"><a href="contactus.php" class="nav-link menuitems actives">Contact Message</a></li>
                    <li class="navbar-item items5"><a href="adminlogin.php" class="nav-link menuitems">IsAdmin?</a></li>
                    <!-- <li class="navbar-item"><a href="" class="nav-link menuitems" >Cost Details</a></li> -->
                </ul>
            </div>
            
       
    </nav>

<!-- end navbar section -->
    
   

<!-- start contactus section -->
<section class="contacts">
    <div class="container-fluid">

        <div class="text-center">
            <h1 class="display-2 text-muted">Contact Message</h1>
            <p class="lead text-muted">Got a question? We'd love to hear from you.</br>Send us a message and we'll respond as soon as possible.</p>
        </div>
        
            <form action="../../controller/contactusController.php" method="POST"> 
            <div class="row justify-content-center">           
                <div class="form-group col-7">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control rounded-0 p-3" placeholder="Enter your name" autocomplete="off" required/>
                </div>
                <div class="form-group col-7">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control rounded-0 p-3" placeholder="Enter your email" autocomplete="off" required/>
                </div>
                <div class="form-group col-7">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control rounded-0 p-3" placeholder="Enter your message here" rows="5" required></textarea>
                </div>
                <div class="d-grid col-7 text-center mt-2 mb-4">
                    <button type="submit" name="submit" class="btn btn-info btn-block p-2">Submit</button>
                </div>
                    
            </div>   
            </form>
        
    </div>
</section>
       
<!-- end contactus section -->
 <?php require "partials/footer.html"?>
