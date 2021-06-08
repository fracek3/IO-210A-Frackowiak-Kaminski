<?php
error_reporting(0);
	
$connect = new mysqli('localhost', 'root', '', 'sport');
	if(mysqli_connect_errno()==0)
	{
			
		
	}else{
		echo "Brak polaczenia z baza";
	}


function punkty($wynik, $id,$connect,$plec){
	
	$punkty= 0;
	
	$sprawdzamSql = "SELECT * from `normy` where plec='".$plec."' AND id_dyscypliny=".$id;
	$resultSpr= $connect->query($sprawdzamSql);
	$sprawdzam = $resultSpr->fetch_assoc();
	
	if($sprawdzam['mm']>$sprawdzam['v']){//np oszczep
		
		if($wynik>=$sprawdzam['mm'])
			$punkty=100;
		else if($wynik>=$sprawdzam['m']&&$wynik<$sprawdzam['mm'])
			$punkty=90;
		else if($wynik>=$sprawdzam['i']&&$wynik<$sprawdzam['m'])
			$punkty=80;
		else if($wynik>=$sprawdzam['ii']&&$wynik<$sprawdzam['i'])
			$punkty=70;
		else if($wynik>=$sprawdzam['iii']&&$wynik<$sprawdzam['ii'])
			$punkty=60;
		else if($wynik>=$sprawdzam['iv']&&$wynik<$sprawdzam['iii'])
			$punkty=50;
		else if($wynik>=$sprawdzam['v']&&$wynik<$sprawdzam['iv'])
			$punkty=40;
		else if($wynik<$sprawdzam['v'])
			$punkty=30;
		
	}else{	//np 100m
	
		if($wynik<=$sprawdzam['mm'])
			$punkty=100;
		else if($wynik<=$sprawdzam['m']&&$wynik>$sprawdzam['mm'])
			$punkty=90;
		else if($wynik<=$sprawdzam['i']&&$wynik>$sprawdzam['m'])
			$punkty=80;
		else if($wynik<=$sprawdzam['ii']&&$wynik>$sprawdzam['i'])
			$punkty=70;
		else if($wynik<=$sprawdzam['iii']&&$wynik>$sprawdzam['ii'])
			$punkty=60;
		else if($wynik<=$sprawdzam['iv']&&$wynik>$sprawdzam['iii'])
			$punkty=50;
		else if($wynik<=$sprawdzam['v']&&$wynik>$sprawdzam['iv'])
			$punkty=40;
		else if($wynik>$sprawdzam['v'])
			$punkty=30;
	
	
	
	}
	
	return $punkty;
}
	
	
	
$result= $connect->query("SELECT * from dyscypliny");
			//baza danych zwraca cala tabele
			while ($row = $result->fetch_assoc()){	

				if($_POST[$row["id"]]){
		
		
					$sprawdzamSql = "SELECT * from `wyniki` where dyscyplina_id=".$row["id"];
					$resultSpr= $connect->query($sprawdzamSql);
					$sprawdzam = $resultSpr->fetch_assoc();
		

					if($sprawdzam['id'])
					{
						$punkty = punkty($_POST[$row["nazwa"]],$row["id"],$connect,$_POST['plec']);
						
						$zap = "UPDATE `wyniki` SET `plec`='".$_POST['plec']."', `punkty`=".$punkty.",`wynik`=".$_POST[$row["id"]]." WHERE `dyscyplina_id`=".$row["id"];

						$wynik = $connect->query($zap);
						
					}else{
						$punkty = punkty($_POST[$row["nazwa"]],$row["id"],$connect,$_POST['plec']);
						
						$zap = "INSERT INTO `wyniki` SET `plec`='".$_POST['plec']."', `punkty`=".$punkty.",`wynik`=".$_POST[$row["id"]].", `dyscyplina_id`=".$row["id"];

						$wynik = $connect->query($zap);
					}
						echo $zap;
				}

			}
 
?>

<!DOCTYPE html>

<html lang ="pl">
<head>


<meta charset="ISO-8859-1"> 


</head>
</body>



<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Znajdź sport<br> dla siebie!</b></h3>
  </div>
  <div class="w3-bar-block">
	<a href="index.php"  class="w3-bar-item w3-button w3-hover-white">Start</a>
    <a href="dodaj.php"  class="w3-bar-item w3-button w3-hover-white">Dodaj wyniki</a> 
    <a href="statystyki.php"  class="w3-bar-item w3-button w3-hover-white">Statystyki</a> 
    
	
  </div>
</nav>



<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Dodaj swoje wyniki!</b></h1>
  
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>






<style>
select {
  // A reset of styles, including removing the default dropdown arrow
  appearance: none;
  // Additional resets for further consistency
  background-color: transparent;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  
  font-family: inherit;
  font-size: inherit;
  cursor: inherit;
  line-height: inherit;
}

</style>







<form method="POST" action="">
Wybierz płeć
<div class="style">
<select name = "plec">
    <option value="m">Mężczyzna</option>
    <option value="f">Kobieta</option>
</select>
<br>
<?php
$result= $connect->query("SELECT * from dyscypliny");
			//baza danych zwraca cala tabele
			while ($row = $result->fetch_assoc()){

?>

Dodaj <?=$row["nazwa"]?>
<br>
<input class="w3-input" style="width:10%" type="number" name="<?=$row["id"]?>" step="0.01">
<input class="w3-input" type="number" name="<?=$row["nazwa"]?>id"  value="<?=$row["id"]?>" style="visibility:hidden;">
<br>



<?php 
			}
?>

<input type="submit" value="Dodaj">
</div>
</form>






</div>



 
 
 
 

<body>


</html>