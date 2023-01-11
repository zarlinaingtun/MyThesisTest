<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";

$query = "SELECT * FROM " . CATS_SIZE;
$sizes=getAllData($query);

$query = "SELECT * FROM " . CATS_COLOR;
$colors=getAllData($query);

$query = "SELECT * FROM " . CATS_PRICE;
$prices=getAllData($query);

$query = "SELECT * FROM " . CATS_COAT;
$coats=getAllData($query);

$query = "SELECT * FROM " . CATS_CHILDFRIENDLY;
$childs=getAllData($query);

$query = "SELECT * FROM " . CATS_DOGFRIENDLY;
$dogs=getAllData($query);

$query="SELECT * FROM " . CATS;
$results=getAllData($query);

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
                    <li class="navbar-item items2"><a href="recommendation.php" class="nav-link menuitems actives">Recommendation</a></li>
                    <li class="navbar-item items3"><a href="gallery.php" class="nav-link menuitems">Gallary</a></li>
                    <li class="navbar-item items4"><a href="contactus.php" class="nav-link menuitems">Contact Message</a></li>
                    <li class="navbar-item items5"><a href="adminlogin.php" class="nav-link menuitems">IsAdmin?</a></li>

                </ul>
            </div>
            
       
</nav>
<!-- end navbar section -->

