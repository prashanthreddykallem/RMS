<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="stylehp.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		
	</head>
<body>
<div class="main">
<h5 style="color:#515151;">Complaint Details<h5>  
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$idno=$_POST["idno"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT *  FROM sample where  UniqueID=$idno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp'><thead><tr><th>Serial Number</th><th>Reference No </th><th class='mdl-data-table__cell--non-numeric'>Name</th>	  <th class='mdl-data-table__cell--non-numeric'>Email</th>	  <th>Phone</th>	  <th class='mdl-data-table__cell--non-numeric'>Category</th>	  <th class='mdl-data-table__cell--non-numeric'>Comments</th>	  <th class='mdl-data-table__cell--non-numeric'>Comments from employee</th>	  <th class='mdl-data-table__cell--non-numeric'>Status</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["Ref"]."</td><td>".$row["UniqueID"]."</td><td class='mdl-data-table__cell--non-numeric'>".$row["Name"]."</td><td class='mdl-data-table__cell--non-numeric'>".$row["Email"]."</td><td>".$row["Phone"]."</td><td class='mdl-data-table__cell--non-numeric'>".$row["Category"]."</td><td class='mdl-data-table__cell--non-numeric'>".$row["Comments"]."</td><td class='mdl-data-table__cell--non-numeric'>".$row["AComments"]."</td><td class='mdl-data-table__cell--non-numeric'>".$row["Status"]."</td></tr>";
    }
	echo "</tbody></table>";
} else {
    echo "0 results";
}
?>