<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";
$query = "SELECT * FROM " . ADMIN;
$results = getAllData($query);?>

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
                    <li class="navbar-item items3"><a href="addnewadmin.php" class="nav-link menuitems">Add new admin</a></li>
                    <li class="navbar-item items4"><a href="adminlist.php" class="nav-link menuitems actives">Admin List</a></li>
                    <li class="navbar-item items4"><a href="adminlogout.php" class="nav-link menuitems">Log Out</a></li>
                    
                </ul>
            </div>
            
       
    </nav>
  <!-- end admin navbar section -->
<?php
if(empty($results)):
    echo "<h2 class='text-center my-2'>No Admin</h2>";
else:
?>

<div class="row justify-content-center">
    <div class="col-10">
        <table class="table table-hover tables" id="dbtable">
            <h1 class="mt-4 mb-5 diaplay-4 text-muted text-center">Admin List</h1>
            <thead class="text-white">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Admin name</th>
                <th scope="col">Password</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $result):?>
                <tr>
                <th scope="row"><?= $result[0]?></th>
                <td><?= $result[1]?></td>
                <td><?= $result[2]?></td>
                <td>
                <form action="adminlistedit.php" method="POST">    
                        <input type="hidden" value="<?=$result[0]?>" style="opacity:0" name="admin_id">
                        <input type="submit" class="btn btn-sm btn-info" value="edit">      
                </form>
                </td>
                <td>
                <form action="../../controller/adminlistdeletecontroller.php" method="POST">    
                        <input type="hidden" value="<?=$result[0]?>" style="opacity:0" name="admin_id">
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">      
                </form>
                
                
                </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?php endif;?>
<?php require "partials/footer.html";?>