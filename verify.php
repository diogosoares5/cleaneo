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
if(isset($_POST['profissao'])): $profissao = $_POST['profissao']; else: $profissao =  NULL; endif;  //só existe em fisica
$cep = $_POST['cep']; 
$endereco = $_POST['endereco']; 
$complemento = $_POST['complemento']; 
$bairro = $_POST['bairro']; 
$cidade = $_POST['cidade']; 
$estado = $_POST['estado']; 
$tel = $_POST['tel']; 
$cel = $_POST['cel']; 

//juridica
if(isset($_POST['razao'])): $razao = $_POST['razao']; else: $razao = NULL; endif; 
if(isset($_POST['fantasia'])): $fantasia = $_POST['fantasia']; else: $fantasia = NULL; endif; 
if(isset($_POST['cnpj'])): $cnpj = $_POST['cnpj']; else: $cnpj = NULL; endif;

$customer = new Customer();

if($customer->authUser($email,md5($pass))):
	$_SESSION['warn'] = "Este usu&aacute;rio j&aacute; se encontra cadastrado neste concurso";
else:
//criando usuario
$createCustomer = $customer->sign($categoria, $pessoa, $email, $pass, $nome, $cpf, $profissao, $cep, $endereco, $complemento, $bairro, $cidade, $estado, $tel, $cel, $razao, $fantasia, $cnpj);
	if($createCustomer == true):
		$lastUser = $customer->show(array("email = '".$email."'"));
		$send = $customer->sendEmail($lastUser[0]['id'],'ativacao');
		if($send==true):
			header('Location: '.ROOT.'/auth');
			exit();
		else:
			$_SESSION['warn'] = "Usuario criado com sucesso em breve lhe enviaremos um email com seu link de confirmacao";
		endif;
	else:
	$_SESSION['warn'] = "Erro ao criar usuario";
	endif;
endif;
//header('Location: '.ROOT.'/cadastro');
?>