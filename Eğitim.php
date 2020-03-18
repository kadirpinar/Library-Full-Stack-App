<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Kütüphane</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
body{background-color:orange;}
 .search-container {
  float: right;
}

.navbar input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}
.navbar .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.column {
    }
		.row{
	width:70%;
	padding:10px;
	margin:10px;
	}

</style>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Kütüphane</a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Anasayfa</a></li>
      <li><a href="Romanlar.php">Roman</a></li>
      <li><a href="Masal.php">Masal</a></li>
      <li><a href="Gezi.php">Gezi</a></li>
      <li><a href="Eğitim.php">Eğitim</a></li>

    </ul>
	<div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search" id="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
	</div>
  </div>
</nav>
  

<?php

$con=mysqli_connect('localhost:3306','kadirpinar','password','kadirpinar_data');
if(!mysqli_select_db($con,'kadirpinar_data')){
	echo 'Database not selected';
}
$result = mysqli_query($con, "SELECT * FROM datas Where tur='Eğitim'");
echo "<table>";
$x=0;
?> <div id="resultt"> <?php
if(mysqli_num_rows($result) > 0 ){
while($row=mysqli_fetch_array($result)){
	echo "<td>";
?> <div class="row"> <?php
	?><div class="column"> <img src="<?php echo $row["image"]; ?>" class="img-responsive" height="300" width="200"><?php 
	?></div><?php
	?> <div class="column"> <strong><p style="font-size:1.5vw;"> <?php echo  "Kitap adı:"; echo $row["ktp"]; 
	?> </div><?php  
	?> <div class="column"> <strong><p style="font-size:1.5vw;"> <?php echo "Yazar:"; echo $row["yazar"];  

	?></div><?php
	?> <div class="column"> <strong><p style="font-size:1.5vw;"><?php echo "Yayın evi:"; echo $row["yev"];  
   
	?> </div><?php
	?> <div class="column"> <strong><p style="font-size:1.5vw;"><?php echo "Tür:"; echo $row["tur"];  
   
	?> </div><?php
	?></div><?php
	$x++;
	if($x==4){
		echo "</tr>";
	$x=0;
	}
	echo "</td>";
	
	}
}
echo "</table>";
	?></div>
</body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#resultt').html(data);
   }
  });
 }
 $('#search').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

