<?php require "partials/header.html";
include "../../config.php";
require "../../function.php";


?>

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
                    <li class="navbar-item items1"><a href="admincatdetails.php" class="nav-link menuitems actives">Cats Details</a></li>
                    <li class="navbar-item items2"><a href="admincontactus.php" class="nav-link menuitems" >Contact Message</a></li>
                    <li class="navbar-item items3"><a href="addnewadmin.php" class="nav-link menuitems">Add new admin</a></li>
                    <li class="navbar-item items4"><a href="adminlist.php" class="nav-link menuitems">Admin List</a></li>
                    <li class="navbar-item items4"><a href="adminlogout.php" class="nav-link menuitems">Log Out</a></li>
                    
                </ul>
            </div>
            
       
    </nav>
  <!-- end admin navbar section -->

    <!-- start edit form -->
    <div class="row justify-content-center mt-3">
            <div class="col-8">
                <h1 class="text-muted mt-2 mb-3">Add New Cat Breed</h1>
                <form action="postadminaddnewcatbreed.php" method="POST" enctype="multipart/form-data">
                            
                <div class="row">
                <div class="col-6 form-group">
                    <label for="catname">Cat name</label>
                    <input type="text" name="catname" id="catname" class="form-control" autocompleted="off" required/>
                </div>
                
                
                <div class="col-6 form-group">
                    <label for="sizeid">Size ID</label>
                    <input type="number" name="sizeid" id="sizeid" class="form-control" autocomplete="false" required/>
                </div>

                <div class="col-6 form-group">
                    <label for="priceid">Price ID</label>
                    <input type="number" name="priceid" id="priceid" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="coatid">Coat ID</label>
                    <input type="number" name="coatid" id="coatid" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="childid">Childfriendly ID</label>
                    <input type="number" name="childid" id="childid" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="dogid">Dogfriendly ID</label>
                    <input type="number" name="dogid" id="dogid" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="colorid">Color ID</label>
                    <input type="number" name="colorid" id="colorid" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" name="price" id="price" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="popularityrank">Popularity Rank</label>
                    <input type="number" name="popularityrank" id="popularityrank" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="origin">Origin</label>
                    <input type="text" name="origin" id="origin" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="lapcat">Lap Cat?</label>
                    <input type="text" name="lapcat" id="lapcat" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="weight">Weight</label>
                    <input type="text" name="weight" id="weight" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="lifespan">Life Span</label>
                    <input type="text" name="lifespan" id="lifespan" class="form-control" autocomplete="false"  required/>
                </div>

                <div class="col-6 form-group">
                    <label for="temperament" class="control-label">Temperament</label> 
                    <textarea name="temperament" id="temperament"  rows="3" class="form-control" required></textarea>      
                </div>

                <div class="col-6 form-group">
                    <label for="healthissues" class="control-label">Health Issues</label> 
                    <textarea name="healthissues" id="healthissues"  rows="6" class="form-control" required></textarea>      
                </div>

                <div class="col-6 form-group">
                    <label for="grooming" class="control-label">Grooming</label> 
                    <textarea name="grooming" id="grooming"  rows="6" class="form-control" required></textarea>      
                </div>

                <div class="col-12 my-3">
                    <!-- <img src="" alt="cat" id="cat" class="mr-4 my-2" style="width:150px;height:150px;border:2px solid rgb(252, 152, 169);"/> -->
                    <label for="catimage" class="control-label font-weight-bold lead mr-4">Select Cat Photo</label>
                    <input type="file" name="catimage" id="catimage" required/>
                </div>
    
                <div class="col-12 d-flex justify-content-end mb-3">
                    <button type="reset" class="btn btn-info mr-4">Reset</button>
                    <button type="submit" class="btn btn-success" name="addcat">Add new Catbreed</button>
                </div>


                </div>
                </form>
            </div>
        </div>
    <!-- end edit form -->

  
<?php require "partials/footer.html";?>