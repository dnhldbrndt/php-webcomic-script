<?php
//controller.php Catalog

include_once("includes/catalog.php");

	class WebcomicCatalog {
		
		public $catalog;
		
		public function __construct() {
			 $this->catalog = new Catalog();
		}
		
		public function invoke() {
			$this->catalog->render(); 
			include ('view.php');
 
		}
		
	}

?>