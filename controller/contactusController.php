<?php

include("../config.php");

if (isset($_POST['submit'])) {
        // echo "Sumitted";
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        
        //INSERT INTO DATABASE
        if(!empty($name) and !empty($email) and !empty($message)){
            $response = array();
            $insertQuery  = "INSERT INTO " . CATS_CONTACT . "(name,email,message) VALUES (?,?,?)";
            if ($stmt = $con->prepare($insertQuery)) {
                $stmt->bind_param("sss", $name, $email,$message);
                $stmt->execute();
                // echo "Registered";
                $stmt->close();
                $insertedID = $con->insert_id;
			    $status = 0;
                $msg =$insertedID;
                if($msg!=0){
               
                    $message="Great!! Successfully Sent Your Message";?>
                    <?php require "../views/users/partials/controllerheader.html";?>

                    <!-- start navbar section -->    
                        <nav class="navbar navbar-expand-lg sticky-top">
                                    <a href="../views/users/index.php" class="navbar-brand text-light mx-2">
                                        <img src="../assets/logo/logo1.png" alt="logo" width="100px"/>
                                        <span class="text-uppercase mx-2 h4">Cat Breeds Recommendation System</span>
                                    </a>

                                    
                                    <button class="navbar-toggler navbuttons" data-bs-toggle="collapse" data-bs-target="#nav">
                                        <div class="bg-light lines1"></div>
                                        <div class="bg-light lines2"></div>
                                        <div class="bg-light lines3"></div>
                                    </button>
                        
                                    <div class="navbar-collapse collapse justify-content-end text-uppercase fw-bold" id="nav">
                                        <ul class="navbar-nav bolds">
                                            <li class="navbar-item"><a href="../views/users/index.php" class="nav-link menuitems">Home</a></li>
                                            <!-- <li class="navbar-item"><a href="" class="nav-link menuitems" >Cost Details</a></li> -->
                                            <li class="navbar-item"><a href="" class="nav-link menuitems" >Recommendation</a></li>
                                            <li class="navbar-item"><a href="../views/users/gallery.php" class="nav-link menuitems">Gallary</a></li>
                                            <li class="navbar-item"><a href="../views/users/contactus.php" class="nav-link menuitems actives">Contact Us</a></li>
                                            <li class="navbar-item"><a href="../views/users/adminlogin.php" class="nav-link menuitems">IsAdmin?</a></li>
                                        </ul>
                                    </div>
                                    
                            
                        </nav>
                    <!-- end navbar section -->

                     <!-- start contactus section -->
                        <section class="contacts">
                            <div class="container-fluid">
                            <div class="alert alert-success text-center" role="alert">
                                <h4><?= $message?></h4>
                            </div>
                                
                                <div class="text-center">
                                    <h1 class="display-2 text-muted">Contact Message</h1>
                                    <p class="lead text-muted">Got a question? We'd love to hear from you.</br>Send us a message and we'll respond as soon as possible.</p>
                                </div>
                                
                                    <form action="../controller/contactusController.php" method="POST"> 
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
            

                   
                    <?php require "../views/users/partials/controllerfooter.html"?>
                    <?php

               }else{

                ?>
                    <?php require "../views/users/partials/controllerheader.html";?>

                    <!-- start navbar section -->    
                        <nav class="navbar navbar-expand-lg sticky-top">
                                    <a href="../views/users/index.php" class="navbar-brand text-light mx-2">
                                        <img src="../assets/logo/logo1.png" alt="logo" width="100px"/>
                                        <span class="text-uppercase mx-2 h4">Cat Breeds Recommendation System</span>
                                    </a>

                                    
                                    <button class="navbar-toggler navbuttons" data-bs-toggle="collapse" data-bs-target="#nav">
                                        <div class="bg-light lines1"></div>
                                        <div class="bg-light lines2"></div>
                                        <div class="bg-light lines3"></div>
                                    </button>
                        
                                    <div class="navbar-collapse collapse justify-content-end text-uppercase fw-bold" id="nav">
                                        <ul class="navbar-nav bolds">
                                            <li class="navbar-item"><a href="../views/users/index.php" class="nav-link menuitems">Home</a></li>
                                            <!-- <li class="navbar-item"><a href="" class="nav-link menuitems" >Cost Details</a></li> -->
                                            <li class="navbar-item"><a href="" class="nav-link menuitems" >Recommendation</a></li>
                                            <li class="navbar-item"><a href="../views/users/gallery.php" class="nav-link menuitems">Gallary</a></li>
                                            <li class="navbar-item"><a href="../views/users/contactus.php" class="nav-link menuitems actives">Contact Message</a></li>
                                            <li class="navbar-item"><a href="../views/users/adminlogin.php" class="nav-link menuitems">IsAdmin?</a></li>
                                        </ul>
                                    </div>
                                    
                            
                        </nav>
                    <!-- end navbar section -->

                    <!-- start contactus section -->
                        <section class="contacts">
                            <div class="container-fluid">
                            <div class="alert alert-success" role="alert">
                                <p><?=  "Failed!Your message isn't successfully sent" ?></p>
                            </div>
                                
                                <div class="text-center">
                                    <h1 class="display-2 text-muted">Contact Message</h1>
                                    <p class="lead text-muted">Got a question? We'd love to hear from you.</br>Send us a message and we'll respond as soon as possible.</p>
                                </div>
                                
                                    <form action="../controller/contactusController.php" method="POST"> 
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

                    <?php require "../views/users/partials/controllerfooter.html"?>
                    <?php
                
              }
                
                }

            }
        }
?>
               
