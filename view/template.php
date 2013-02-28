<?php
session_start();
require("config.php");
include_once("components/function.php");
include_once("behavior/utils.php");

function Head($pageTitle=NULL, $arrayScripts = NULL, $bodyclass = NULL){
	$h = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Concurso Cleaneo Knauf';
$h .= $pageTitle ? ' - '.$pageTitle : NULL;
$h .='</title>
<link rel="stylesheet" type="text/css" href="'.ROOT.'/css/reset.css">
<link rel="stylesheet" type="text/css" href="'.ROOT.'/css/style.css">
<script type="text/javascript" src="'.ROOT.'/assets/js/jquery.js"></script>
<script type="text/javascript" src="'.ROOT.'/assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="'.ROOT.'/assets/js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript" src="'.ROOT.'/assets/js/jquery.validate.js"></script>
';
if(isset($arrayScripts) and !empty($arrayScripts)):
$h .= includeScripts($arrayScripts);
endif;
$h .='
<script type="text/javascript" src="'.ROOT.'/assets/js/scripts.js"></script>
</head><body>
	<div class="All '.$bodyclass.'">
	<div class="content">
		<div class="wrapper">
		<h1 class="logo"><a href="'.ROOT.'"><img src="'.ROOT.'/assets/images/logo.png" alt="" title="" width="260" height="186" /></a></h1>
';
echo $h;
}
function Footer(){
	$f = '
			<div class="linksPreFooter">
				<a href="'.ROOT.'" class="link lf"><img src="'.ROOT.'/assets/images/seta2.png" alt="" title="" width="9" height="11" /> voltar</a>									
				<hr class="bdr2 clr" />								
				<span class="info1">Certificado de Autorização Caixa n 3-0054/2013</span>
			</div>	
		</div>		
	</div>	
	<div class="footer">
		<img src="'.ROOT.'/assets/images/logo2.png" alt="" title="" width="240" height="78" />
		<ul class="list">
			<li><a href="'.HHtml::Link('regulamento').'">Regulamento</a></li>	
			<li class="last"><a href="'.HHtml::Link('contato').'">Fale Conosco</a></li>	
		</ul>
	</div>
	</div>
</body>
</html>';
echo $f;
}
