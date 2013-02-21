<?php 
	function includeScripts($arr = NULL){
		if(isset($arr) and is_array($arr)):
			$res = implode('',$arr);	
		else:
			$res = false;
		endif;
		return $res;
	}
?>