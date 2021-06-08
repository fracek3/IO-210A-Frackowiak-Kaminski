<?php
error_reporting(0);
	
$connect = new mysqli('localhost', 'root', '', 'sport');
	if(mysqli_connect_errno()==0)
	{
			
		
	}else{
		echo "Brak polaczenia z baza";
	}


	?>
	
	
	
	
	
	
	
	
	
	
	
			
			
<!DOCTYPE html>

<html lang ="pl">
<head>

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
    <h1 class="w3-jumbo"><b>Statystyki</b></h1>
  
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>


	
	
	<style> td { border: 1px solid black; } 
	th, td {
  padding: 15px;
  text-align: left;
  
}
	
	tr:hover {background-color: #f5f5f5;}
	tr:nth-child(even) {background-color: #f2f2f2;}
	th {
  background-color: #04AA6D;
  color: white;
}





	</style>
			<!-- ustawienie czarnego obramowania komórek tabeli w CSS -->

			<table>
			   <thead>
				  <tr>
					 <th>Lp.</th> <th>Dyscyplina</th>
				  </tr>
			   </thead>
			   <tbody>
	
	
	<?php
	
$result= $connect->query("SELECT * from `wyniki` ORDER BY `punkty` DESC");
			//baza danych zwraca cala tabele
			$i = 0;
			while ($row = $result->fetch_assoc()){	
				$i +=1;
				
				$sprawdzamSql = "SELECT * from `dyscypliny` where id=".$row['dyscyplina_id'];
				$resultSpr= $connect->query($sprawdzamSql);
	
				$nazwa = $resultSpr->fetch_assoc();
				
				
			?>
			
			   
			   
				  <tr>
					 <th><?=$i?></th> <td><?=$nazwa['nazwa']?></td>
				  </tr>
				 
				 
			 

			<?php
				

				
				
				
			}
			
 
?>
  </tbody>
			</table>







</div>

 
 
 

<body>


</html>