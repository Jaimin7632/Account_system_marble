<?php
include "connection.php";

$sql = "SELECT * FROM `stock` where 1";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql .= " AND id=$id";

}


$sql.= " ORDER BY date ASC";

// echo $sql;
$sql=$conn->query($sql);
$result=array();

while($r= mysqli_fetch_assoc($sql))
{
	$result[]=$r;
	
}
$conn->close();
echo json_encode($result);
?>