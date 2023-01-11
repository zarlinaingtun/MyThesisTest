<?php require "../views/admins/partials/header.html";
include "../config.php";
require "../function.php";

$deleteId=$_POST['admin_id'];
// dd($deleteId);
$delquery  = "DELETE FROM " . ADMIN . " WHERE adminId=?";

if ($stmt = $con->prepare($delquery)) {
    $stmt->bind_param("s",$deleteId);
    $stmt->execute();
    $stmt->close();
    echo "<script >";    
    echo "self.location='../views/admins/adminlist.php'; ";
    echo "window.alert('Deleted Admin ID $deleteId!')";
    echo "</script>";
}
?>


<?php require "../views/admins/partials/footer.html";?>