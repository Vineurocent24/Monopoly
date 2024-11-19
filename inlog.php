<?php
session_start();
$_SESSION["inloggen"] = 0;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>inloggen</title>

  </head>
  <body>
<form action="inloggen.php" method="post">
gebruikersnaam; <input type="text" name="gb" /> <br><br>
wachtwoord; <input type="password" name="ww" /> <br><br>
<input type="submit" name="verzend" value="inloggen" /> 
<?php 

if(isset($_POST["verzend"]))
{

	$gb = $_POST["gb"];
	$ww = $_POST["ww"];
	echo"<a href='mijn_pagina.php'>naar mijn geheime website</a>";

	If($gb == "jj" && $ww == "ll" OR $gb == "kk" && $ww == "ll" OR $gb == "ll" && $ww == "ll" OR $gb == "hh" && $ww == "ll" OR $gb == "ff" && $ww == "ll")
	{
		echo"<br><br>hallo user je bent correct ingelogd";
		$_SESSION["inloggen"] = 1;

		
	}
	
	else
	{
		echo"je gebruikersnaam en wachtwoord zijn niet correct";
				
	}



}
?>
</form>
  </body>
</html>