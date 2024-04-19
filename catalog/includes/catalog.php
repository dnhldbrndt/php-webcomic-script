<?php
//catalog.php
include_once("../includes/posts.php");

class Catalog {
	
	public $images;
	public $arg;
	public function __construct() {
		$this->load();
	}
	
	public function load() {

		$arg = '';

		$post = new ImagePost($arg);
		$i = 0;
		$post->updatePath("../imgpost");
		$date = $post->getFirst();
		$this->images[$i] = $date;
		
		for ($i = 1; $date !=  ''; $i++) {
			if($post->getNext($date) != '') { 
				$this->images[$i] = $post->getNext($date);
				$date = $this->images[$i];
			}
			else {
				$date = '';
			}
		}   			
	}
	
	public function render() {		
/* 		$i;
		$max = sizeof($this->images);
		echo "Max: " . $max . "<br/>";
		for ($i = 0; $i < $max; $i++) {
				echo $this->images[$i] . "<br/>";
		}  */
		return $this->images;
	}	
}

?>