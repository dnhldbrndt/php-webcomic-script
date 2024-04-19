<html>
<head>
<title>A Webcomic</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
<div id="top">
	<div id="top-center">
		<div id="top-title" >
			A Webcomic
		</div>
		<div>
			<img src="images/logo.png" width="25px" height="25px">
		</div>
	</div>	
	<div id="topnav"> 
			<a href="catalog/"> Catalog </a> |
			<a href="index.php"> Home </a>		  
	</div>
</div>
</div>
<div class="content">
<?php 
	require ('includes/webcomic.php');
	$webcomic = new Webcomic();
	$webcomic->invoke();
?>
</div>
<br/>
		<?php	include 'includes/footer.php';?>
</body>
 <script src="js/onscroll.js"></script>


</html>