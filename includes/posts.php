<?php
//posts.php

class Post {

	public $date;
	public $today;
	public $todays_post;
	
	public function __construct($arg) {
		$this->date = $arg;
		
		$this->setToday();
	}

	public function setToday() {
		if ('' != $this->date ) {
			$this->todays_post = $this->date;
		}
		else {
			$this->todays_post = date("Y-m-d", time());
		}
	}

	public function getToday() {
		return $this->todays_post;
	}
}

class ImagePost extends Post {
	
	public $comic_path;
	public $image_suffix;
	public $update_interval;
	public $first_strip;
	
	public function __construct($arg) {
 
		$this->date = $arg;
 
		$this->setToday();
		$this->setValues();
	}
	
	public function getPrevious($date) {
		$epoch = mktime(0, 0, 0, substr($date, 5, 2), substr($date, 8, 2), substr($date, 0, 4));
		while ($epoch = $epoch - $this->update_interval) {
			$newdate = date("Y-m-d", $epoch);
			if ($newdate < $this->first_strip) {
				return '';
			}
			if (file_exists($this->comic_path . "/" . $newdate . $this->image_suffix)) {
				return $newdate;
			}
		}
	}

	public function getNext($date) {
		$epoch = mktime(0, 0, 0, substr($date, 5, 2), substr($date, 8, 2), substr($date, 0, 4));
		while ($epoch = $epoch + $this->update_interval) {
			$newdate = date("Y-m-d", $epoch);
			if ($newdate > $this->today) {
				return '';
			}
			if (file_exists($this->comic_path . "/" . $newdate . $this->image_suffix)) {
				return $newdate;
			}
		}
	}


	public function setValues() {
		$this->today = date('Y-m-d');
		$configs = include('config.php');
		$this->comic_path = $configs['comic_path'];
		$this->image_suffix = $configs['image_suffix'];
		$this->update_interval = $configs['update_interval'];
		$this->first_strip = $configs['first_strip'];
	}

	public function updatePath($path) {
		$this->comic_path = $path;
	}
	public function getFirst() {
		return $this->first_strip;
	}
	
}

class NewsPost extends Post {
	public $news_path;
	public $news_suffix;
	
	public function __construct($arg) {
		$this->date = $arg;
		$this->setToday();
		$configs = include('config.php');
		$this->news_path = $configs['news_path'];
		$this->news_suffix = $configs['news_suffix'];
	}
	
	public function getPost($todays_post) {
		if (file_exists($this->news_path . "/" . $todays_post . $this->news_suffix)) { 
			include $this->news_path . "/" . $todays_post . $this->news_suffix;			 
        } 
		else {
			echo "<p>No post.</p>";		 																
		}
	}
		
}
?>