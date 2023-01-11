<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";
$query = "SELECT * FROM " . CATS;
$results = getAllData($query);

?>

  <!-- start admin navbar section -->
  <nav class="navbar navbar-expand-lg sticky-top" style="width:2800px">
        <a href="index.php" class="navbar-brand text-light mx-2 mr-5">
            <img src="../../assets/logo/logo1.png" alt="logo" width="100px"/>
            <span class="text-uppercase mx-2 h4">Cat Breeds Recommendation System</span>
        </a>

            
        <button class="navbar-toggler navbuttons" data-bs-toggle="collapse" data-bs-target="#nav">
            <div class="bg-light lines1"></div>
            <div class="bg-light lines2"></div>
            <div class="bg-light lines3"></div>
        </button>
   
        <div class="navbar-collapse collapse text-uppercase fw-bold ml-5" id="nav">
            <ul class="navbar-nav bolds">
                <li class="navbar-item items1"><a href="index.php" class="nav-link menuitems">Admin Home</a></li>
                <li class="navbar-item items1"><a href="admincatdetails.php" class="nav-link menuitems actives">Cats Details</a></li>
                <li class="navbar-item items2"><a href="admincontactus.php" class="nav-link menuitems" >Contact Message</a></li>
                <li class="navbar-item items3"><a href="addnewadmin.php" class="nav-link menuitems">Add new admin</a></li>
                <li class="navbar-item items4"><a href="adminlist.php" class="nav-link menuitems">Admin List</a></li>
                <li class="navbar-item items4"><a href="adminlogout.php" class="nav-link menuitems">Log Out</a></li>
                
            </ul>
        </div>
            
       
    </nav>
  <!-- end admin navbar section -->
<?php
if(empty($results)):
    echo "<h2 class='text-center my-2'>No Cat Details</h2>";
else:
?>

<div class="row justify-content-center">
    <div class="col-11">
        <table class="table tables table-hover table-sm bg-white" id="dbtable">
            <h1 class="mt-4 mb-5 diaplay-4 text-muted text-center">Cat Details</h1>
            <div class="mt-2 mb-5">
                <a href="adminaddnewcatbreed.php"><input type="submit" name="add" id="add" class="btn btn-success py-2 px-4" value="Add New Cat Breed"/></a>
            </div>
            <thead class="text-white bgpinks">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Cat name</th>
                <th scope="col">sizeId</th>
                <th scope="col">priceId</th>
                <th scope="col">coatId</th>
                <th scope="col">childfriendlyId</th>
                <th scope="col">dogfriendlyId</th>
                <th scope="col">colorId</th>
                <th scope="col">price</th>
                <th scope="col">popularityRank</th>
                <th scope="col">origin</th>
                <th scope="col">lapcat</th>
                <th scope="col">weight</th>
                <th scope="col">lifeSpan</th>
                <th scope="col">temperament</th>
                <th scope="col">healthIssues</th>
                <th scope="col">grooming</th>
                <th scope="col">catImage</th>
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
                <td><?= $result[3]?></td>
                <td><?= $result[4]?></td>
                <td><?= $result[5]?></td>
                <td><?= $result[6]?></td>
                <td><?= $result[7]?></td>
                <td><?= $result[8]?></td>
                <td><?= $result[9]?></td>
                <td><?= $result[10]?></td>
                <td><?= $result[11]?></td>
                <td><?= $result[12]?></td>
                <td><?= $result[13]?></td>
                <td><?= $result[14]?></td>
                <td><?= $result[15]?></td>
                <td><?= $result[16]?></td>
                <td><?= $result[17]?></td>

                <td>
                <form action="admineditcatdetails.php" method="POST">    
                        <input type="hidden" value="<?=$result[0]?>" style="opacity:0" name="catdetails_id">
                        <input type="submit" class="btn btn-sm btn-info" value="Edit">      
                </form>
                
                </td>
                <td>
                <form action="../../controller/admindeletecatbreedcontroller.php" method="POST">    
                        <input type="hidden" value="<?=$result[0]?>" style="opacity:0" name="catdetails_id">
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