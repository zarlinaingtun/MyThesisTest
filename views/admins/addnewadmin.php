<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";
?>

<?php
//CLICKED LOGIN SECTION
if (isset($_POST['add'])) {

    $adminname = $_POST["adminname"];
    $password = $_POST["password"];
    $insertedID = 0;
    $insertQuery  = "INSERT INTO ". ADMIN ."(adminName,password) VALUES(?,?)";
                    
        if (!empty($adminname) and !empty($password)):
            // echo "not null";
            if ($stmt = $con->prepare($insertQuery)):
                $stmt->bind_param("ss",$adminname,$password);
                $stmt->execute();
                $stmt->close();
                $insertedID = $con->insert_id;
                $status = 0;
                $msg = " Insert data into admin table successful. ID : " . $insertedID;
                echo "<script >";    
                echo "self.location='adminlist.php'; ";
                echo "window.alert('Successfully added new admin!!')";
                echo "</script>";
            endif;
        endif;
} 


//UNCLICKED LOGIN SECTION
else { ?>
    <!-- start admin navbar section -->
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
                <li class="navbar-item items1"><a href="index.php" class="nav-link menuitems">Admin Home</a></li>
                <li class="navbar-item items1"><a href="admincatdetails.php" class="nav-link menuitems">Cats Details</a></li>
                <li class="navbar-item items2"><a href="admincontactus.php" class="nav-link menuitems" >Contact Message</a></li>
                <li class="navbar-item items3"><a href="addnewadmin.php" class="nav-link menuitems actives">Add new admin</a></li>
                <li class="navbar-item items4"><a href="adminlist.php" class="nav-link menuitems">Admin List</a></li>
                <li class="navbar-item items4"><a href="adminlogout.php" class="nav-link menuitems">Log Out</a></li>
                
            </ul>
        </div>
        
    
    </nav>
    <!-- end admin navbar section -->

    <!-- start new admin form -->
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <h1 class="my-5 text-muted">Add New Admin</h1>
                <form action="" method="POST" class="my-2">
                            
                <div class="form-group">
                    <label for="adminname"><span class="fas fa-user"></span>  New Admin Name</label>
                    <input type="text" name="adminname" id="adminname" class="form-control" autocompleted="off" required/>
                </div>
                
                <div class="form-group">
                    <label for="password"><span class="fas fa-key"></span>  Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="false" required/>
                </div>
                <div class="d-flex justify-content-end mt-5 mb-3">
                    <button type="reset" class="btn btn-info mr-4">Reset</button>
                    <button type="submit" class="btn btn-success" name="add">Add new admin</button>
                </div>
                </form>
            </div>
        </div>
    <!-- end new admin form -->

<?php }?>

<?php require "partials/footer.html";?>