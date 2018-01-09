<?php
	require('includes/package.php');

	//STARTS USER SESSION
	session_start();
	
	$_SESSION['LoggedIn'] = false;
	$_SESSION['Username'] = "";
?>
<nav>
	<div id="ham-icon-container">
		<div id="ham-top" class="ham"></div>
		<div id="ham-mid" class="ham"></div>
		<div id="ham-bot" class="ham"></div>
	</div>
	<div id="nav-dropdown-container">
		<ul id="dropdown-menu">
			<?php 
				if($_SESSION['LoggedIn'] == true)
				{
					echo '<li class="dropdown-list-item"><a class="dropdown-link">Create A List</a></li>';
					echo '<li class="dropdown-list-item"><a class="dropdown-link">Write A Review</a></li>';
				}
				else
				{
					echo '<li class="dropdown-list-item"><a href="signin.php" class="dropdown-link">Sign-In</a></li>';
				}
			?>
		</ul>
	</div>
</nav>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<title>Doree</title>
	<!--  Adding CSS  -->
	<link rel="stylesheet" type="text/css" href="css/shared.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/signupin.css"/>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css"/>
	<!--  Adding Angular  -->
	<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
</head>
<body>