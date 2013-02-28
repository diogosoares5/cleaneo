<?php 
require_once("config.php");
class Crud {
	//SIMPLE CRUD
	function _create($table, $params=NULL){
		$sql = "INSERT INTO ".$table;
		$d = "DESCRIBE ".$table;
		$desc = mysql_query($d);
		while($res = mysql_fetch_array($desc)):
			$Fields[] = $res['Field'];
		endwhile;
		$fields = implode(', ',$Fields);
		$sql .= " (".$fields.") VALUES ";
		
			$sql .= "(".$params.")";	
		$query = mysql_query($sql);
		return $query;
	}
	function _read($table, $params=NULL){
		if(isset($params)):
			$sql = "SELECT * FROM ".$table." WHERE ".$this->serial($params)." ";	
		else:
			$sql = "SELECT * FROM ".$table;
		endif;
		$query = mysql_query($sql);
		return $query;
	}
	function _order($table, $orderby, $order, $limit, $params=NULL){
		if(isset($params)):
			$sql = "SELECT * FROM ".$table." WHERE ".$this->serial($params)." ORDER BY ".$orderby." ".$order." LIMIT ".$limit." ";	
		else:
			$sql = "SELECT * FROM ".$table." ORDER BY ".$orderby." ".$order." LIMIT ".$limit;
		endif;
		
		$query = mysql_query($sql);
		return $query;	
	}
	function _update($table, $params=NULL){
		if(isset($params)):
			$sql = "UPDATE ".$table." SET ".$this->serial($params);	
		else:
			return false;
		endif;
		//echo $sql;
		$query = mysql_query($sql);
		return $query;
	}	
	function _delete($table,$params=NULL){
		if(isset($params)):
			$sql = "DELETE FROM ".$table." WHERE ".$this->serial($params)." ";	
		else:
			$sql = "DELETE FROM ".$table;
		endif;
		echo $sql;
		$query = mysql_query($sql);
		return $query;
	}
	function _counter($table, $params=NULL){
		if(isset($params)):
			$sql = "SELECT * FROM ".$table." WHERE ".$this->serial($params)." ";	
		else:
			$sql = "SELECT  * FROM ".$table;
		endif;
		
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		
		return $num;
		}
	function serial($arr, $char=NULL){
		if(isset($char)):
		$r = implode($char,$arr);
		else:
		$r = implode(' ',$arr);
		endif;
		return $r;
	}
}
?>