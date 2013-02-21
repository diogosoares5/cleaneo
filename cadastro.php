<?php 
include('view/template.php'); 
Head('Cadastro');
$category = '';
?>
			
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_facaseucadastro.png" width="295" height="26" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
			
			
<?php 
if(isset($_GET['c'])):
	$category = $_GET['c'];
	if($category == 'arquiteto'): $cat = 1; else: $cat = 2; endif;
echo '<a href="'.HHtml::Link('cadastro').'">Categoria</a> ';
echo $category;

?>
Selecione o tipo de cadastro:
<input type="radio" class="signSel" name="signSel" value="1" id="signSel1" /><label for="signSel1">Pessoa Fisica</label>
<input type="radio" class="signSel" name="signSel" value="2" id="signSel2" /><label for="signSel2">Pessoa Juridica</label>
<input type="hidden" id="cat" value="<?php echo $cat; ?>" />
<?php
else:
?>
<p>Em qual categoria deseja concorrer?</p>
			<a href="<?php echo HHtml::Link('cadastro/arquiteto'); ?>" class="lf"><img src="<?php echo ROOT; ?>/assets/images/btArqt.png" alt="" title="" width="264" height="45" /></a>
			<a href="<?php echo HHtml::Link('cadastro/instalador'); ?>" class="rt"><img src="<?php echo ROOT; ?>/assets/images/btInst.png" alt="" title="" width="264" height="45" /></a>			
<?php
endif;
if(isset($_SESSION['warn'])):
	echo $_SESSION['warn'];
	unset($_SESSION['warn']);
endif;
?>
<div id="box_cadastro"></div>
<?php Footer(); ?>