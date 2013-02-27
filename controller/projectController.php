<?php 
	include_once("components/crud.php");
	include_once("appController.php");
	class Projeto{
		function check($id){
			$v = Crud::_read("projects",array('id = "'.$id.'"'));
			if($v): return true; else: return false; endif;
		}
		function create($id_costumer,$id_category,$id_pessoa,$nome,$cep,$endereco,$bairro,$cidade,$estado,$tel,$contato,$status){
			$c = Crud::_create("projects","NULL,'$id_costumer','$id_category','$id_pessoa','$nome','$cep','$endereco','$bairro','$cidade','$estado','$tel','$contato',$status");
			if($c): return true; else: return false; endif;
		}
		function Show($params=NULL){
			$c = Crud::_read("projects",$params);
			while( $res = mysql_fetch_array($c)){
				$projects[] = $res;	
			}
			return $projects;
		}
		function edit($params=NULL){
			$e = Crud::_update("projects",$params);
			if($e): return true; else: return false; endif;
		}
		function Delete(){
			
		}
		function Last(){
			$v = Crud::_order("projects","id","desc","1");
			$res = mysql_fetch_object($v);
			return $res;
		}
		function counter($id,$status=NULL){
			if(isset($status)):
			$n = Crud::_counter("projects",array('id_customer = "'.$id.'" and status = "'.$status.'" and status <> "3"'));
			else:
			$n = Crud::_counter("projects",array('id_customer = "'.$id.'" and status <> "3"'));
			endif;
			return $n;
		}
		function status($id, $status=NULL){
			$n = Crud::_read("projects",array('id = "'.$id.'" and status = "'.$status.'"'));
			$res = mysql_fetch_object($n);
			if(isset($res->id)): return true; else: return false; endif;
		}
		function getThumb($id){
			$q = Crud::_read("archives",array('id_project = "'.$id.'" and id_type = "1" ORDER BY id DESC LIMIT 1'));
			$t = mysql_fetch_array($q);
			
			return $t;
		}
		function getThumbs($id){
			$arr_thumb = NULL;
			$q = Crud::_read("archives",array('id_project = "'.$id.'" and id_type = "1" '));
			while($t = mysql_fetch_array($q)):
				$arr_thumb[] = $t;
			endwhile;
			return $arr_thumb;
		}
		function getFile($id,$type=NULL){
			$q = Crud::_read("archives",array('id_project = "'.$id.'" and id_type = "'.$type.'" '));
			$t = mysql_fetch_array($q);
			return $t;	
		}
		function comboEstados($marcado = false){
    $resultArray = NULL;
	$montarArray = array(""=>"Selecione seu Estado","AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá",  "BA"=>"Bahia", "CE"=>"Ceará", "DF"=>"Distrito Federal", "ES"=>"Espírito Santo", "GO"=>"Goiás", "MA"=>"Maranhão", "MG"=>"Minas Gerais", "MS"=>"Mato Grosso do Sul", "MT"=>"Mato Grosso", "PA"=>"Pará", "PB"=>"Paraíba", "PE"=>"Pernambuco", "PI"=>"Piauí", "PR"=>"Paraná", "RJ"=>"Rio de Janeiro", "RN"=>"Rio Grande do Norte", "RO"=>"Rondônia", "RR"=>"Roraima", "RS"=>"Rio Grande do Sul", "SC"=>"Santa Catarina", "SE"=>"Sergipe", "SP"=>"São Paulo", "TO"=>"Tocantins");
 
    if ($marcado == ""){
        foreach ($montarArray as $k => $v){
            $resultArray .= "<option value=\"{$k}\">{$v}</option>";
        }
        return $resultArray;
    }
    else {
        foreach ($montarArray as $k => $v){
            if ($marcado == $k){
                $resultArray .= "<option value=\"{$k}\" selected=\"selected\">{$v}</option>";
            }
            else {
                $resultArray .= "<option value=\"{$k}\">{$v}</option>";
            }
        }
        return $resultArray;
    }
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