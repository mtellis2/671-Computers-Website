<?php

function checkDefault($itemNo, $memory, $diskSize, $storage){

include 'addWishlist.php';

	//hard coded values for testing
	/*
$chWanted="L700";
$storTypeWanted="SSD";
$storWanted=1600;
$memoryWanted=4;
	 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

//check if system already exists
$sql1 = "Select chNumber
	From DefaultSystem
	Where defaultNo='".$itemNo."'";

$getchWanted=mysqli_query($conn, $sql1);
if (mysqli_num_rows($getchWanted)>0){
	while($row = $getchWanted->fetch_assoc()) {
		$chWanted = $row["chNumber"];
		//echo $chWanted;
	}
}


$sql2 = "Select *
	From DefaultSystem
	Where chNumber='".$chWanted."'".
	" AND storType='".$storage."'".
	" AND storSize=".$diskSize.
	" AND memSize=".$memory;
//$result = $conn->query($sql);
$result2=mysqli_query($conn, $sql2);


if (mysqli_num_rows($result2)>0){
	//echo "A default system already exists with that configuration!";
	//echo "Added to your wishlist!";
	addWishlist($itemNo, $chWanted, $memory, $storage, $diskSize);
}
else {
	//create item number for new system; make sure it doesn't conflict
	//add new system
	$sqlCount="Select * from DefaultSystem";
	$resultCount=mysqli_query($conn, $sqlCount);
	$itemNumber=(mysqli_num_rows($resultCount))+1;

	$sqlAdd="insert into DefaultSystem values('".$itemNumber."', '".$chWanted."', '".$storage."', ".$diskSize.", ".$memory.")";
	$result2=mysqli_query($conn, $sqlAdd);
     //echo "New system added with item number " . $itemNumber.".";
		 addWishlist($itemNumber, $chWanted, $memory, $storage, $diskSize);
}
$conn->close();
}

?>