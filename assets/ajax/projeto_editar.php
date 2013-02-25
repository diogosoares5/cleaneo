<?php 
	require("../../config.php");
	//include("../../controller/projectController.php");
	$pid = $_POST['pid'];
?>
<div class="editar">	
						<hr class="bdr2" />
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico1.png" alt="" title="" width="" height="" /> <span class="txt">Faça o download do <b>Modelo de Autorização</b></span> <a href="#"><img src="<?php echo ROOT; ?>/assets/images/btDonwload.png" alt="" title="" width="134" height="30"></a></span>
						<hr class="bdr1" />
						<!-- Fim step 1 -->
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico2.png" alt="" title="" width="" height="" /> <span class="txt">Preencha os dados da obra</span> </span>
						<span class="lbl2">
							<label>Nome do imóvel:* </label>
							<input type="text" value=" "  id="" class="inpt04" />
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>	
						<span class="lbl2">
							<label>CEP: </label>
							<input type="text" value=" "  id="" class="inpt03" />
							<span class="link_ipt"><a href="#"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" /> Buscar CEP</a></span>
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>
						<span class="lbl2">
							<label>Endereço Comercial:* </label>
							<input type="text" value=" "  id="" class="inpt05" />
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>	
						<span class="lbl2">
							<label>Bairro: </label>
							<input type="text" value=" "  id="" class="inpt04" />
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>			
						<span class="lbl2">
							<label>Cidade: </label>
							<input type="text" value=" "  id="" class="inpt04" />
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
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
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>	
						<span class="lbl2">
							<label>Telefone Fixo: </label>
							<input type="text" value=" "  id="" class="inpt01" /><input type="text" value=" "  id="" class="inpt02" /><span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>	
						<span class="lbl2">
							<label>Nome da pessoa de contato:* </label>
							<input type="text" value=" "  id="" class="inpt04" />
							<span class="error"><b>X</b> Favor digitar bla bla bla</span>
						</span>	
						<span class="info1">* Todos os campos são de preenchimento obrigatório.</span>																			
						<hr class="bdr1" />	
						<!-- Fim step 2 -->						
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico3.png" alt="" title="" width="" height="" /> <span class="txt">Selecione até <b>3 fotografias</b> desse projeto:</span> </span>									
						<span class="infoBar"><b>Atenção:</b> Cada fotografia deve possuir o tamanho de <b>1 MB</b> (um megabyte), em <b>formato “jpeg”</b> com resolução de <b>300</b> dpi.</span>
						<span class="lbl2">
							<ul class="listThumb">	
								<li>
									<img src="<?php echo ROOT; ?>/assets/images/thumbP.png" alt="" title="" />
									<a href="#" class="link"><img src="<?php echo ROOT; ?>/assets/images/icoX.png" alt="" title="" width="9" height="10" /> Excluir</a>
								</li>
								<li>
									<img src="<?php echo ROOT; ?>/assets/images/thumbP.png" alt="" title="" />
									<a href="#" class="link"><img src="<?php echo ROOT; ?>/assets/images/icoX.png" alt="" title="" width="9" height="10" /> Excluir</a>
								</li>
								<li class="last">
									<img src="<?php echo ROOT; ?>/assets/images/thumbP.png" alt="" title="" />
									<a href="#" class="link"><img src="<?php echo ROOT; ?>/assets/images/icoX.png" alt="" title="" width="9" height="10" /> Excluir</a>
								</li>																
							</ul>
							<ul class="list clr">
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
							<span class="linkAdd clr"><img src="<?php echo ROOT; ?>/assets/images/icomais.png" alt="" title="" width="" height="" /><a href="#">Adcionar mais fotografias</a></span>	
						</span>
						<hr class="bdr1" />
						<!-- Fim step 3 -->
						<span class="step"><img src="<?php echo ROOT; ?>/assets/images/ico4.png" alt="" title="" width="" height="" /> <span class="txt">Selecione o <b>Descritivo do Projeto: </b></span> </span>			
						<span class="infoBar"><b>Atenção:</b> Serão aceitos somente projetos em arquivos com extensão  <b>“.cad” e “.pdf”.</b></span>
						<span class="lbl2">
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
						<span class="lbl2">
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
						</span>	
</div>
					