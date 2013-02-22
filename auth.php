<?php 
include('view/template.php');
//$_SESSION['success'] = 'dwedwewef@wewef.weffw';
if(isset($_SESSION['success'])):
	$page = 1;
	Head('Cadastro','','etapa3');
elseif(isset($_GET['u'])):
	$uid = substr($_GET['u'],0,32);
	$hash  = substr($_GET['u'],32);
	$page = 2;
	Head('Cadastro','','etapa4');
else:
	header('Location:'.ROOT);
endif;

?>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_1etapaok.png" width="505" height="27" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
            
            <?php if($page == 1): ?>
            <p>Verifique sua conta de e-mail <a href="mailto:<?php echo $_SESSION['success']; ?>"><?php echo $_SESSION['success']; ?></a> <b class="B1">e<br /> faça a ativação do seu cadastro!</b> </p>
			<p class="infoBar">Após ativar o cadastro, você deverá aceitar as condições do regulamento para iniciar sua participação com o envio dos seus projetos.</p>
            <?php
			unset($_SESSION['success']);
			else: ?>
            		<p>Para participar leia atentamente ao <b>Regulamento.</b></p>
			
			<div id="scrollbar3" class="contrato">
				<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>				
				<div class="viewport">
					<div class="overview">

							<b>CONCURSO NACIONAL KNAUF CLEANEO ACÚSTICO
							REGULAMENTO</b>


							<p>Knauf do Brasil Ltda., sediada à Rodovia Presidente Dutra, Km 198,5 – Jardim Marajoara – Queimados, Rio de Janeiro, CEP 26.360-720, doravante denominada simplesmente Knauf, lança, por meio deste instrumento, o Concurso Nacional Knauf Cleaneo Acústico, denominado simplesmente Concurso, e seu respectivo Regulamento.</p>

							<b>1. OBJETIVO</b>

							<p>1.1. Premiar as melhores soluções especificadas e integralmente executadas exclusivamente com o sistema Knauf Cleaneo Acústico.</p>

							<p>1.1.1 As soluções acima mencionadas serão àquelas executadas a partir de janeiro de 2010 e integralmente executadas até 04 de junho de 2013.</p>

							<p><b>2. PARTICIPANTES</b></p>

							<p>2.1. O concurso destina-se a pessoas físicas ou jurídicas, atuantes em duas categorias de profissionais:</p>

							<p>- Arquitetos graduados devidamente registrados no CAU - Conselho de Arquitetura e Urbanismo do Brasil.</p>

							<p>- Instaladores de sistemas drywall.</p>

							<p>2.2. É vedada a participação no Concurso de funcionários da Knauf.</p>

							<p>1.1. Premiar as melhores soluções especificadas e integralmente executadas exclusivamente com o sistema Knauf Cleaneo Acústico.</p>

							<p>1.1.1 As soluções acima mencionadas serão àquelas executadas a partir de janeiro de 2010 e integralmente executadas até 04 de junho de 2013.</p>

							<p><b>2. PARTICIPANTES</b></p>

							<p>2.1. O concurso destina-se a pessoas físicas ou jurídicas, atuantes em duas categorias de profissionais:</p>

							<p>- Arquitetos graduados devidamente registrados no CAU - Conselho de Arquitetura e Urbanismo do Brasil.</p>

							<p>- Instaladores de sistemas drywall.</p>

							<p>2.2. É vedada a participação no Concurso de funcionários da Knauf.</p>

							<p>1.1. Premiar as melhores soluções especificadas e integralmente executadas exclusivamente com o sistema Knauf Cleaneo Acústico.</p>

							<p>1.1.1 As soluções acima mencionadas serão àquelas executadas a partir de janeiro de 2010 e integralmente executadas até 04 de junho de 2013.</p>

							<p><b>2. PARTICIPANTES</b></p>

							<p>2.1. O concurso destina-se a pessoas físicas ou jurídicas, atuantes em duas categorias de profissionais:</p>

							<p>- Arquitetos graduados devidamente registrados no CAU - Conselho de Arquitetura e Urbanismo do Brasil.</p>

							<p>- Instaladores de sistemas drywall.</p>

							<p>2.2. É vedada a participação no Concurso de funcionários da Knauf.</p>	

							<p><b>2. PARTICIPANTES</b></p>

							<p>2.1. O concurso destina-se a pessoas físicas ou jurídicas, atuantes em duas categorias de profissionais:</p>

							<p>- Arquitetos graduados devidamente registrados no CAU - Conselho de Arquitetura e Urbanismo do Brasil.</p>

							<p>- Instaladores de sistemas drywall.</p>

							<p>2.2. É vedada a participação no Concurso de funcionários da Knauf.</p>

							<p>1.1. Premiar as melhores soluções especificadas e integralmente executadas exclusivamente com o sistema Knauf Cleaneo Acústico.</p>

							<p>1.1.1 As soluções acima mencionadas serão àquelas executadas a partir de janeiro de 2010 e integralmente executadas até 04 de junho de 2013.</p>

							<p><b>2. PARTICIPANTES</b></p>

							<p>2.1. O concurso destina-se a pessoas físicas ou jurídicas, atuantes em duas categorias de profissionais:</p>

							<p>- Arquitetos graduados devidamente registrados no CAU - Conselho de Arquitetura e Urbanismo do Brasil.</p>

							<p>- Instaladores de sistemas drywall.</p>

							<p>2.2. É vedada a participação no Concurso de funcionários da Knauf.</p>										

					</div>	
				</div>	
			</div>	

			<div class="confir">
				<form>
					<input type="check" value=" " name="" id="" class="" /> Li e aceito as condições do Regulamento.	
				</form>
			</div>
            <?php endif; ?>
<?php Footer(); ?>