<?php
if (isset($_POST['search'])):
    
    if(!empty($_POST["price"]) && !empty($_POST["color"]) && !empty($_POST["coat"])){
        $size = $_POST["size"];
        $price = $_POST["price"];
        $color = $_POST["color"];
        $coat=$_POST["coat"];
        $child=$_POST["child"];
        $dog=$_POST["dog"];

        if(!is_null($price) && !is_null($color) && !is_null($coat)){
 
                // echo "$size";
                // echo "$price";
                // echo "$color";
                // echo "$coat";
                // echo "$child";
                // echo "$dog";

$array2=array();
$array3=array();
$array4=array();
$indexarray=array();
$array1=array($size,$price,$color,$coat,$child,$dog);
// dd($array1);

foreach($results as $row){
    // dd($row);
    $array2[0]=$row[0];
    $array2[1]=$row[2];
    $array2[2]=$row[3];
    $array2[3]=$row[7];
    $array2[4]=$row[4];
    $array2[5]=$row[5];
    $array2[6]=$row[6];
   
    $ans=calculateDistance($array1,$array2);
    
    array_push($array3,$ans);
   }
//    echo "<pre>";
//    print_r($array3);
   
   $array4=$array3;
   sort($array4);

//    echo "<pre>";
//    print_r($array4);

for($i=0;$i<5;$i++){
    if($array4[$i]==$array4[$i+1]){
        $i=$i+1;
    }
    
    if($array4[$i]==$array4[$i+1]){
        $i=$i+1;
    }
   
    if($array4[$i]==$array4[$i+1]){
        $i=$i+1;
    }
    
    if($array4[$i]==$array4[$i+1]){
        $i=$i+1;
    }
   
    if($array4[$i]==$array4[$i+1]){
        $i=$i+1;
    }
    
    
    for($j=0;$j<count($array3);$j++){
        if($array4[$i]==$array3[$j]){
            array_push($indexarray,$j+1);
        }
    }
    
}
// var_dump($indexarray);
for($i=0;$i<5;$i++){
    echo $indexarray[$i],' ';
}

?>
<div class="container-fluid">
    <h2 class="text-muted text-center my-3">&hearts; Five Cats Recommendation For You &hearts;</h2>
    <div class="row justify-content-center">

    <?php
    for($i=0;$i<5;$i++){
        $ind=$indexarray[$i];
       
        $query="SELECT * FROM CATS where id=$ind";
        $result=getSingleDataByCondition($query);
        // dd($result);
   
        // get size range by sizeId
        $catSize="SELECT size FROM " . CATS_SIZE . " WHERE sizeId=" . $result['sizeId'];  
        $catSizedata=getSingleDataByCondition($catSize);

        // get price range by priceId
        $catPrice="SELECT priceRange FROM " . CATS_PRICE . " WHERE priceId=" . $result['priceId'];  
        $catPricedata=getSingleDataByCondition($catPrice);
                       
        //get color by colorId
        $catColor="SELECT color FROM " . CATS_COLOR . " WHERE colorId=" . $result['colorId'];  
        $catColordata=getSingleDataByCondition($catColor);

        //get coat by coatId
        $catCoat="SELECT coat FROM " . CATS_COAT . " WHERE coatId=" . $result['coatId'];  
        $catCoatdata=getSingleDataByCondition($catCoat);

        //get coat by childfriendlyId
        $catChildfriendly="SELECT childfriendly FROM " . CATS_CHILDFRIENDLY . " WHERE childfriendlyId=" . $result['childfriendlyId'];  
        $catChildfriendlydata=getSingleDataByCondition($catChildfriendly);

        //get coat by childfriendlyId
        $catDogfriendly="SELECT dogfriendly FROM " . CATS_DOGFRIENDLY . " WHERE dogfriendlyId=" . $result['dogfriendlyId'];  
        $catDogfriendlydata=getSingleDataByCondition($catDogfriendly);

       
           

?>
                     
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <!-- start 5 cat details card -->
                <div class="card rounded my-3 mycards">
                    <div class="card-header cats_images text-center">
                        <img src="<?= $result['catImage']?>" alt="cat_image" class="img-thumbnail" class="img-fluid"/>
                    </div>
                    
                    <div class="card-body">
                
                        <h4 class="heights">Id :<?= $result ["id"]?> Cat Name: <?= $result["catName"]?> </h4>
                        <p class="card-text m-0 p-0"><span class="lead text-muted">Size: </span><?=$result["sizeId"]?> <?=$catSizedata['size']?></p>
                        <p class="card-text m-0 p-0"><span class="lead text-muted">Price: </span><?=$result ["priceId"]?> <?=$catPricedata['priceRange']?></p>
                        <p class="card-text m-0 p-0"><span class="lead text-muted">Color: </span><?=$result["colorId"]?> <?=$catColordata['color']?></p>
                        <p class="card-text m-0 p-0"><span class="lead text-muted">Coat: </span><?=$result["coatId"]?> <?=$catCoatdata['coat']?></p>
                        <p class="card-text m-0 p-0"><span class="lead text-muted">Good With Child: </span><?=$result["childfriendlyId"]?> <?=$catChildfriendlydata['childfriendly']?></p>
                        <p class="card-text m-0 p-0"><span class="lead text-muted">Good With Dog: </span><?=$result["dogfriendlyId"]?> <?=$catDogfriendlydata['dogfriendly']?></p>

                    </div>
                    <div class="card-footer">
                        <form action="gallerydetails.php" method="POST">
                            <div class="d-flex justify-content-end">
                            
                                <input type="hidden" value="<?=$result["id"]?>" name="cats_id">
                                <input type="submit" class="mt-1 btn btn-info" style="border: 0;" value="Detail">
                            </div>
                        </form>
                    </div>
                </div>
            <!-- end 5 cat details card -->
        </div>

    <?php } ?>            
        </div>
</div>        
                                  
<?php 



        }
    } 
    else{   
?>
    <!-- start null error recommendation section -->
    <section class="contacts">
            <div class="container-fluid">

                <div class="text-center">
                    <h1 class="text-muted py-3">Recommendation2 for Cat Breeds</h1>
                    <p class="lead text-danger font-weight-bold">**All attributes must be filled.**</p>
                </div>
                <div class="alert alert-danger text-center text-dark fonts">Sorry! Complete Filling Data Is Required!!!</div>
            <form action="" method="POST" enctype="multipart/form-data"> 
                <div class="row justify-content-center align-items-center"> 
                    
                    <!-- size -->
                    <div class="form-group col-8 my-2">  
                            <label class="form-label font-weight-bold fonts">Size : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                                <?php foreach($sizes as $size):?>
                                    <div class="col-4">
                                        <div class="form-check">    
                                            <input type="radio" name="size" value="<?= $size[0]?>" id="<?= $size[0]?>" class="form-check-input" required/>
                                            <label class="form-label">Id:<?= $size[0]?><?= ucfirst($size[1])?></label>   
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>   
                    </div>


                    <!-- price -->
                    <div class="form-group col-8 my-2">      
                            <label for="price" class="form-label font-weight-bold fonts">Price($) : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                            <div class="col-10">   
                                <select name="price" id="price" class="form-select selects" required>
                                    <option selected disabled>Choose Price Range</option>
                                        <?php foreach($prices as $price):?>
                                            <option value="<?= $price[0]?>"><?= $price[0]?> <?= $price[1]?></option>
                                        <?php endforeach;?>    
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <!-- colors -->
                    <div class="form-group col-8 my-2">
                    
                        <label for="color" class="form-label font-weight-bold fonts">Colors : <span class="text-danger font-weight-bold">*  </span></label>
                        <div class="row my-2">
                            <div class="col-10">   
                                <select name="color" id="color" class="form-select selects" required>
                                    <option selected disabled>Choose Color</option>
                                        <?php foreach($colors as $color):?>
                                            <option value="<?= $color[0]?>"><?= $color[0]?> <?= ucfirst($color[1])?></option>
                                        <?php endforeach;?>    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                        
                    <!-- coat lenght -->
                    <div class="form-group col-8 my-2">      
                            <label for="coat" class="form-label font-weight-bold fonts">Coat Length : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                                <div class="col-10">   
                                    <select name="coat" id="coat" class="form-select selects" required>
                                        <option selected disabled>Choose Coat Length</option>
                                        <?php foreach($coats as $coat):?>
                                            <option value="<?= $coat[0]?>"><?= $coat[0]?> <?= ucfirst($coat[1])?></option>
                                        <?php endforeach;?>    
                                    </select>
                                </div>
                            </div>    
                    </div>

                    <!-- good with children -->
                    <div class="form-group col-8 my-2"> 
                            <label class="form-label font-weight-bold fonts">Good with Children : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                                <?php foreach($childs as $child):?>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input type="radio" name="child" id="<?= $child[0]?>" value="<?= $child[0]?>" class="form-check-input" required/>
                                            <label class="form-label"><?= $child[0]?> <?= ucfirst($child[1])?></label>  
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        
                    </div>

                    <!-- good with dog -->
                    <div class="form-group col-8 my-2"> 
                            <label class="form-label font-weight-bold fonts">Good with Dog : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                            <?php foreach($dogs as $dog):?>
                                <div class="col-4">
                                    <div class="form-check">         
                                        <input type="radio" name="dog" id="<?= $dog[0]?>" value="<?= $dog[0]?>" class="form-check-input" required/>
                                        <label class="form-label"><?= $dog[0]?> <?= ucfirst($dog[1])?></label>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            </div>
                        
                    </div> 

                    <div class="col-8 d-flex justify-content-center mt-3 mb-5 mb-3">
                        <input type="reset" class="btn btn-info mr-3">
                        <input type="submit" class="btn btn-success" name="search">
                    </div>
                    
                </div>          
            </form>
    </section>
    <!-- end recommendation section -->  
        
<?php
    }
