<?php 
require "../function.php";
include "../config.php"; 
$editId=$_POST['edit_id'];

?>

<?php  
        $adminname = $_POST["adminname"];
        $password=$_POST['password'];
        
          
        $insertQuery  = "UPDATE " . ADMIN . " SET adminName=?,password=? ". 
                "WHERE adminId=".$editId;
                    
                   
        $stmt = $con->prepare($insertQuery);
        $stmt->bind_param("ss",$adminname,$password);
        $stmt->execute();
        $stmt->close();

      
                                     
            // Updated Go to admin list
            echo "<script>";    
            echo "self.location='../views/admins/adminlist.php'; ";
            echo "window.alert('Successfully updated admin ID $editId \'s Info!!')";
            echo "</script>";
?>