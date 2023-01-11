<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";

$detailId=$_POST['cats_id'];

$detailCat="SELECT * FROM " . CATS . " WHERE id=" . $detailId;  
$detailCatdata=getSingleDataByCondition($detailCat);

$colorId=$detailCatdata['colorId'];

// Get Color
$catColor="SELECT color FROM " . CATS_COLOR . " WHERE colorId=" . $colorId;  
$catColordata=getSingleDataByCondition($catColor);
// dd($catColordata['color']);

// Get Price
$pricerangeId=$detailCatdata['priceId'];

$catPricerange="SELECT priceRange FROM " . CATS_PRICE . " WHERE priceId=" . $pricerangeId;  
$catPricerangedata=getSingleDataByCondition($catPricerange);
// dd($catPricerangedata['priceRange']);

// Get Size
$sizeId=$detailCatdata['sizeId'];

$catSize="SELECT size FROM " . CATS_SIZE . " WHERE sizeId=" . $sizeId;  
$catSizedata=getSingleDataByCondition($catSize);
// dd($catSizedata['size']);

// Get Coat
$coatId=$detailCatdata['coatId'];

$catCoat="SELECT coat FROM " . CATS_COAT . " WHERE coatId=" . $coatId;  
$catCoatdata=getSingleDataByCondition($catCoat);
// dd($catCoatdata['coat']);

// Get Childfriendly
$childfriendlyId=$detailCatdata['childfriendlyId'];

$catChildfriendly="SELECT childfriendly FROM " . CATS_CHILDFRIENDLY . " WHERE childfriendlyId=" . $childfriendlyId;  
$catChildfriendlydata=getSingleDataByCondition($catChildfriendly);
// dd($catChildfriendlydata['childfriendly']);

// Get Dogfriendly
$dogfriendlyId=$detailCatdata['dogfriendlyId'];

$catDogfriendly="SELECT dogfriendly FROM " . CATS_DOGFRIENDLY . " WHERE dogfriendlyId=" . $dogfriendlyId;  
$catDogfriendlydata=getSingleDataByCondition($catDogfriendly);
// dd($catDogfriendlydata['dogfriendly']);
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


<!-- start cat detail info page -->
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-md-4 col-10 text-center my-auto cats_detail_images">
            <img src="<?= $detailCatdata['catImage']?>" alt="cat_image" class="img-thumbnail img-fluid" width="300px" height="300px"/>
        </div>
        <div class="col-md-8 col-10">
            <div class="card mycards">
                <div class="card-header">
                    <h4 class="display-4 font-weight-bold d-inline pinks">Cat Name: </h4><span class="display-4"><?= $detailCatdata['catName']?></span>
                </div>
                <div class="card-body">
                
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Size: </span><?=$catSizedata['size']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Price: </span><?=$catPricerangedata['priceRange']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Coat: </span><?=$catCoatdata['coat']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Childfriendly? : </span><?=$catChildfriendlydata['childfriendly']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Dogfriendly? : </span><?=$catDogfriendlydata['dogfriendly']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Color: </span> <?=$catColordata['color']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Price: </span>$<?=$detailCatdata['price']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Popularity Rank: </span><?=$detailCatdata['popularityRank']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Origin: </span><?=$detailCatdata['origin']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Lap Cat? : </span><?=$detailCatdata['lapcat']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Weight: </span><?=$detailCatdata['weight']?></p>
                    <p class="m-0 font_sizes"><span class="font-weight-bold pinks">Life Span: </span><?=$detailCatdata['lifeSpan']?></p>
                    <p class="m-0 my-2 font_sizes"><span class="font-weight-bold pinks">Temperament: </span><?=$detailCatdata['temperament']?></p>
                    <p class="m-0 my-2 font_sizes"><span class="font-weight-bold pinks">Health Issues: </span><?=$detailCatdata['healthIssues']?></p>
                    <p class="m-0 my-2 font_sizes"><span class="font-weight-bold pinks">Grooming: </span><?=$detailCatdata['grooming']?></p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end cat detail info page -->

<?php require "partials/footer.html"?>


