<?php 
include('view/template.php'); 
require_once("controller/customerController.php");
require_once("controller/projectController.php");
Head('Projetos','','upload');
//cliente
$customer = new Customer();
$checked = $customer->checkAuth();
$customer->set($checked);
//projetos
$projeto = new Projeto();
?>
		<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_meusprojetos.png" width="234" height="26" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
		<div class="Bcrumb">
				<span>Ol&aacute; <?php echo $customer->nome; ?> |</span> <span>Meus Projetos |</span> <a href="#">Meu Cadastro |</a> <a href="<?php echo ROOT; ?>/login?out=1"> Logout</a>
			</div>
			<span class="infoBar">Voc&ecirc; esta concorrendo na categoria:<b><?php echo $customer->getCategory($customer->category); ?>.</b></span>
            <?php if(isset($_SESSION['flash'])): 
				echo '<span class="infoBar2">'.$_SESSION['flash'].'</span>';
				unset($_SESSION['flash']);
			else:
			
				if($projeto->counter($customer->id) >= 1):
					echo '<span class="infoBar2">Voc&ecirc; tem ';
					
					if($projeto->counter($customer->id,1)):
						if($projeto->counter($customer->id,1) > 1):
							echo $projeto->counter($customer->id,1).' projetos salvos';
						else:
							echo $projeto->counter($customer->id,1).' projeto salvo';
						endif;
					endif;
					if($projeto->counter($customer->id,1) and $projeto->counter($customer->id,2)):
						echo ' e ';
					endif;
					
					if($projeto->counter($customer->id,2)):
						if($projeto->counter($customer->id,2) > 1):
							echo $projeto->counter($customer->id,2).' projetos enviados';
						else:
							echo $projeto->counter($customer->id,2).' projeto enviado';
						endif;
					endif;
					
					echo '.</span>';
				endif;
			endif; ?>
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
            	<a href="<?php echo ROOT; ?>/regulamento" class="link"><img src="<?php echo ROOT; ?>/assets/images/btVerreg.png" alt="" title="" width="195" height="30" /></a>
            </div> 
            <img src="<?php echo ROOT; ?>/assets/images/txt_upload.png" alt="" title="" width="551" height="16" />  
            <?php 
				if($projeto->counter($customer->id) >= 1):
				//lista os projetos
				$pr = $projeto->Show(array("id_customer = '".$customer->id."' AND status <> '3'"));
				
				$cont = 0;
					foreach($pr as $p):
						$cont++;
						$cont_arr[] = $cont;
			?>
            <div class="Boxer2 Proj1">
					<h2 class="title">
					<?php 
						if($cont == '1'): $cont_text = NULL; else: $cont_text = $cont; endif;
					?>
					<img src="<?php echo ROOT; ?>/assets/images/txt_projeto<?php echo $cont_text; ?>.png" alt="" title="" width="130" height="31" /></h2>
					<div class="concluido">
                    <?php 
						$image = $projeto->getThumb($p['id']);
						$project_thumbnail = isset($image['data']) ? $image['data'] :  'defaults.jpg';
					?>
						<img src="<?php echo ROOT; ?>/archives/thumbs/<?php echo $project_thumbnail; ?>" alt="" title="" class="lf" />
						<div class="info">
							<h3 class="title2"><?php echo $p['nome']; ?></h3>
							<h4 class="SubTitle2 none"><?php echo $p['id']; ?></h4>
							<span class="clr2"></span>
							<div class="links">
								<?php 
									if($projeto->status($p['id'],2) != true):
								?>
                                <a href="javaScript:;" projID="<?php echo $p['id']; ?>" class="editProject"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" />editar</a> |
                                <?php endif; ?>
								<a href="<?php echo ROOT; ?>/projeto_fin?pid=<?php echo $p['id']; ?>"><img src="<?php echo ROOT; ?>/assets/images/icoX.png" alt="" title="" width="9" height="10" />excluir projeto</a>
								<?php 
									if($projeto->status($p['id'],2) == true):
								?>
                                	<a class="btProjOk rt"></a>
                                <?php			
									else:
								?>
                                
                                <form action="<?php echo ROOT; ?>/projeto_fin" method="post">
                                <input type="hidden" name="finish" value="1" />
                                <input type="hidden" name="id_project" value="<?php echo $p['id']; ?>" />
                                <input type="submit" value=" " name="" id="" class="btEnviarP rt" />
                                </form>	
                                <?php endif; ?>
							</div>	
						</div>
					</div>
                    <div style="display:none;" id="editar_<?php echo $p['id']; ?>" class="editar">
                    	
						<hr class="bdr2" />
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico1.png" alt="" title="" width="" height="" /> <span class="txt">Faça o download do <b>Modelo de Autorização</b></span> <a href="<?php echo ROOT; ?>/download"><img src="<?php echo ROOT; ?>/assets/images/btDonwload.png" alt="" title="" width="134" height="30"></a></span>
						<hr class="bdr1" />
						<!-- Fim step 1 -->
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico2.png" alt="" title="" width="" height="" /> <span class="txt">Preencha os dados da obra</span> </span>
                        <form action="<?php echo ROOT; ?>/projeto" method="post" class="form projectForm" enctype="multipart/form-data"> 
                            <input type="hidden" name="id_customer" value="<?php echo $customer->id; ?>">
                            <input type="hidden" name="id_category" value="<?php echo $customer->category; ?>">
                            <input type="hidden" name="id_pessoa" value="<?php echo $customer->pessoa; ?>">
                            <input type="hidden" name="id_project" value="<?php echo $p['id']; ?>">
						<span class="lbl2">
							<label>Nome do imóvel:* </label>
							<input type="text" value="<?php echo $p['nome']; ?>"  id="nome" class="inpt04" />
							
						</span>	
						<span class="lbl2">
							<label>CEP: </label>
							<input type="text" value="<?php echo $p['cep']; ?>"  id="cep" class="inpt03" />
							<span class="link_ipt"><a href="#"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" /> Buscar CEP</a></span>
							
						</span>
						<span class="lbl2">
							<label>Endereço Comercial:* </label>
							<input type="text" value="<?php echo $p['endereco']; ?>"  id="endereco" class="inpt05" />
							
						</span>	
						<span class="lbl2">
							<label>Bairro: </label>
							<input type="text" value="<?php echo $p['bairro']; ?>"  id="bairro" class="inpt04" />
							
						</span>			
						<span class="lbl2">
							<label>Cidade: </label>
							<input type="text" value="<?php echo $p['cidade']; ?>"  id="cidade" class="inpt04" />
							
						</span>	
						<span class="lbl2">
							<label>Estado: </label>
							<div class="styled-select">
								<select class="inpt04Slc">
									<option value="<?php echo $p['estado']; ?>"></option>
                                    <option>Rio de Janeiro</option>
									<option>Rio de Janeiro</option>
									<option>Rio de Janeiro</option>
								</select>
							</div>
							
						</span>	
						<span class="lbl2">
							<label>Telefone Fixo: </label>
							<input type="text" value="<?php echo $p['tel']; ?>"  id="ddd" class="inpt01" /><input type="text" value="<?php echo $p['tel']; ?>"  id="tel" class="inpt02" />
						</span>	
						<span class="lbl2">
							<label>Nome da pessoa de contato:* </label>
							<input type="text" value="<?php echo $p['contato']; ?>"  id="contato" class="inpt04" />
							
						</span>	
						<span class="info1">* Todos os campos são de preenchimento obrigatório.</span>																			
						<hr class="bdr1" />	
						<!-- Fim step 2 -->						
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico3.png" alt="" title="" width="" height="" /> <span class="txt">Selecione até <b>3 fotografias</b> desse projeto:</span> </span>									
						<span class="infoBar"><b>Atenção:</b> Cada fotografia deve possuir o tamanho de <b>1 MB</b> (um megabyte), em <b>formato “jpeg”</b> com resolução de <b>300</b> dpi.</span>
						<span class="lbl2">
							<ul class="listThumb">	
                            <?php
								$t = $projeto->getThumbs($p['id']);
								$cont_t = 0;
								if(isset($t)):
								foreach($t as $thumb):
								$cont_t++;
							?>
								<li>
									<img src="<?php echo ROOT; ?>/archives/thumbs/<?php echo $thumb['data']; ?>" alt="" title="" />
									<a style="cursor:pointer;" href="delete_image.php?tid=<?php echo $thumb['id']; ?>" class="link delImage"><img src="<?php echo ROOT; ?>/assets/images/icoX.png" alt="" title="" width="9" height="10" /> Excluir</a>
								</li>
                               <?php endforeach; ?>
								<li id="msgImage"></li>
                                <?php endif; ?>														
							</ul>
                            <?php if($cont_t < 3): ?>
							<ul class="list rt clr">
								<li class="block">
									<label class="lbl3">
								        <div id="div-input-file">
								            <input name="file-original" type="file" size="30" id="file-original" onchange="document.getElementById('file-falso').value = this.value;"/>
								            <div id="div-input-falso"><input name="file-falso" type="text" id="file-falso" /></div>
								        </div>
									</label>							
								</li>
								<li class="none">
									<label class="lbl3">
								        <div id="div-input-file">
								            <input name="file-original" type="file" size="30" id="file-original" onchange="document.getElementById('file-falso').value = this.value;"/>
								            <div id="div-input-falso"><input name="file-falso" type="text" id="file-falso" /></div>
								        </div>
									</label>							
								</li>
								<li class="none">
									<label class="lbl3">
								        <div id="div-input-file">
								            <input name="file-original" type="file" size="30" id="file-original" onchange="document.getElementById('file-falso').value = this.value;"/>
								            <div id="div-input-falso"><input name="file-falso" type="text" id="file-falso" /></div>
								        </div>
									</label>							
								</li>															
							</ul>
							<span class="linkAdd clr"><img src="<?php echo ROOT; ?>/assets/images/icomais.png" alt="" title="" width="" height="" /><a style="cursor:pointer;">Adcionar mais fotografias</a></span>	
                            <?php endif; ?>
						</span>
						<hr class="bdr1" />
						<!-- Fim step 3 -->
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico4.png" alt="" title="" width="" height="" /> <span class="txt">Selecione o <b>Descritivo do Projeto: </b></span> </span>			
						<span class="infoBar"><b>Atenção:</b> Serão aceitos somente projetos em arquivos com extensão  <b>“.cad” e “.pdf”.</b></span>
						<span class="lbl2 rt">
							<label class="lbl3">
						        <div id="div-input-file">
						            <input name="file-original" type="file" size="30" id="file-original" onchange="document.getElementById('file-falso').value = this.value;"/>
						            <div id="div-input-falso"><input name="file-falso" type="text" id="file-falso" /></div>
						        </div>
						        <a href="#" class="link"><img src="<?php echo ROOT; ?>/assets/images/icoX.png" alt="" title="" width="9" height="10" /> Excluir</a>
							</label>							
						</span>		
						<!-- Fim step 4 -->
						<hr class="bdr1 clr" />
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico5.png" alt="" title="" width="" height="" /> <span class="txt">Faça o upload do <b>Modelo de Autorização</b> preenchido:</span></span>			
						<span class="lbl2 rt">
							<label class="lbl3">
						        <div id="div-input-file">
						            <input name="file-original" type="file" size="30" id="file-original" onchange="document.getElementById('file-falso').value = this.value;"/>
						            <div id="div-input-falso"><input name="file-falso" type="text" id="file-falso" /></div>
						        </div>
						        <a href="#" class="link"><img src="img/icoX.png" alt="" title="" width="9" height="10" /> Excluir</a>
							</label>								
						</span>	
						<!-- Fim step 5 -->
						<hr class="bdr1 clr" />
						<span class="lbl2">
							<input type="submit" value=" " name="" id="" class="btSalvar rt" />	
                            </form>
						</span>	
