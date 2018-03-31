<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="stylehp.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
	</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Untitled</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="logout.php">Logout</a>    
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Untitled</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="logout.php">Logout</a>      
    </nav>
  </div>
<div class="main">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$emid=$_POST['email-id'];
$pass=$_POST['pass'];

$sql = "SELECT *  FROM logindata where emid='$emid' AND pass='$pass'  ";
$result = $conn->query($sql);
session_start(); // Starting Session

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		
		$_SESSION['login_user']=$row["category"]; // Initializing Session

		}
    }
 else {
	echo "<h5 style='color:#515151;'>Invalid Username or Password</h5>";	
	
	header("Location: loginform.html");
	exit(1);
	}
$user=$_SESSION['login_user'];	
$sqls = "SELECT *  FROM sample where  category='$user'";
$results = $conn->query($sqls);




if ($results->num_rows > 0) {
    echo "<table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'><thead><tr><th>Serial Number</th><th>Reference No </th><th class='mdl-data-table__cell--non-numeric'>Name</th>	  <th class='mdl-data-table__cell--non-numeric'>Email</th>	  <th>Phone</th>	  <th class='mdl-data-table__cell--non-numeric'>Category</th>	  <th class='mdl-data-table__cell--non-numeric'>Comments</th>	  <th class='mdl-data-table__cell--non-numeric'>Comments from employee</th>	  <th class='mdl-data-table__cell--non-numeric'>Status</th></tr></thead><tbody>";
    while($rows = $results->fetch_assoc()) {
	echo "<tr><td>".$rows["Ref"]."</td><td>".$rows["UniqueID"]."</td><td class='mdl-data-table__cell--non-numeric'>".$rows["Name"]."</td><td class='mdl-data-table__cell--non-numeric'>".$rows["Email"]."</td><td>".$rows["Phone"]."</td><td class='mdl-data-table__cell--non-numeric'>".$rows["Category"]."</td><td class='mdl-data-table__cell--non-numeric'>".$rows["Comments"]."</td><td class='mdl-data-table__cell--non-numeric'>".$rows["AComments"]."</td><td class='mdl-data-table__cell--non-numeric'>".$rows["Status"]."</td></tr>";
    }
	echo "</tbody></table>";
} else {
    echo "0 results";
}

?>
</div>
</body>
</html>