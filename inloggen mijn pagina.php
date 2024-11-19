<?php

session_start();


?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Pagina</title>
</head>
<body>
    <h2>Welkom op uw persoonlijke pagina</h2>
    <p>Deze inhoud is alleen zichtbaar voor ingelogde gebruikers.</p>
    <form method="post" action="mijn_pagina.php">
	<input type="submit" name="verzend" value="uitloggen" /> 
    </form>
	
<?php
if (isset($_POST["verzend"]))
{
	session_destroy();
	session_start();
	$_SESSION["inloggen"] = 0;
}

if ($_SESSION['inloggen'] == 1) {
    echo"Je bent ingelogd";
}

if ($_SESSION['inloggen'] == 0)
{
    echo "<p>U moet eerst inloggen. <a href='inloggen.php'>Klik hier om in te loggen</a></p>";
}






?>
	

</body>
</html>