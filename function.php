<?php
function isExistA($query)
{
	// $col = implode("=? AND ",array_keys($col_val)) . "=?";
	// $query = "SELECT aid FROM " . $table . " WHERE " . $col;
	// echo $query;
	global $con;
	if ($stmt = $con->prepare($query)) {
		$stmt->execute();
		$stmt->store_result();
		$stmt->fetch();
		if ($stmt->num_rows > 0) {
			$stmt->close();
			return true;
		}
		$stmt->close();
	}
	return false;
}

function getAllData($query)
{
	// $col = implode("=? AND ",array_keys($col_val)) . "=?";
	// $query = "SELECT aid FROM " . $table . " WHERE " . $col;
	// echo $query;
	global $con;
	if ($stmt = $con->prepare($query)) {
		// $stmt->bind_param("s",1);
		$stmt->execute();
		$result=$stmt->get_result();
		if($result->num_rows>0){
			$rows=array();
			// while($row=$result->fetch_assoc()){
			// 	// die(var_dump(array_push($rows,$row)));
			// 	$id=$row['id'];
			// 	$position=$row['position'];
			// 	return $row;
			// }
			$results=$row=$result->fetch_all();
			return $results;
		}
		
		$stmt->close();
	}
}
function getSingleDataByCondition($query){
	global $con;
	if ($stmt = $con->prepare($query)) {   
		$stmt->execute();
		$result=$stmt->get_result();
		if($result->num_rows>0){
			$rows=array();
			while($row=$result->fetch_assoc()){
			  return $row;
			}
			
		}       
		$stmt->close();
	}
}

// function delete($id){
// 	$_SESSION['cvid']=$id;
// }
function dd($data){
	die(var_dump($data));
}

// Euclidean Distance Funtion
function calculateDistance($array1,$array2){
	$sumofallsquares=0.0;
	for($i=0;$i<count($array1);$i++){
		$difference=$array1[$i]-$array2[$i+1];
		$sumofallsquares+=pow($difference,2);
		$dist=sqrt($sumofallsquares);
	}
	return $dist;
   
   }

?>