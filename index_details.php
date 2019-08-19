<?php

include('connection.php');

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn->connect_error){
die("connection failed".$conn);
}
else{
	echo "connection okk";
}
  $title  ='';
 if(isset($_POST['submit'])){
 	$title = $_POST['title'];
 	$content = $_POST['content'];
 	$lat = $_POST['lat'];
 	


$upload = "INSERT INTO location(title,content,lat) VALUES( '$title','$content','$lat')";
	mysqli_query($conn,$upload);

	header('location:index.php?title='.$title);



}