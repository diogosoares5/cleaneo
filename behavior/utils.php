<?php 
	class HHtml{
		function Link($url, $path=NULL){
			return  ROOT.'/'.$url;		
		}
	}
	class HForm{
		function Init($action, $method, $id = NULL, $class = NULL, $enc=NULL){
			echo '<form action='.$action.' method='.$method.' '.$enc.' id="'.$id.'" class="'.$class.'">';
		}
		function Label($text,$for=NULL, $id = NULL, $class = NULL){
			echo '<label for="'.$for.'" id="'.$id.'" class="'.$class.'">'.$text.'</label>';	
		}
		function Input($name, $type, $id = NULL, $class = NULL, $value = NULL){
			echo '<input name="'.$name.'" type="'.$type.'" id="'.$id.'" value="'.$value.'" class="'.$class.'"   />';
		}	
		function Select($name, $arr_options, $text=NULL,  $id = NULL, $class = NULL){
			echo '<select name="'.$name.'" id="'.$id.'" class="'.$class.'" >';
			if(isset($text)):
				echo '<option value="">'.$text.'</option>';
			endif;
			foreach($arr_options as $key=>$option):
				echo '<option value="'.$key.'">'.$option.'</option>';
			endforeach;
			echo '</select>';
		}
		function Button($type, $value=NULL, $id = NULL, $class = NULL){
			echo '<input  type="'.$type.'" value="'.$value.'" id="'.$id.'" class="'.$class.'">';
		}
		function Radio($name, $arr_options){
			foreach($arr_options as $key=>$option):
				echo '<input type"radio" name="'.$name.'" value="'.$key.'">'.$option.'</option>';
			endforeach;	
		}
		function End(){
			echo '</form>';	
		}
		function ComboEstados($marcado = false){
    $resultArray = NULL;
	$montarArray = array(""=>"Selecione seu Estado","AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá",  "BA"=>"Bahia", "CE"=>"Ceará", "DF"=>"Distrito Federal", "ES"=>"Espírito Santo", "GO"=>"Goiás", "MA"=>"Maranhão", "MG"=>"Minas Gerais", "MS"=>"Mato Grosso do Sul", "MT"=>"Mato Grosso", "PA"=>"Pará", "PB"=>"Paraíba", "PE"=>"Pernambuco", "PI"=>"Piauí", "PR"=>"Paraná", "RJ"=>"Rio de Janeiro", "RN"=>"Rio Grande do Norte", "RO"=>"Rondônia", "RR"=>"Roraima", "RS"=>"Rio Grande do Sul", "SC"=>"Santa Catarina", "SE"=>"Sergipe", "SP"=>"São Paulo", "TO"=>"Tocantins");
 
    if ($marcado == ""){
        foreach ($montarArray as $k => $v){
            $resultArray .= "<option value=\"{$k}\">{$v}</option>";
        }
        echo $resultArray;
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
       echo  $resultArray;
    }
}
	}
	class HGetCss{
		function getClass($atual_url, $params){
			foreach($params as $page => $class):
				if($atual_url == $page):
					return $class;
				endif;
			endforeach;
		}
	}
	
?>