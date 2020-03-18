<meta charset="UTF-8">

<?php

$con=mysqli_connect('localhost:3306','kadirpinar','password','kadirpinar_data');

if(!$con){
	echo 'Not connected to server';
}
if(!mysqli_select_db($con,'kadirpinar_data')){
	echo 'Database not selected';
}


      
 

$ktp=$_POST['x'];
$yazar=$_POST['y'];
$yev=$_POST['z'];
$tur=$_POST['t'];
$id=$_POST['id'];
$image = $_FILES["image"]["name"];

$yeniad="/home/kadirpinar/public_html/".basename($_FILES['image']['name']);
move_uploaded_file($_FILES["image"]["tmp_name"],$yeniad);


$sql="UPDATE datas SET ('$ktp','$yazar','$yev','$image','$tur') WHERE id='$id'";
if(!mysqli_query($con,$sql)){
	
	echo 'Not inserted';
}
else {
	echo 'Inserted';
}

?>