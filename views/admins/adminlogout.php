<?php   
		
        session_start();
        session_destroy();
       	echo "<script >";
		echo "self.location='../users/index.php'; ";
        echo "window.alert('Logout Admin Account!!')";
		echo "</script>";
?>