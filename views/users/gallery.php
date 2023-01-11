<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";



?>

<?php
$query = "SELECT * FROM " . CATS;

if(isset($_POST["search_btn"])):
    $query = "SELECT * FROM " . CATS;
    $search_in = $_POST["search_in"];
    $search = $_POST["search"];
    if($search_in=="color"):
        $query .= " as c";
        $query .= " LEFT JOIN " . CATS_COLOR . " as jp ON c.colorId=jp.colorId";
        $query .= " WHERE ". $search_in . " LIKE '%" . $search . "%'"; 
        // dd($query);
        
    elseif($search_in=="price"):
        $query .= " WHERE ". $search_in . "<=" . $search . "";
        // dd($query);

    elseif($search_in=="all"):
        $query = "SELECT * FROM " . CATS;

    else :
        $query .= " WHERE ". $search_in . " LIKE '%" . $search . "%'"; 
    endif;
    
endif;

$results = getAllData($query);

// dd($results);


?>


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
                    <li class="navbar-item items3"><a href="gallery.php" class="nav-link menuitems actives">Gallary</a></li>
                    <li class="navbar-item items4"><a href="contactus.php" class="nav-link menuitems">Contact Message</a></li>
                    <li class="navbar-item items5"><a href="adminlogin.php" class="nav-link menuitems">IsAdmin?</a></li>
                    <!-- <li class="navbar-item"><a href="" class="nav-link menuitems" >Cost Details</a></li> -->
                </ul>
            </div>
</nav>

<!-- end navbar section -->



<!-- start show cat details -->
<div class="container-fluid px-10">
    <form action="" method="POST" class="text-center mt-3">
        <select id="search_in" name="search_in" class="btn btn-dark" style="height:34px;">
        
            <option value="all">All Cats</option>
            <option value="catName">Cat Name</option>
            <option value="origin">Origin</option>
            <option value="color">Color</option>
            <option value="price">Price</option>
        </select>
        <input type="text" name="search" id="search" class="ml-1" placeholder="Search here" autocomplete="off"/>
        <input type="submit" name="search_btn" id="search_btn" class="btn btn-primary" value="Search"/>
    </form>

    <h1 class="display-4 my-2 text-muted">Gallary</h1>

    <?php if(empty($results)):?>
        <h2 class="text-center">No Result</h2>
    <?php else:?>
        <div class="row">
            <?php foreach($results as $result):?>
                <?php 
                    
                    // get colorId by cat id
                    $detailCat="SELECT * FROM " . CATS . " WHERE id=" . $result[0];  
                    $detailCatdata=getSingleDataByCondition($detailCat);
                    $colorId=$detailCatdata['colorId'];
                    
                    // get color by colorId
                    $catColor="SELECT color FROM " . CATS_COLOR . " WHERE colorId=" . $colorId;  
                    $catColordata=getSingleDataByCondition($catColor);

                    // get priceId by cat id
                    $priceId=$detailCatdata['priceId'];
                    
                    // get price range by priceId
                    $catPrice="SELECT priceRange FROM " . CATS_PRICE . " WHERE priceId=" . $priceId;  
                    $catPricedata=getSingleDataByCondition($catPrice);
                
                ?>
                <div class="col-lg-3 col-md-6 col-12">
                <!-- start cat details card -->
                    <div class="card rounded my-3 mycards">
                        <div class="card-header cats_images text-center">
                            <img src="<?= $result[17]?>" alt="cat_image" class="img-thumbnail" class="img-fluid"/>
                        </div>
                        
                        <div class="card-body">
                    
                            <h4 class="heights">Id :<?= $result[0]?> Cat Name: <?= $result[1]?> </h4>
                            <p class="card-text m-0 p-0 origin-heights"><span class="lead text-muted">Origin: </span><?=$result[10]?></p>
                            <p class="card-text m-0 p-0"><span class="lead text-muted">Color: </span> <?=$catColordata['color']?></p>
                            <p class="card-text m-0 p-0"><span class="lead text-muted">Price: </span><?=$catPricedata['priceRange']?></p>

                        </div>
                        <div class="card-footer">
                            <form action="gallerydetails.php" method="POST">
                                <div class="d-flex justify-content-end">
                                
                                    <input type="hidden" value="<?=$result[0]?>" name="cats_id">
                                    <input type="submit" class="mt-1 btn btn-info" style="border: 0;" value="Detail">
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- end cat details card -->
                </div>
            <?php endforeach;?>
        </div>                      
</div>

<!-- end show cat details -->
<?php endif;?>

<?php require "partials/footer.html"?>