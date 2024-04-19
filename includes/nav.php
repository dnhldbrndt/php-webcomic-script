<div id="nav">
	<div>
		<a href="index.php?date=
			<?php 
			$configs = include('config.php'); 
			$first_strip = $configs['first_strip']; 
			echo $first_strip;
			?>
		">First</a>
	</div>
    <div>
        <?php 
			if ($previous) { 
				echo '<a href="index.php?date=' . $previous . '"> Previous </a>';
			} 
			else { 
				echo 'Previous';
			}
		?>
	</div>
	<div>
		<?php
			$next = $this->imagepost->getNext($date);
			if ($next) {
				echo '<a href="index.php?date=' . $next . '">Next</a>'; 
            } 
			else {
				echo 'Next'; 
			}
		?>
    </div>
    <div>
		<a href="index.php">Latest</a>
 </div>
 </div>