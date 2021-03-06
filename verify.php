<?php 
session_start();
require_once("controller/customerController.php");
//categoria
$categoria = $_POST['cat'];

//tipo pessoa
$pessoa = $_POST['pessoa']; 

//customers params
$email = $_POST['email']; 
$pass = $_POST['pass']; 
$nome = $_POST['nome']; 
$cpf = $_POST['cpf']; 
if(isset($_POST['profissao'])): $profissao = $_POST['profissao']; else: $profissao =  NULL; endif;  //s� existe em fisica
$cep = $_POST['cep']; 
$endereco = $_POST['endereco']; 
$complemento = $_POST['complemento']; 
$bairro = $_POST['bairro']; 
$cidade = $_POST['cidade']; 
$estado = $_POST['estado']; 
$ddd_tel = $_POST['ddd_tel'];
$ddd_cel = $_POST['ddd_cel'];
$tel = $_POST['tel']; 
$cel = $_POST['cel']; 

if(isset($_POST['id_costumer'])): $id_customer = $_POST['id_costumer']; else: $id_costumer = NULL; endif;

//juridica
if(isset($_POST['razao'])): $razao = $_POST['razao']; else: $razao = NULL; endif; 
if(isset($_POST['fantasia'])): $fantasia = $_POST['fantasia']; else: $fantasia = NULL; endif; 
if(isset($_POST['cnpj'])): $cnpj = $_POST['cnpj']; else: $cnpj = NULL; endif;

$customer = new Customer();

if($customer->authUser($email,$pass)):
	$_SESSION['warn'] = "Este usu&aacute;rio j&aacute; se encontra cadastrado neste concurso";
	header('Location: '.ROOT.'/cadastro');
else:
//criando usuario
$createCustomer = $customer->sign($categoria, $pessoa, $email, $pass, $nome, $cpf, $profissao, $cep, $endereco, $complemento, $bairro, $cidade, $estado,$ddd_tel, $tel, $ddd_cel, $cel, $razao, $fantasia, $cnpj);
	if($createCustomer == true):
		$lastUser = $customer->show(array("email = '".$email."'"));
		$send = $customer->sendEmail($lastUser['id'],'ativacao');
		
		if($send==true): 
			$_SESSION['success'] = $lastUser['email'];
			header('Location: '.ROOT.'/auth');
		else:
			$_SESSION['warn'] = "Usuario criado com sucesso em breve lhe enviaremos um email com seu link de confirmacao";
			header('Location: '.ROOT.'/cadastro');
		endif;
	else:
	$_SESSION['warn'] = "Erro ao criar usuario";
	header('Location: '.ROOT.'/cadastro');
	endif;
endif;

?>