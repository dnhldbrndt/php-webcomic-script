<?php
include_once("includes/posts.php");

	class Webcomic {
		
		public $imagepost;
		public $newspost;
		public $arg;

		public function __construct() {
			if(isset($_GET['date'])) {
				 $arg = $_GET['date'];
			} else {
				$arg = '';
			}
			$this->imagepost = new ImagePost($arg);
			$this->newspost = new NewsPost($arg);
		}

		public function invoke() {
			$date = $this->imagepost->getToday();

			$previous = $this->imagepost->getPrevious($date); 
			$next = $this->imagepost->getNext($date);

			include 'view.php';
		}	
	}
?>