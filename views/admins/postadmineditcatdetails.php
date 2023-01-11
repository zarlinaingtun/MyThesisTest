<?php 
require "../../function.php";
include "../../config.php"; 
$editId=$_POST['edit_id'];
$detailCat="SELECT * FROM " . CATS . " WHERE id=" . $editId;  
$detailCatdata=getSingleDataByCondition($detailCat);

?>

<?php  
if (isset($_POST['submit'])) :
     
        $catname = $_POST["catname"];
        $sizeid=$_POST['sizeid'];
        $priceid=$_POST['priceid'];
        $coatid=$_POST['coatid'];
        $childid=$_POST['childid'];
        $dogid=$_POST['dogid'];
        $colorid=$_POST['colorid'];
        $price=$_POST['price'];
        $popularityrank=$_POST['popularityrank'];
        $origin=$_POST['origin'];
        $lapcat=$_POST['lapcat'];
        $weight=$_POST['weight'];
        $lifespan=$_POST['lifespan'];
        $temperament=$_POST['temperament'];
        $healthissues=$_POST['healthissues'];
        $grooming=$_POST['grooming'];
        
    if (isset($_FILES['catimage'])) {  
              
        if($_FILES['catimage']['name']==''){
            $target_path=$detailCatdata['catImage'];
        }
        else{
           
                    $photo = $_FILES['catimage'];
                    $target_path = UPLOAD_DIR;
                    
                    $ext = explode('.', $_FILES['catimage']['name']);
                    $file_extension = end($ext);
                    $img_name =  md5(uniqid()) . "." . $ext[count($ext) - 1];
                    $target_path = $target_path . $img_name;
                    if (!move_uploaded_file($_FILES['catimage']['tmp_name'], $target_path)) {
                        $status = 1;
                        $msg= " Upload failed";
                        // echo $msg;
                    } 
                }
               
       
                $insertQuery  = "UPDATE " . CATS . " SET catName=?,sizeId=?,priceId=?,coatId=?,childfriendlyId=?,dogfriendlyId=?,colorId=?,price=?,popularityRank=?,origin=?,lapcat=?,weight=?,lifeSpan=?,temperament=?,healthIssues=?,grooming=?,catImage=? ". 
                "WHERE id=".$editId;
                    
                    // if (!empty($catname) and !empty($sizeid) and !empty($priceid) and !empty($coatid) and !empty($childid) and !empty($dogid) and !empty($colorid) and !empty($price) and !empty($popularityrank) and !empty($origin) and !empty($lapcat) and !empty($weight) and !empty($lifespan) and !empty($temperament) and !empty($healthissues) and !empty($grooming) and !empty($target_path)):
                        // echo "not null";
                $stmt = $con->prepare($insertQuery);
                $stmt->bind_param("sssssssssssssssss",$catname,$sizeid,$priceid,$coatid,$childid,$dogid,$colorid,$price,$popularityrank,$origin,$lapcat,$weight,$lifespan,$temperament,$healthissues,$grooming,$target_path);
                $stmt->execute();
                $stmt->close();
                                     
                // Updated Go to cat breed detail page
                echo "<script>";    
                echo "self.location='admincatdetails.php'; ";
                $id=$detailCatdata['id'];
                echo "window.alert('Successfully updated cat ID $id!!')";
                echo "</script>";
                        
    }  
    else{
        echo "not image";
    }     
endif; 
?>