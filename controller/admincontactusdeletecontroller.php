<?php
include "../config.php";
require "../function.php";

$deleteId=$_POST['contact_id'];

$delquery  = "DELETE FROM " . CATS_CONTACT . " WHERE contactId=?";

if ($stmt = $con->prepare($delquery)) {
    $stmt->bind_param("s",$deleteId);
    $stmt->execute();
    $stmt->close();
    echo "<script >";    
    echo "self.location='../views/admins/admincontactus.php'; ";
    echo "window.alert('Successfully deleted contact message id $deleteId!!')";
    echo "</script>";
}
?>
