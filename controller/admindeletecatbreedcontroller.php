<?php require "../views/admins/partials/header.html";
include "../config.php";
require "../function.php";

$deleteId=$_POST['catdetails_id'];
// dd($deleteId);
$delquery  = "DELETE FROM " . CATS . " WHERE id=?";

if ($stmt = $con->prepare($delquery)) {
    $stmt->bind_param("s",$deleteId);
    $stmt->execute();
    $stmt->close();
    echo "<script >";    
    echo "self.location='../views/admins/admincatdetails.php'; ";
    echo "window.alert('Successfully deleted Cat Breed ID $deleteId!')";
    echo "</script>";
}
?>


<?php require "../views/admins/partials/footer.html";?>