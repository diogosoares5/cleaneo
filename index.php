<?php 
include('view/template.php'); 
Head();
?>
<h1>Pagina home</h1>
<a href="<?php echo HHtml::Link('cadastro'); ?>">CADASTRO</a>
<form action="" method="post">
	<input type="text" name="login">
    <input type="password" name="pass">
    <input type="submit" value="ok">
</form>
<?php Footer(); ?>