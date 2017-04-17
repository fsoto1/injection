<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buscador de paises</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header"> 
	<h1><a href="index.html">Buscador de paises</a></h1>
</div>
<div class="menu"> 
	<ul>
		<li class="active"> <a href="index.html">Buscar paises</a></li>
		<li> <a href="#">Buscar ciudades</a></li>
		<li> <a href="#">Buscar idioma nativo de paises</a></li>
	</ul>
</div>
<div class="content">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "world";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<p> SELECT Code, Name, Continent FROM country WHERE Name LIKE '%".$_GET["pais"]."%' </p>" ;
    $sql = "SELECT Code, Name, Continent FROM country WHERE Name LIKE '%".$_GET["pais"]."%' ";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        echo "<table> <tr> <th>ID</th> <th>Nombre</th> <th>Contiente</th> </tr> ";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr> <td>".$row["Code"]."</td> <td>".$row["Name"]."</td> <td>".$row["Continent"]."</td> </tr>";
        }
        echo "</table>";
        } else {
            echo "0 results";
    }
?> 
</div>
	
</body>
</html>