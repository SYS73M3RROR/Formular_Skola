<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formular";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset ($_GET["Odeslat"])){

$jmeno = $_GET["jmeno"];
$prijmeni = $_GET["prijmeni"];
$radio = $_GET["radio"];
$checkbox = $_GET["checkbox"];
$dodatek = $_GET["dodatek"];

$sql = "INSERT INTO odpovedi (jmeno, prijmeni, radio, checkbox, dodatek)
VALUES ('$jmeno', '$prijmeni', '$radio', '$checkbox', '$dodatek')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>

<!DOCTYPE HTML>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <body align="center">
  
  <h2>Formulář :))))</h2>
  
  <form action="index.php">

  <label for="jmeno">Jak se jmenujete</label><br>
  <input type="text" id="jmeno" name="jmeno"><br>
  
  <label for="prijmeni">Prijmeni</label><br>
  <input type="text" id="prijmeni" name="prijmeni"><br>
  
  <label for="dodatek">Chcete něco dodat?</label><br>
  <input type="textarea" id="dodatek" name="dodatek"><br>
  
  <label for="radio">Chce se vám tohle dělat?</label><br> 
  <input type="radio" id="radio" name="radio" value="Ne">
  <label>NE</label>
  
  <input type="checkbox" id="checkbox" name="checkbox" value="Ne, ale víc">
  <label>NE, ale víc</label>  <br>  
  
  <input type="submit" name="Odeslat" value="Odeslat"><br>


  </body>
</html>

<?php
$sql = "SELECT idUser, jmeno, prijmeni, radio, checkbox, dodatek FROM odpovedi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Jmeno</th><th>Prijmeni</th><th>Radio</th>
  <th>Checkbox</th><th>Dodatek</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row["idUser"]."</td>
        <td>".$row["jmeno"]."</td>
        <td>".$row["prijmeni"]."</td>
        <td>".$row["radio"]."</td>
        <td>".$row["checkbox"]."</td>
        <td>".$row["dodatek"]."</td>
        </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();


?>