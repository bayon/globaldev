<?php
class GridObject{
	public $rows;
	public $cols;
	public $gridMatrix;
	public $columnWidthPercentsArray;
	public function __construct($gridMatrix,$columnWidthPercentsArray){
		
		$this->cols = max(array_map('count', $gridMatrix));
		$this->rows = count($gridMatrix) ;
		$this->gridMatrix = $gridMatrix;
		$this->columnWidthPercentsArray=$columnWidthPercentsArray;
	}
	function make(){
		$container ="<div class='gridMatrixContainer' >";
		for ($r = 0; $r < $this->rows; $r++) {
			$container .="<div class='gridRow' >";
			for ($c = 0; $c < $this->cols; $c++) {
				if (isset($this->gridMatrix[$r][$c])) {
					$container .="<div class='gridCell'  style='width:".$this->columnWidthPercentsArray[$c]."%;' >" . $this->gridMatrix[$r][$c] . "</div>";
				}else{
					$container .="<div class='gridCell'>  </div>";
				}
			}
			$container .="</div>";
		}
		$container .="</div>";
		//echo($container);
		return $container;
	}
	
	
}
?>