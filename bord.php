<?php
error_reporting(E_ERROR);
session_start();

if (isset($_POST["opnieuw"])) {
    session_destroy();
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1 ">
    <title>Bordspel</title>
    <style type="text/css">
    td {width:50px;height:50px;border-style:solid;border-width:3px;border-color:#000000;padding:4px;}
    </style>
   </head>
  <body>
<h1>Mini bordspel</h1>
<p>
In onderstaand 'bordspel' wordt gedemonstreerd, hoe je een figuurtje kunt laten lopen over een bord.<br />
Ook kun je zien hoe je een 'beurtwissel' kunt programmeren.<br />
</p>
<?php
// Hier wordt gecontroleerd of de pionnen van speler 1 en speler 2 al op het bord staan.
// Zo niet, dan worden beide pionnen op vakje 1 geplaatst.
if (!isset($_SESSION["speler1"]))
{
 $_SESSION["speler1"] = 1;
 $_SESSION["speler2"] = 1;
}

// Hier wordt gecontroleerd of er al een speler aan de beurt is.
// Zo niet, dan mag speler 1 beginnen en krijgt de dobbelsteen een startplaatje.
if (!isset($_SESSION["beurt"]))
{
 $_SESSION["beurt"] = 1;
 $_SESSION["dobbelsteen"] = 'dobbel3.gif';
 $_SESSION["winner"] = "";
}

// Hier wordt doorgegeven welke speler er met de dobbelsteen heeft gegooid.
$speler = $_POST["speler"];


// Als er nog geen winnaar is, kan er gegooid worden.
if ($_SESSION["winner"] == "")
{
  if ($speler == 1)
  {
    $worp = rand(1,6);
    $_SESSION["speler1"] = $_SESSION["speler1"] + $worp;
    if ($_SESSION["speler1"] > 17) {
      $_SESSION["speler1"] = 17 - ($_SESSION["speler1"] - 17);
    }
    if ($_SESSION["speler1"] == 17) {
      $_SESSION["winner"] = "PAARS heeft gewonnen!";
    }
    $_SESSION["beurt"] = 2;
  }
  if ($speler == 2)
  {
    $worp = rand(1,6);
    $_SESSION["speler2"] = $_SESSION["speler2"] + $worp;
    if ($_SESSION["speler2"] > 17) {
      $_SESSION["speler2"] = 17 - ($_SESSION["speler2"] - 17);
    }
    if ($_SESSION["speler2"] == 17) {
      $_SESSION["winner"] = "GEEL heeft gewonnen!";
    }
    $_SESSION["beurt"] = 1;
  }

  // Afhankelijk van de waarde van de worp krijgt de dobbelsteen een ander plaatje.
  if ($worp == 1){$_SESSION["dobbelsteen"] = 'dobbel1.gif';}
  if ($worp == 2){$_SESSION["dobbelsteen"] = 'dobbel2.gif';}
  if ($worp == 3){$_SESSION["dobbelsteen"] = 'dobbel3.gif';}
  if ($worp == 4){$_SESSION["dobbelsteen"] = 'dobbel4.gif';}
  if ($worp == 5){$_SESSION["dobbelsteen"] = 'dobbel5.gif';}
  if ($worp == 6){$_SESSION["dobbelsteen"] = 'dobbel6.gif';}
}
?>

<table>
<tr>
<td>
<?php 
if($_SESSION["speler1"]==1){echo"<img src='pion1.png' alt='' />&nbsp;";} 
if($_SESSION["speler2"]==1){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==2){echo"<img src='pion1.png' alt='' />&nbsp;";} 
if($_SESSION["speler2"]==2){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?> 
</td>
<td>
<?php 
if($_SESSION["speler1"]==3){echo"<img src='pion1.png' alt='' />&nbsp;";} 
if($_SESSION["speler2"]==3){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?> 
</td>
<td>
<?php 
if($_SESSION["speler1"]==4){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==4){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?> 
</td>
<td>
<?php 
if($_SESSION["speler1"]==5){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==5){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?> 
</td>
<td>
<?php 
if($_SESSION["speler1"]==6){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==6){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?> 
</td>
<td>
<?php 
if($_SESSION["speler1"]==7){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==7){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?> 
</td>
<td>
<?php 
if($_SESSION["speler1"]==8){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==8){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td rowspan="3">
<img src="<?php echo $_SESSION["dobbelsteen"]; ?>" style="width:68px;" />
<br /><br />
<form action="bordspel.php" method="post">
<input type="hidden" name="speler" value="1" />
<button type="submit" <?php if($_SESSION["beurt"]==2 || $_SESSION["winner"]!=""){echo"disabled='disabled'";} ?>>PAARS</button>
</form>
<br />
<form action="bordspel.php" method="post">
<input type="hidden" name="speler" value="2" />
<button type="submit" <?php if($_SESSION["beurt"]==1 || $_SESSION["winner"]!=""){echo"disabled='disabled'";} ?>>GEEL</button>
</form>
<br/>
<form action="bordspel.php" method="post">
<input type="submit" name="opnieuw" value="opnieuw">
</form>
<?php
if ($_SESSION["winner"] != "") {
    echo "<p>" . $_SESSION["winner"] . "</p>";
}
?>
</td>
</tr>
<tr>
<td colspan="7" style="background-color:#000000"></td>
<td>
<?php 
if($_SESSION["speler1"]==9){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==9){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
</tr>
<tr>
<td>
<?php 
if($_SESSION["speler1"]==17){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==17){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==16){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==16){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==15){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==15){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==14){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==14){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==13){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==13){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==12){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==12){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==11){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==11){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
<td>
<?php 
if($_SESSION["speler1"]==10){echo"<img src='pion1.png' alt='' />&nbsp;";}
if($_SESSION["speler2"]==10){echo"&nbsp;<img src='pion2.png' alt='' />";} 
?>
</td>
</tr>
</table>
  </body>
</html>