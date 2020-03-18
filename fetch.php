<meta charset="UTF-8">
<style>
.column {
    }
		.roww{
	width:70%;
	padding:10px;
	margin:10px;
	}

</style>
<?php

$con=mysqli_connect('localhost:3306','kadirpinar','password','kadirpinar_data');

if(!$con){
	echo 'Not connected to server';
}
if(!mysqli_select_db($con,'kadirpinar_data')){
	echo 'Database not selected';
}

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM datas 
  WHERE ktp LIKE '%".$search."%'
  OR yazar LIKE '%".$search."%' 
  OR yev LIKE '%".$search."%' 
  OR tur LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM datas where tur='AA'
 ";
}
$result = mysqli_query($con, $query);

echo "<table>";
$x=0;
?> <div id="resultt"> <?php
if(mysqli_num_rows($result) > 0 ){
while($row=mysqli_fetch_array($result)){
	echo "<td>";
?> <div class="roww"> <?php
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
	?></div><?php
	?>
	
