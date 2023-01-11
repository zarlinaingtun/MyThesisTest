<?php

include("../../config.php");

        // echo "Sumitted";
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
                  
            $photo = $_FILES['catimage'];
            $target_path = UPLOAD_DIR1;
            
            $ext = explode('.', $_FILES['catimage']['name']);
            $file_extension = end($ext);
            $img_name =  md5(uniqid()) . "." . $ext[count($ext) - 1];
            $target_path = $target_path . $img_name;
            if (!move_uploaded_file($_FILES['catimage']['tmp_name'], $target_path)) {
                $status = 1;
                $msg= " Upload failed";
                // echo $msg;
            } 
           
                   
             //INSERT INTO DATABASE
            
                $response = array();
                $insertQuery  = "INSERT INTO " . CATS . "(catName,sizeId,priceId,coatId,childfriendlyId,dogfriendlyId,colorId,price,popularityRank,origin,lapcat,weight,lifeSpan,temperament,healthIssues,grooming,catImage) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                if ($stmt = $con->prepare($insertQuery)) {
                    $stmt->bind_param("sssssssssssssssss",$catname,$sizeid,$priceid,$coatid,$childid,$dogid,$colorid,$price,$popularityrank,$origin,$lapcat,$weight,$lifespan,$temperament,$healthissues,$grooming,$target_path);
                    $stmt->execute();
                    echo "Registered";
                    $stmt->close();
                    $insertedID = $con->insert_id;
                    $status = 0;
                    $msg =$insertedID;
                    if($msg!=0){
                    
            
                        
                                            
                        // Added Go to cat breed detail page
                        echo "<script>";    
                        echo "self.location='admincatdetails.php'; ";
                        echo "window.alert('Successfully added New Cat Breed!')";
                        echo "</script>";
                                
                    }      
                }
            
        }
        else{
            echo "not image";
        }     
    
?>
               