else:
?>

    <!-- start recommendation section -->
    <section class="contacts">
        <div class="container-fluid">

            <div class="text-center">
                <h1 class="text-muted py-3">Recommendation2 for Cat Breeds</h1>
                <p class="lead text-danger font-weight-bold">**All attributes must be filled.**</p>
            </div>
            
            <form action="" method="POST" enctype="multipart/form-data"> 
                <div class="row justify-content-center align-items-center"> 
                    
                    <!-- size -->
                    <div class="form-group col-8 my-2">  
                            <label class="form-label font-weight-bold fonts">Size : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                                <?php foreach($sizes as $size):?>
                                    <div class="col-4">
                                        <div class="form-check">    
                                            <input type="radio" name="size" value="<?= $size[0]?>" id="<?= $size[0]?>" class="form-check-input" required/>
                                            <label class="form-label">Id:<?= $size[0]?><?= ucfirst($size[1])?></label>   
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>   
                    </div>


                    <!-- price -->
                    <div class="form-group col-8 my-2">      
                            <label for="price" class="form-label font-weight-bold fonts">Price($) : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                            <div class="col-10">   
                                <select name="price" id="price" class="form-select selects" required>
                                    <option selected disabled>Choose Price Range</option>
                                        <?php foreach($prices as $price):?>
                                            <option value="<?= $price[0]?>"><?= $price[0]?> <?= $price[1]?></option>
                                        <?php endforeach;?>    
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <!-- colors -->
                    <div class="form-group col-8 my-2">
                    
                        <label for="color" class="form-label font-weight-bold fonts">Colors : <span class="text-danger font-weight-bold">*  </span></label>
                        <div class="row my-2">
                            <div class="col-10">   
                                <select name="color" id="color" class="form-select selects" required>
                                    <option selected disabled>Choose Color</option>
                                        <?php foreach($colors as $color):?>
                                            <option value="<?= $color[0]?>"><?= $color[0]?> <?= ucfirst($color[1])?></option>
                                        <?php endforeach;?>    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                        
                    <!-- coat lenght -->
                    <div class="form-group col-8 my-2">      
                            <label for="coat" class="form-label font-weight-bold fonts">Coat Length : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                                <div class="col-10">   
                                    <select name="coat" id="coat" class="form-select selects" required>
                                        <option selected disabled>Choose Coat Length</option>
                                        <?php foreach($coats as $coat):?>
                                            <option value="<?= $coat[0]?>"><?= $coat[0]?> <?= ucfirst($coat[1])?></option>
                                        <?php endforeach;?>    
                                    </select>
                                </div>
                            </div>    
                    </div>

                    <!-- good with children -->
                    <div class="form-group col-8 my-2"> 
                            <label class="form-label font-weight-bold fonts">Good with Children : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                                <?php foreach($childs as $child):?>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input type="radio" name="child" id="<?= $child[0]?>" value="<?= $child[0]?>" class="form-check-input" required/>
                                            <label class="form-label"><?= $child[0]?> <?= ucfirst($child[1])?></label>  
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        
                    </div>

                    <!-- good with dog -->
                    <div class="form-group col-8 my-2"> 
                            <label class="form-label font-weight-bold fonts">Good with Dog : <span class="text-danger font-weight-bold">*</span></label>
                            <div class="row my-2">
                            <?php foreach($dogs as $dog):?>
                                <div class="col-4">
                                    <div class="form-check">         
                                        <input type="radio" name="dog" id="<?= $dog[0]?>" value="<?= $dog[0]?>" class="form-check-input" required/>
                                        <label class="form-label"><?= $dog[0]?> <?= ucfirst($dog[1])?></label>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            </div>
                        
                    </div> 

                    <div class="col-8 d-flex justify-content-center mt-3 mb-5 mb-3">
                        <input type="reset" class="btn btn-info mr-3">
                        <input type="submit" class="btn btn-success" name="search">
                    </div>
                    
                </div>          
            </form>
    </section>
    <!-- end recommendation section -->

<?php endif; ?>

 <?php require "partials/footer.html"?>
