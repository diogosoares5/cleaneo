<?php 
include('view/template.php'); 
require_once("controller/customerController.php");
Head('Projetos','','upload');
$customer = new Customer();
$checked = $customer->checkAuth();
$customer->set($checked);
?>
		<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_meusprojetos.png" width="234" height="26" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
		<div class="Bcrumb">
				<span>Ol&aacute; <?php echo $customer->nome; ?> |</span> <span>Meus Projetos |</span> <a href="#">Meu Cadastro |</a> <a href="<?php echo ROOT; ?>/login?out=1"> Logout</a>
			</div>
			<span class="infoBar">Voc&ecirc; esta concorrendo na categoria:<b><?php echo $customer->getCategory($customer->category); ?>.</b></span>
			<hr class="bdr1" />
            <div class="Boxer">
            	<h2 class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_atencao.png" alt="" title="" width="123" height="34" /></h2>
            	<ul class="list">
            		<li>Voc&ecirc; poder&aacute; inscrever at&eacute; 3 projetos que j&aacute; dever&atilde;o estar prontos e ter autoria do escrit&oacute;rio/arquiteto. S&oacute; ser&atilde;o aceitas solu&ccedil;&otilde;es executadas a partir de janeiro de 2010 e integralmente conclu&iacute;das at&eacute; 04 de junho de 2013.<li>
            		<li><b>Todos os campos dever&atilde;o ser preenchidos obrigatoriamente.</b><li>
            		<li>Poder&atilde;o ser anexadas at&eacute; <b>3 fotografias</b> por projeto no tamanho de 1 MB (um megabyte) por fotografia, em formato &ldquo;jpeg&rdquo; com resolu&ccedil;&atilde;o de 300 dpi, mostrando obrigatoriamente o &ldquo;drywall&rdquo; instalado na obra,<li>
            		<li>Dever&aacute; ser anexado um <b>Descritivo do Projeto</b> por projeto, com descri&ccedil;&otilde;es e defesas sobre os objetivos pretendidos e os resultados alcan&ccedil;ados (baseados nos crit&eacute;rios do item 6.2.2 do Regulamento). Ser&atilde;o aceitos somente projetos em arquivos com extens&atilde;o &ldquo;<b>.cad</b> e &ldquo;<b>.pdf</b>&rdquo;.<li>
            		<li>Dever&aacute; ser anexado o <b>Modelo de Autoriza&ccedil;&atilde;o</b> preenchido para divulga&ccedil;&atilde;o do projeto.<li>
            		<li><b class="b1">O resultado ser&aacute; divulgado no site no dia 15 de agosto de 2013.</b><li>
            	</ul>
            	<a href="#" class="link"><img src="<?php echo ROOT; ?>/assets/images/btVerreg.png" alt="" title="" width="195" height="30" /></a>
            </div> 
            <img src="<?php echo ROOT; ?>/assets/images/txt_upload.png" alt="" title="" width="551" height="16" />  
			<form action="#" method="#" class="form">
				<div class="Boxer2">
					<h2 class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_projeto.png" alt="" title="" width="130" height="31" /></h2>	
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico1.png" alt="" title="" width="" height="" /> <span class="txt">Fa&ccedil;a o download do <b>Modelo de Autoriza&ccedil;&atilde;o</b></span> <a href="<?php echo ROOT; ?>/download"><img src="<?php echo ROOT; ?>/assets/images/btDonwload.png" alt="" title="" width="134" height="30"></a></span>
					<hr class="bdr1" />
					<!-- Fim step 1 -->
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico2.png" alt="" title="" width="" height="" /> <span class="txt">Preencha os dados da obra</span> </span>
					<span class="lbl2">
						<label>Nome do im&oacute;vel:* </label>
						<input type="text" value=" "  id="" class="inpt04" />
						
					</span>	
					<span class="lbl2">
						<label>CEP: </label>
						<input type="text" value=" "  id="" class="inpt03" />
						<span class="link_ipt"><a href="#"><img src="<?php echo ROOT; ?>/assets/images/seta1.png" alt="" title="" width="9" height="11" /> Buscar CEP</a></span>
						
					</span>
					<span class="lbl2">
						<label>Endere&ccedil;o Comercial:* </label>
						<input type="text" value=" "  id="" class="inpt05" />
						
					</span>	
					<span class="lb2l">
						<label>Bairro: </label>
						<input type="text" value=" "  id="" class="inpt04" />
						
					</span>			
					<span class="lbl2">
						<label>Cidade: </label>
						<input type="text" value=" "  id="" class="inpt04" />
						
					</span>	
					<span class="lbl2">
						<label>Estado: </label>
						<div class="styled-select">
							<select class="inpt04Slc">
								<option>Rio de Janeiro</option>
								<option>Rio de Janeiro</option>
								<option>Rio de Janeiro</option>
							</select>
						</div>
						
					</span>	
					<span class="lbl2">
						<label>Telefone Fixo: </label>
						<input type="text" value=" "  id="" class="inpt01" /><input type="text" value=" "  id="" class="inpt02" />
					</span>	
					<span class="lbl2">
						<label>Nome da pessoa de contato:* </label>
						<input type="text" value=" "  id="" class="inpt04" />
						
					</span>	
					<span class="info1">* Todos os campos s&atilde;o de preenchimento obrigat&oacute;rio.</span>																			
					<hr class="bdr1" />	
					<!-- Fim step 2 -->						
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico3.png" alt="" title="" width="" height="" /> <span class="txt">Selecione at&eacute; <b>3 fotografias</b> desse projeto:</span> </span>									
					<span class="infoBar"><b>Aten&ccedil;&atilde;o:</b> Cada fotografia deve possuir o tamanho de <b>1 MB</b> (um megabyte), em <b>formato &ldquo;jpeg&rdquo;</b> com resolu&ccedil;&atilde;o de <b>300</b> dpi.</span>
					<span class="lbl2">
						<ul class="list">
							<li class="block">
								<label class="lbl3 file">
							        <div id="div-input-file">
							            <input type="file" size="400" class="file-original" id="file-original1" name="fileOriginal1">
							        </div>
								</label>		
                               		
							</li>
							<li class="none">
								<label class="lbl3 file">
							        <div id="div-input-file">
							            <input type="file" size="400" class="file-original" id="file-original2" name="fileOriginal2">
							        </div>
								</label>							
							</li>
							<li class="none">
								<label class="lbl3 file">
							        <div id="div-input-file">
							            <input type="file" size="400" class="file-original" id="file-original3" name="fileOriginal3">
							        </div>
								</label>							
							</li>															
						</ul>
                        <div class="status"></div>
						<span class="linkAdd clr"><img src="<?php echo ROOT; ?>/assets/images/icomais.png" alt="" title="" width="" height="" /><a style="cursor:pointer;">Adcionar mais fotografias</a></span>	
					</span>
					<hr class="bdr1" />
					<!-- Fim step 3 -->
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico4.png" alt="" title="" width="" height="" /> <span class="txt">Selecione at&eacute; <b>3 fotografias</b> desse projeto:</span> </span>			
					<span class="infoBar"><b>Aten&ccedil;&atilde;o:</b> Ser&atilde;o aceitos somente projetos em arquivos com extens&atilde;o  <b>&ldquo;.cad&rdquo; e &ldquo;.pdf&rdquo;.</b></span>
					<span class="lbl2">
						<label class="lbl3 file">
					        <div id="div-input-file">
					            <input type="file" size="400" class="file-original" id="file-original4" name="fileOriginal4">
					        </div>
						</label>							
					</span>		
					<!-- Fim step 4 -->
					<hr class="bdr1 clr" />
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico5.png" alt="" title="" width="" height="" /> <span class="txt">Fa&ccedil;a o upload do <b>Modelo de Autoriza&ccedil;&atilde;o</b> preenchido:</span></span>			
					<span class="lbl2">
						<label class="lbl3 file">
					        <div id="div-input-file">
					            <input type="file" size="400" class="file-original" id="file-original5" name="fileOriginal5">
					        </div>
						</label>							
					</span>	
					<!-- Fim step 5 -->
					<hr class="bdr1 clr" />
					<span class="lbl2">
						<input type="submit" value=" " name="" id="" class="btSalvar rt" />	
					</span>										
				</div>
			</form>
<?php Footer(); ?>