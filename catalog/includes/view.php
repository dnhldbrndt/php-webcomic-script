<body class="wrapper">
<?php
			echo "This is the Catalog View: <br/>";
			echo '<hr class="catalog">'; ?> 
<div >
 
	<div id="catalog">
        <?php
			$configs = include('../includes/config.php');
			$comic_path = $configs['comic_path'];
			$image_suffix = $configs['image_suffix'];
			$images = $this->catalog->render();
			foreach ($images as $image) {
				echo '<a href="../index.php?date=' . $image . '">' ;
				echo '<img src="../' . $comic_path . '/' . $image . $image_suffix . '" width="150px" height="150px" alt="' . $image .'"> ';
				echo '</a>';
			}
		?>
		</div>
 
</div>
 
</body> 