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
<h5 style="color:#515151;">Logged Out</h1>
<?php
session_start();
session_destroy() // Destroying All Sessions

?>

<button type="button" class="mdl-button mdl-js-button mdl-button--raised  mdl-button--colored butn" onclick="location.href='index.html'">Back To Home Page </button>
</div>
</body>
</html>
