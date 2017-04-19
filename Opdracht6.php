<?php
//Gebruik de class Auto
require("Classes/Opdracht6/Auto.php");

//Start de sessie
session_start();

// Staat er al een auto array in de sessie?	
if (isset($_SESSION['Auto'])) 
{
	//Lees die array uit
	$autoarray = $_SESSION['Auto'];
} 
//Anders
else 
{
	//Maak een nieuwe lege array	
	$autoarray = array();
	
	$indexkey = 0;
}

//Als er op de knop geklikt wordt
if (isset($_POST['Submit'])) 
{
	//Maak een auto aan
	$auto = new Auto();
	
	//Vul de gegevens van de auto
	$auto->merk = $_POST['merk'];
	$auto->type = $_POST['type'];
	$auto->kleur = $_POST['kleur'];
	$auto->kenteken = $_POST['kenteken'];
	$auto->tankInhoud = $_POST['tankinhoud'];
	$auto->verbruik = $_POST['verbruik'];
	$auto->benzine = $_POST['benzine'];
	$auto->kilometers = $_POST['kilometers'];
	$auto->heeftTrekhaak = $_POST['trekhaak'];
		
	//Vul de array met de gegevens van de auto
	$autoarray[] = $auto;
	
	// Sla de array op in de sessie
	$_SESSION['Auto'] = $autoarray;
}

if (isset($_POST['Tanken'])) 
{
	//Haal de index key op
	$key = $_POST['key'];
		
	//Haal de auto uit de array
	$auto = $autoarray[$key];
	
	//Tank de auto
	$liters = $_POST['BenzineTanken'];
	$auto->tanken($liters);
	
	//Sla de auto op en zet die in de array
	$autoarray[$key] = $auto;
	
	// Sla de array op in de sessie
	$_SESSION['Auto'] = $autoarray;
}

if (isset($_POST['Rijden'])) 
{
	//Haal de index key op
	$key = $_POST['key'];
		
	//Haal de auto uit de array
	$auto = $autoarray[$key];
	
	//Tank de auto
	$kilometers = $_POST['KilometersRijden'];
	$auto->rijden($kilometers);
	
	//Sla de auto op en zet die in de array
	$autoarray[$key] = $auto;
	
	// Sla de array op in de sessie
	$_SESSION['Auto'] = $autoarray;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Opdracht 6</title>
</head>

<body>
<table width="60%" border="1">
  <caption>
    Alle auto's met gegevens
  </caption>
  <thead>
    <tr>
      <th scope="col">Merk</th>
      <th scope="col">Type</th>
      <th scope="col">Kleur</th>
      <th scope="col">Kenteken</th>
      <th scope="col">Tankinhoud</th>
      <th scope="col">Verbruik</th>
      <th scope="col">Benzine</th>
      <th scope="col">Tanken (Liters)</th>
      <th scope="col">Kilometers</th>
      <th scope="col">Rijden</th>
      <th scope="col">Heeft trekhaak?</th>
    </tr>
  </thead>
  <tbody>
<?php
//Als er iets in de array zit
if (count($autoarray) > 0) 
{
	//Voor elke auto in de array
	foreach ($autoarray as $key => $auto) 
	{
		
		//Maak een tr aan
		echo "<tr>";
		
		//Vul de tabel in
		echo "<td align='center'>" . $auto->merk . "</td>";
		echo "<td align='center'>" . $auto->type . "</td>";
		echo "<td align='center'>" . $auto->kleur . "</td>";
		echo "<td align='center'>" . $auto->kenteken . "</td>";
		echo "<td align='center'>" . $auto->tankInhoud . "</td>";
		echo "<td align='center'>" . $auto->verbruik . "</td>";
		echo "<td align='center'>" . $auto->benzine . "</td>";
		echo "<form action='' method='post'>";
		echo "<input type='hidden' name='key' value='$key'>";
		echo "<td align='center'>" . "<input type='text' name='BenzineTanken'>" . "<input type='submit' name='Tanken' value='Tanken'>" . "</td>";
		echo "</form>";
		echo "<td align='center'>" . $auto->kilometers . "</td>";
		echo "<form action='' method='post'>";
		echo "<input type='hidden' name='key' value='$key'>";
		echo "<td align='center'>" . "<input type='text' name='KilometersRijden'>" . "<input type='submit' name='Rijden' value='Rijden'>";
		echo "</form>";
		echo "<td align='center'>" . $auto->heeftTrekhaak . "</td>";
		
		//Sluit de tr
		echo "</tr>";
	}
}
?>
  </tbody>
</table>
<br><br>
<h2>Auto maken:</h2>
<form action="" method="post">
	<label>Merk:</label>
	<input type="text" name="merk"><br><br>
    <label>Type:</label>
	<input type="text" name="type"><br><br>
    <label>Kleur:</label>
	<input type="text" name="kleur"><br><br>
    <label>Kenteken:</label>
	<input type="text" name="kenteken"><br><br>
    <label>Tankinhoud:</label>
	<input type="text" name="tankinhoud"><br><br>
    <label>Verbruik:</label>
	<input type="text" name="verbruik"><br><br>
    <label>Benzine:</label>
	<input type="text" name="benzine"><br><br>
    <label>Kilometers:</label>
	<input type="text" name="kilometers"><br><br>
    <label>Heeft trekhaak?:</label>
	<input type="text" name="trekhaak">
    <br><br>
	<input type="submit" name="Submit" value="Maken">
</form>
</body>
</html>