</div>
															
				</div>
				
				
            <?php 
					endforeach;	
			?>
            <form style="display:none;" action="<?php echo ROOT; ?>/projeto" method="post" class="form" id="projectForm" enctype="multipart/form-data">
            	<input type="hidden" name="id_customer" value="<?php echo $customer->id; ?>">
                <input type="hidden" name="id_category" value="<?php echo $customer->category; ?>">
                <input type="hidden" name="id_pessoa" value="<?php echo $customer->pessoa; ?>">
				<div class="Boxer2">
               <h2 class="title">
					<?php 
						// Contar o proximo projeto para incluir
						$cont_text = count($cont_arr)+1;
					?>
					<img src="<?php echo ROOT; ?>/assets/images/txt_projeto<?php echo $cont_text; ?>.png" alt="" title="" width="130" height="31" /></h2>
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico1.png" alt="" title="" width="" height="" /> <span class="txt">Fa&ccedil;a o download do <b>Modelo de Autoriza&ccedil;&atilde;o</b></span> <a href="<?php echo ROOT; ?>/download"><img src="<?php echo ROOT; ?>/assets/images/btDonwload.png" alt="" title="" width="134" height="30"></a></span>
					<hr class="bdr1" />
					<!-- Fim step 1 -->
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico2.png" alt="" title="" width="" height="" /> <span class="txt">Preencha os dados da obra</span> </span>
					<span class="lbl2">
						<label>Nome do im&oacute;vel:* </label>
						<input type="text" value="" name="nome"  id="nome" class="inpt04" />
						
					</span>	
					<span class="lbl2">
						<label>CEP: </label>
						<input type="text" value=" " name="cep"  id="cep" class="inpt03" />
						<span class="link_ipt"><a href="#"><img src="<?php echo ROOT; ?>/assets/images/seta1.png" alt="" title="" width="9" height="11" /> Buscar CEP</a></span>
						
					</span>
					<span class="lbl2">
						<label>Endere&ccedil;o Comercial:* </label>
						<input type="text" value=" " name="endereco"  id="enderco" class="inpt05" />
						
					</span>	
					<span class="lbl2">
						<label>Bairro: </label>
						<input type="text" value=" " name="bairro"  id="bairro" class="inpt04" />
						
					</span>			
					<span class="lbl2">
						<label>Cidade: </label>
						<input type="text" value=" " name="cidade"  id="cidade" class="inpt04" />
						
					</span>	
					<span class="lbl2">
						<label>Estado: </label>
						<div class="styled-select">
							<select class="inpt04Slc" name="estado" id="estado">
								<option value="">Selecione</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="SP">Rio de Janeiro</option>
							</select>
						</div>
						
					</span>	
					<span class="lbl2">
						<label>Telefone Fixo: </label>
						<input type="text" value=" " name="ddd"  id="ddd" class="inpt01" /><input type="text" value=" " name="tel"  id="tel" class="inpt02" />
					</span>	
					<span class="lbl2">
						<label>Nome da pessoa de contato:* </label>
						<input type="text" value=" " name="contato" id="contato" class="inpt04" />
						
					</span>	
					<span class="info1">* Todos os campos s&atilde;o de preenchimento obrigat&oacute;rio.</span>																			
					<hr class="bdr1" />	
					<!-- Fim step 2 -->						
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico3.png" alt="" title="" width="" height="" /> <span class="txt">Selecione at&eacute; <b>3 fotografias</b> desse projeto:</span> </span>									
					<span class="infoBar"><b>Aten&ccedil;&atilde;o:</b> Cada fotografia deve possuir o tamanho de <b>1 MB</b> (um megabyte), em <b>formato &ldquo;jpeg&rdquo;</b> com resolu&ccedil;&atilde;o de <b>300</b> dpi.</span>
					<span class="lbl2 rt">
						<ul class="list">
							<li class="block">
								<label class="lbl3 file">
							        <div id="div-input-file">
							            <input type="file" size="400" class="file-original" id="file-original1" name="fileOriginal1" onchange="document.getElementById('file-falso').value = this.value;" />
										<div id="div-input-falso"><input type="text" id="file-falso" name="file-falso"></div>
							        </div>
								</label>		
                               		
							</li>
							<li class="none">
								<label class="lbl3 file">
							        <div id="div-input-file">
							            <input type="file" size="400" class="file-original" id="file-original2" name="fileOriginal2" onchange="document.getElementById('file-falso2').value = this.value;" />
										<div id="div-input-falso"><input type="text" id="file-falso2" name="file-falso"></div>
							        </div>
								</label>							
							</li>
							<li class="none">
								<label class="lbl3 file">
							        <div id="div-input-file">
							            <input type="file" size="400" class="file-original" id="file-original3" name="fileOriginal3" onchange="document.getElementById('file-falso3').value = this.value;" />
										<div id="div-input-falso"><input type="text" id="file-falso3" name="file-falso"></div>
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
					<span class="lbl2 rt">
						<label class="lbl3 file">
					        <div id="div-input-file">
					            <input type="file" size="400" class="file-original" id="file-original4" name="fileOriginal4" onchange="document.getElementById('file-falso4').value = this.value;" />
								<div id="div-input-falso"><input type="text" id="file-falso4" name="file-falso"></div>
					        </div>
						</label>							
					</span>		
					<!-- Fim step 4 -->
					<hr class="bdr1 clr" />
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico5.png" alt="" title="" width="" height="" /> <span class="txt">Fa&ccedil;a o upload do <b>Modelo de Autoriza&ccedil;&atilde;o</b> preenchido:</span></span>			
					<span class="lbl2 rt">
						<label class="lbl3 file">
					        <div id="div-input-file">
					            <input type="file" size="400" class="file-original" id="file-original5" name="fileOriginal5" onchange="document.getElementById('file-falso5').value = this.value;" />
								<div id="div-input-falso"><input type="text" id="file-falso5" name="file-falso"></div>
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
            <?php if($projeto->counter($customer->id) < 3): ?>
            <!--add projeto -->
            <a id="addProjeto" class="add"><img src="<?php echo ROOT; ?>/assets/images/btAddP.png" alt="" title="" width="200" height="30" /></a>
            <?php endif; ?>
            <?php 
				else:
				//primeiro projeto
			?>
			<form action="<?php echo ROOT; ?>/projeto" method="post" class="form" id="projectForm" enctype="multipart/form-data">
            	<input type="hidden" name="id_customer" value="<?php echo $customer->id; ?>">
                <input type="hidden" name="id_category" value="<?php echo $customer->category; ?>">
                <input type="hidden" name="id_pessoa" value="<?php echo $customer->pessoa; ?>">
				<div class="Boxer2">
					<h2 class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_projeto.png" alt="" title="" width="130" height="31" /></h2>	
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico1.png" alt="" title="" width="" height="" /> <span class="txt">Fa&ccedil;a o download do <b>Modelo de Autoriza&ccedil;&atilde;o</b></span> <a href="<?php echo ROOT; ?>/download"><img src="<?php echo ROOT; ?>/assets/images/btDonwload.png" alt="" title="" width="134" height="30"></a></span>
					<hr class="bdr1" />
					<!-- Fim step 1 -->
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico2.png" alt="" title="" width="" height="" /> <span class="txt">Preencha os dados da obra</span> </span>
					<span class="lbl2">
						<label>Nome do im&oacute;vel:* </label>
						<input type="text" value="" name="nome"  id="nome" class="inpt04" />
						
					</span>	
					<span class="lbl2">
						<label>CEP: </label>
						<input type="text" value=" " name="cep"  id="cep" class="inpt03" />
						<span class="link_ipt"><a href="#"><img src="<?php echo ROOT; ?>/assets/images/seta1.png" alt="" title="" width="9" height="11" /> Buscar CEP</a></span>
						
					</span>
					<span class="lbl2">
						<label>Endere&ccedil;o Comercial:* </label>
						<input type="text" value=" " name="endereco"  id="enderco" class="inpt05" />
						
					</span>	
					<span class="lb2l">
						<label>Bairro: </label>
						<input type="text" value=" " name="bairro"  id="bairro" class="inpt04" />
						
					</span>			
					<span class="lbl2">
						<label>Cidade: </label>
						<input type="text" value=" " name="cidade"  id="cidade" class="inpt04" />
						
					</span>	
					<span class="lbl2">
						<label>Estado: </label>
						<div class="styled-select">
							<select class="inpt04Slc" name="estado" id="estado">
								<option value="">Selecione</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="SP">Rio de Janeiro</option>
							</select>
						</div>
						
					</span>	
					<span class="lbl2">
						<label>Telefone Fixo: </label>
						<input type="text" value=" " name="ddd"  id="ddd" class="inpt01" /><input type="text" value=" " name="tel"  id="tel" class="inpt02" />
					</span>	
					<span class="lbl2">
						<label>Nome da pessoa de contato:* </label>
						<input type="text" value=" " name="contato" id="contato" class="inpt04" />
						
					</span>	
					<span class="info1">* Todos os campos s&atilde;o de preenchimento obrigat&oacute;rio.</span>																			
					<hr class="bdr1" />	
					<!-- Fim step 2 -->						
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico3.png" alt="" title="" width="" height="" /> <span class="txt">Selecione at&eacute; <b>3 fotografias</b> desse projeto:</span> </span>									
					<span class="infoBar"><b>Aten&ccedil;&atilde;o:</b> Cada fotografia deve possuir o tamanho de <b>1 MB</b> (um megabyte), em <b>formato &ldquo;jpeg&rdquo;</b> com resolu&ccedil;&atilde;o de <b>300</b> dpi.</span>
					<span class="lbl2 rt">
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
					<span class="lbl2 rt">
						<label class="lbl3 file">
					        <div id="div-input-file">
					            <input type="file" size="400" class="file-original" id="file-original4" name="fileOriginal4">
					        </div>
						</label>							
					</span>		
					<!-- Fim step 4 -->
					<hr class="bdr1 clr" />
					<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico5.png" alt="" title="" width="" height="" /> <span class="txt">Fa&ccedil;a o upload do <b>Modelo de Autoriza&ccedil;&atilde;o</b> preenchido:</span></span>			
					<span class="lbl2 rt">
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
            <?php endif; ?>
<?php Footer(); ?>