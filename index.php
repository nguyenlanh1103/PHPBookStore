<!DOCTYPE html>
<html>
<head>
	<title>Thư Viện Điện Tử</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/ideal-image-slider.css">
    <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<?php
		require('DataBase.php');
		require('MasterPage.php');
		echo myWrapper();
		echo myMenu();
		echo mySlider();
		$query = "SELECT * FROM categorys";
		if (isset($_GET['id']))
			$query.= " where id='".$_GET['id']."'";
		echo content($query);
		echo myFooterTop();
		
	?>
	
</body>
</html>