
<div id="view-page">
	<div id="date" >
		<?php echo "Date:" . $date . "<br/>"; ?> 
	</div>	
	<div id="image-block">
        <?php
			$configs = include('config.php');
			$comic_path = $configs['comic_path'];
			$image_suffix = $configs['image_suffix'];
			
			if (file_exists($comic_path . "/" . $date . $image_suffix)) {
				echo '<img src="' . $comic_path . '/' . $date . $image_suffix . '" height="50%" width="50%">'; 
			} 
			else {
				$date = $previous;
				$previous = $this->imagepost->getPrevious($date);
				$next = $this->imagepost->getNext($date);
				echo '<img src="' . $comic_path . '/' . $date . $image_suffix . '" height="50%" width="50%>';
			} 
		?>
	</div>
	<div id="nav">  
        <?php
			include('nav.php');
		?>
	</div>	
	<div class="news">
		<hr style="width: 350px; border-color: #EEBAF9" />
		Post: <br/>
        <?php
			$this->newspost->getPost($date);
		?>
	</div>
</div>

