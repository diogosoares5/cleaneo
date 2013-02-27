// JavaScript Document
if(location.host == 'localhost')
{
	var TEMPLATE_URL = 'http://localhost/knauf/cleaneo/'
} else {
	var TEMPLATE_URL = 'http://knauf.com.br/cleaneo_teste/';
}
jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);
	
	value = value.replace('.','');
	value = value.replace('.','');
	cpf = value.replace('-','');
	while(cpf.length < 11) cpf = "0"+ cpf;
	var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
	var a = [];
	var b = new Number;
	var c = 11;
	for (i=0; i<11; i++){
		a[i] = cpf.charAt(i);
		if (i < 9) b += (a[i] * --c);
	}
	if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
	b = 0;
	c = 11;
	for (y=0; y<10; y++) b += (a[y] * c--);
	if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
	
	var retorno = true;
	if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
	
	return this.optional(element) || retorno;

}, "Informe um CPF válido."); // Mensagem padrão 

jQuery.validator.addMethod("dateBR", function(value, element) {
	 //contando chars
	if(value.length!=10) return false;
	// verificando data
	var data 		= value;
	var dia 		= data.substr(0,2);
	var barra1		= data.substr(2,1);
	var mes 		= data.substr(3,2);
	var barra2		= data.substr(5,1);
	var ano 		= data.substr(6,4);
	if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
	if((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
	if(mes==2  &&  (dia>29||(dia==29 && ano%4!=0)))return false;
	if(ano < 1900)return false;
	return true;
}, "Informe uma data válida");  // Mensagem padrão 

jQuery.validator.addMethod("dateTimeBR", function(value, element) {
	 //contando chars
	if(value.length!=16) return false;
	 // dividindo data e hora
	if(value.substr(10,1)!=' ') return false; // verificando se há espaço
	var arrOpcoes = value.split(' ');
	if(arrOpcoes.length!=2) return false; // verificando a divisão de data e hora
	// verificando data
	var data 		= arrOpcoes[0];
	var dia 		= data.substr(0,2);
	var barra1		= data.substr(2,1);
	var mes 		= data.substr(3,2);
	var barra2		= data.substr(5,1);
	var ano 		= data.substr(6,4);
	if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
	if ((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
	if (mes==2  &&  (dia>29||(dia==29 && ano%4!=0)))return false;
	// verificando hora
	var horario 	= arrOpcoes[1];
	var	hora 		= horario.substr(0,2);
	var doispontos 	= horario.substr(2,1);
	var minuto 		= horario.substr(3,2);
	if(horario.length!=5||isNaN(hora)||isNaN(minuto)||hora>23||minuto>59||doispontos!=":")return false;
	return true;
}, "Informe uma data e uma hora válida");	



/*
 *
 * NOVO METODO PARA O JQUERY VALIDATE
 * VALIDA CNPJ COM 14 OU 15 DIGITOS
 * A VALIDAÇÃO É FEITA COM OU SEM OS CARACTERES SEPARADORES, PONTO, HIFEN, BARRA
 *
 * ESTE MÉTODO FOI ADAPTADO POR:
 * 
 * Shiguenori Suguiura Junior <junior@dothcom.net>
 * 
 * http://blog.shiguenori.com
 * http://www.dothcom.net
 * 
 */
jQuery.validator.addMethod("cnpj", function(cnpj, element) {
   cnpj = jQuery.trim(cnpj);
	
	// DEIXA APENAS OS NÚMEROS
   cnpj = cnpj.replace('/','');
   cnpj = cnpj.replace('.','');
   cnpj = cnpj.replace('.','');
   cnpj = cnpj.replace('-','');

   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
   digitos_iguais = 1;

   if (cnpj.length < 14 && cnpj.length < 15){
      return this.optional(element) || false;
   }
   for (i = 0; i < cnpj.length - 1; i++){
      if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
         digitos_iguais = 0;
         break;
      }
   }

   if (!digitos_iguais){
      tamanho = cnpj.length - 2
      numeros = cnpj.substring(0,tamanho);
      digitos = cnpj.substring(tamanho);
      soma = 0;
      pos = tamanho - 7;

      for (i = tamanho; i >= 1; i--){
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2){
            pos = 9;
         }
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(0)){
         return this.optional(element) || false;
      }
      tamanho = tamanho + 1;
      numeros = cnpj.substring(0,tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--){
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2){
            pos = 9;
         }
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(1)){
         return this.optional(element) || false;
      }
      return this.optional(element) || true;
   }else{
      return this.optional(element) || false;
   }
}, "Informe um CNPJ válido."); // Mensagem padrão 

jQuery.validator.addMethod("notEqual", function(value, element, param) {
   return value == $(param).val() ? false : true;
}, "Este valor não pode ser igual"); // Mensagem padrão 

jQuery.validator.addMethod("diferenteDe", function(value, element, strCompara) {
   return value == strCompara ? false : true;
}, "Este valor não foi alterado"); // Mensagem padrão 

jQuery.validator.addMethod("maiorQue", function(value, element, param) {
   return value <= $(param).val() ? false : true;
}, "Este valor precisa ser maior"); // Mensagem padrão 

jQuery.validator.addMethod("menorQue", function(value, element, param) {
   return value >= $(param).val() ? false : true;
}, "Este valor precisa ser menor"); // Mensagem padrão 
jQuery.validator.addMethod("nomeCompleto", function(nome, element){
    var fullName = nome.split(' ');
	var lastName = fullName[1];
	if(lastName){
		return true;	
	}else{
		return false;	
	}
},"Nome completo");
jQuery.validator.addMethod('validateCheckbox', function(value, element) {
  return ($('#checkIn:checked').length > 0);
});
$.validator.addMethod('filesize', function(value, element, param) {
    // param = size (en bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
});
// Accept a value from a file input based on a required mimetype
jQuery.validator.addMethod("accept", function(value, element, param) {
	// Split mime on commas in case we have multiple types we can accept
	var typeParam = typeof param === "string" ? param.replace(/\s/g, '').replace(/,/g, '|') : "image/*",
	optionalValue = this.optional(element),
	i, file;

	// Element is optional
	if (optionalValue) {
		return optionalValue;
	}

	if ($(element).attr("type") === "file") {
		// If we are using a wildcard, make it regex friendly
		typeParam = typeParam.replace(/\*/g, ".*");

		// Check if the element has a FileList before checking each file
		if (element.files && element.files.length) {
			for (i = 0; i < element.files.length; i++) {
				file = element.files[i];

				// Grab the mimtype from the loaded file, verify it matches
				if (!file.type.match(new RegExp( ".?(" + typeParam + ")$", "i"))) {
					return false;
				}
			}
		}
	}

	// Either return true because we've validated each file, or because the
	// browser does not support element.files and the FileList feature
	return true;
}, jQuery.format("Please enter a value with a valid mimetype."));

// Older "accept" file extension method. Old docs: http://docs.jquery.com/Plugins/Validation/Methods/accept
jQuery.validator.addMethod("extension", function(value, element, param) {
	param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
	return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
}, jQuery.format("Please enter a value with a valid extension."));
$(document).ready(function(){
						     
	$('.radio').click(function(){  
                     $('.radio').css('background-position','top');
                     $(this).css('background-position','bottom'); 
                     $('#valor').val($(this).attr('id'));
     });
	
	$('.linkAdd').click(function(){
		
		var ID = $(this).attr('thisID');
		if(ID){
			var q = $('#list_'+ID+' li.none').length;
			
			
			if(q > 1){
				$('#list_'+ID+' li.none:eq(0)').removeClass('none').addClass('block');
			}else if(q == 1){
				$('#list_'+ID+' li.none:eq(0)').removeClass('none').addClass('block');
				$(this).hide();
			}
		}else{
			var q = $('#list_ li.none').length;
			
			
			if(q > 1){
				$('#list_ li.none:eq(0)').removeClass('none').addClass('block');
			}else if(q == 1){
				$('#list_ li.none:eq(0)').removeClass('none').addClass('block');
				$(this).hide();
			}

		}
									  
	});
	   

	$('#scrollbar3').tinyscrollbar({ size: 480 });
	
	$('.signSel').click(function(){
		var value = $(this).val();
		if(value=='1'){
			//fisica
			$('#box_cadastro_fisica').fadeIn();
			$('#box_cadastro_juridica').hide();
		}else{
		//juridica	
			$('#box_cadastro_juridica').fadeIn();
			$('#box_cadastro_fisica').hide();
		}			 
	});
	$('#addProjeto').toggle(function(){
			$('#projectForm').slideDown();								 
		},function(){
			 $('#projectForm').slideUp();  
		}
	);
	$('.editProject').toggle(
		function(){
			var PID = $(this).attr('projID');
			$('#editar_'+PID).slideDown();					 
		},
		function(){
			var PID = $(this).attr('projID');
			$('#editar_'+PID).slideUp();	
		}
	);
	$('.delImage').click(function(){
		var valor = $(this).attr('thumbID');
		//alert(valor);
		$.ajax({
			type:"POST",
			url:TEMPLATE_URL+"delete_image.php",
			data:{tid:valor},
			success: function(results){
				$('#msgImage').html(results);	
			}
		});
	});
	$('#authForm').validate({
		rules:{
			checkIn:{
				validateCheckbox:true
			}	
		},
		messages:{
			checkIn:{
				validateCheckbox:"Por favor marque se concorda com os termos de regulamento"
			}	
		}						
	});
	$('#contactForm').validate({
		rules:{
			nome:{required:true},
			email:{
				required: true,
      		 	email: true
				},
			ddd_tel:{required:true},	
			tel:{required:true},
			msg:{required:true}
		},
		groups:{
			telNumber: 'ddd_tel tel'	
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel") 
			error.insertAfter("#tel");
		   else 
        	error.insertAfter(element);
   		},
		messages:{
			nome:{required:"Preencher o campo Nome"},
			email:{required:"Preencher o campo E-mail",email:"E-mail v&aacute;lido."},
			ddd_tel:{required:"Preencher o campo Celular"},
			tel:{required:"Preencher o campo Celular"},
			msg:{required:"Preencher o campo Mensagem"}
		}						   
	});
	
	$('#projectForm').validate({
		rules:{
			nome:{required:true},
			cep:{required:true},
			endereco:{required:true},
			bairro:{required:true},
			cidade:{required:true},
			estado:{required:true},
			ddd_tel:{required:true},
			tel:{required:true},
			contato:{required:true},
			fileOriginal1:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal2:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal3:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal4:{ accept: "application/pdf,application/acad,application/dxf"},
			fileOriginal5:{ accept: "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"}
		},
		groups:{
			telNumber: 'ddd_tel tel'	
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel") 
			error.insertAfter("#projectForm #tel");
		   else 
        	error.insertAfter(element);
   		},
		messages:{
			nome:{required:"Preencha o campo Nome"},
			cep:{required:"Preencha o campo CEP"},
			endereco:{required:"Preencha o campo Endere&ccedil;o"},
			bairro:{required:"Preencha o campo Bairro"},
			cidade:{required:"Preencha o campo Cidade"},
			estado:{required:"Preencha o campo Estado"},
			ddd_tel:{required:"Preencha o campo Telefone"},
			tel:{required:"Preencha o campo Telefone"},
			contato:{required:"Preencha o campo Contato"},
			fileOriginal1:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal2:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal3:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal4:{ accept: "Somente formato PDF ou CAD"},
			fileOriginal5:{ accept: "Somente formato DOC (Word)"}
		}						   
	});
	
		//$('#editForm_1 input, #editForm_2 input, #editForm_3 input').keypress(function(){ var valor = $(this).val(); $(this).val(valor);});
	
		$('#editForm_1').validate({
				rules:{
			nome:{required:true},
			cep:{required:true},
			endereco:{required:true},
			bairro:{required:true},
			cidade:{required:true},
			estado:{required:true},
			ddd_tel:{required:true},
			tel:{required:true},
			contato:{required:true},
			fileOriginal1:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal2:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal3:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal4:{ accept: "application/pdf,application/acad,application/dxf"},
			fileOriginal5:{ accept: "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"}
		},
		groups:{
			telNumber: 'ddd_tel tel'	
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel") 
			error.insertAfter("#editForm_1 #tel");
		   else 
        	error.insertAfter(element);
   		},
		messages:{
			nome:{required:"Preencha o campo Nome"},
			cep:{required:"Preencha o campo CEP"},
			endereco:{required:"Preencha o campo Endere&ccedil;o"},
			bairro:{required:"Preencha o campo Bairro"},
			cidade:{required:"Preencha o campo Cidade"},
			estado:{required:"Preencha o campo Estado"},
			ddd_tel:{required:"Preencha o campo Telefone"},
			tel:{required:"Preencha o campo Telefone"},
			contato:{required:"Preencha o campo Contato"},
			fileOriginal1:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal2:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal3:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal4:{ accept: "Somente formato PDF ou CAD"},
			fileOriginal5:{ accept: "Somente formato DOC (Word)"}
		}						   						 
		});	
			$('#editForm_2').validate({
				rules:{
			nome:{required:true},
			cep:{required:true},
			endereco:{required:true},
			bairro:{required:true},
			cidade:{required:true},
			estado:{required:true},
			ddd_tel:{required:true},
			tel:{required:true},
			contato:{required:true},
			fileOriginal1:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal2:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal3:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal4:{ accept: "application/pdf,application/acad,application/dxf"},
			fileOriginal5:{ accept: "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"}
		},
		groups:{
			telNumber: 'ddd_tel tel'	
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel") 
			error.insertAfter("#editForm_2 #tel");
		   else 
        	error.insertAfter(element);
   		},
		messages:{
			nome:{required:"Preencha o campo Nome"},
			cep:{required:"Preencha o campo CEP"},
			endereco:{required:"Preencha o campo Endere&ccedil;o"},
			bairro:{required:"Preencha o campo Bairro"},
			cidade:{required:"Preencha o campo Cidade"},
			estado:{required:"Preencha o campo Estado"},
			ddd_tel:{required:"Preencha o campo Telefone"},
			tel:{required:"Preencha o campo Telefone"},
			contato:{required:"Preencha o campo Contato"},
			fileOriginal1:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal2:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal3:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal4:{ accept: "Somente formato PDF ou CAD"},
			fileOriginal5:{ accept: "Somente formato DOC (Word)"}
		}						   						 
		});	
		$('#editForm_3').validate({
				rules:{
			nome:{required:true},
			cep:{required:true},
			endereco:{required:true},
			bairro:{required:true},
			cidade:{required:true},
			estado:{required:true},
			ddd_tel:{required:true},
			tel:{required:true},
			contato:{required:true},
			fileOriginal1:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal2:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal3:{ extension: "jpe?g", filesize: 1048576},
			fileOriginal4:{ accept: "application/pdf,application/acad,application/dxf"},
			fileOriginal5:{ accept: "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"}
		},
		groups:{
			telNumber: 'ddd_tel tel'	
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel") 
			error.insertAfter("#editForm_3 #tel");
		   else 
        	error.insertAfter(element);
   		},
		messages:{
			nome:{required:"Preencha o campo Nome"},
			cep:{required:"Preencha o campo CEP"},
			endereco:{required:"Preencha o campo Endere&ccedil;o"},
			bairro:{required:"Preencha o campo Bairro"},
			cidade:{required:"Preencha o campo Cidade"},
			estado:{required:"Preencha o campo Estado"},
			ddd_tel:{required:"Preencha o campo Telefone"},
			tel:{required:"Preencha o campo Telefone"},
			contato:{required:"Preencha o campo Contato"},
			fileOriginal1:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal2:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal3:{ extension: "Somente formato JPG", filesize: "Tamanho Excede 1MB"},
			fileOriginal4:{ accept: "Somente formato PDF ou CAD"},
			fileOriginal5:{ accept: "Somente formato DOC (Word)"}
		}						   						 
		});	
	
	$('#formMeuCadastro').validate({
								   
		rules: {
     
      nome:{ required:true, nomeCompleto:true},
     // compound rule
     email: {
       required: true,
       email: true
     },
	 pass:{
		required:true,
		minlength:4
	},
	repass:{
		required:true,
		equalTo:"#pass"
	},
	cpf:{
		required:true,
		cpf:true
	},
	profissao:"required",
	cep:"required",
	endereco:"required",
	complemento:"required",
	bairro:"required",
	cidade:"required",
	estado:"required",
	ddd_tel:"required",
	ddd_cel:"required",
	tel:"required",
	cel:"required",
	
   },
    groups:{
			telNumber: 'ddd_tel tel',
			celNumber: 'ddd_cel cel'
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel"){ 
			error.insertAfter("#formMeuCadastro #tel");
		   }else {
        	error.insertAfter(element);
		   }
			
			if(element.attr("name") == "ddd_cel" || element.attr("name") == "cel"){
				error.insertAfter("#formMeuCadastro #cel");
		   }else {
        	error.insertAfter(element);
		   }
   		},
   messages:{
	 nome:{ required:"Preencher campo nome", nomeCompleto:"Nome completo"},
	  
	  email:{
		 required:"Preencher campo Email",
		 email:"Email valido"
		},
	  pass:{
		required:"Preencher senha",
		minlength:"M&iacute;nimo de 4 caracteres"
	},
	repass:{
		required:"Preencher conrfima&ccedil;&atilde;o de senha",
		equalTo:"Mesmo valor que o campo senha"
	},
	cpf:{
		required:"Preencher CPF",
		cpf:"CPF valido"
	},
	profissao:"Preencher profissao",
	cep:"Preencher CEP",
	endereco:"Preencher endereco",
	complemento:"Preencher complemento",
	bairro:"Preencher bairro",
	cidade:"Preencher cidade",
	estado:"Preencher estado",
	ddd_tel:"Preencher telefone",
	ddd_cel:"Preencher celular",
	tel:"Preencher telefone",
	cel:"Preencher celular",
	
	
   }
								
	});
	$('#formCadastroFisica').validate({

		rules: {
     
     nome:{ required:true, nomeCompleto:true},
     // compound rule
     email: {
       required: true,
       email: true
     },
	 pass:{
		required:true,
		minlength:4
	},
	repass:{
		required:true,
		equalTo:"#pass"
	},
	cpf:{
		required:true,
		cpf:true
	},
	profissao:"required",
	cep:"required",
	endereco:"required",
	complemento:"required",
	bairro:"required",
	cidade:"required",
	estado:"required",
	ddd_tel:"required",
	ddd_cel:"required",
	tel:"required",
	cel:"required"
	
   },
   groups:{
			telNumber: 'ddd_tel tel',
			celNumber: 'ddd_cel cel'
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel"){ 
			error.insertAfter("#formCadastroFisica #tel");
		   }
		   else if(element.attr("name") == "ddd_cel" || element.attr("name") == "cel"){
			   error.insertAfter("#formCadastroFisica #cel");
			}
		   else {
        	error.insertAfter(element);
		   }
		
   		},
   messages:{
	  nome:{ required:"Preencher campo nome", nomeCompleto:"Nome completo"},
	  email:{
		 required:"Preencher campo Email",
		 email:"Email valido"
		},
	  pass:{
		required:"Preencher senha",
		minlength:"M&iacute;nimo de 4 caracteres"
	},
	repass:{
		required:"Preencher conrfima&ccedil;&atilde;o de senha",
		equalTo:"Mesmo valor que o campo senha"
	},
	cpf:{
		required:"Preencher CPF",
		cpf:"CPF valido"
	},
	profissao:"Preencher profissaO",
	cep:"Preencher CEP",
	endereco:"Preencher endereco",
	complemento:"Preencher complemento",
	bairro:"Preencher bairro",
	cidade:"Preencher cidade",
	estado:"Preencher estado",
	ddd_tel:"Preencher telefone",
	ddd_cel:"Preencher celular",
	tel:"Preencher telefone",
	cel:"Preencher celular"
   }
								
	});
	$('#formCadastroJuridica').validate({

		rules: {
     
      nome:{ required:true, nomeCompleto:true},
     // compound rule
     email: {
       required: true,
       email: true
     },
	 pass:{
		required:true,
		minlength:4
	},
	repass:{
		required:true,
		equalTo:"#pass"
	},
	cpf:{
		required:true,
		cpf:true
	},
	profissao:"required",
	cep:"required",
	endereco:"required",
	complemento:"required",
	bairro:"required",
	cidade:"required",
	estado:"required",
	ddd_tel:"required",
	ddd_cel:"required",
	tel:"required",
	cel:"required",
	cnpj:{
		required:true,
		cnpj:true
	},
	fantasia:"required",
	razao:"required"
	
   },
    groups:{
			telNumber: 'ddd_tel tel',
			celNumber: 'ddd_cel cel'
		},
		errorPlacement: function(error, element) {
		   if (element.attr("name") == "ddd_tel" || element.attr("name") == "tel"){ 
			error.insertAfter("#formCadastroJuridica #tel");
		   }else if(element.attr("name") == "ddd_cel" || element.attr("name") == "cel"){
			   error.insertAfter("#formCadastroJuridica #cel");
			}
		   else {
        	error.insertAfter(element);
		   }
			
   		},
   messages:{
	 nome:{ required:"Preencher campo nome", nomeCompleto:"Nome completo"},
	  
	  email:{
		 required:"Preencher campo Email",
		 email:"Email valido"
		},
	  pass:{
		required:"Preencher senha",
		minlength:"M&iacute;nimo de 4 caracteres"
	},
	repass:{
		required:"Preencher conrfima&ccedil;&atilde;o de senha",
		equalTo:"Mesmo valor que o campo senha"
	},
	cpf:{
		required:"Preencher CPF",
		cpf:"CPF valido"
	},
	profissao:"Preencher profissao",
	cep:"Preencher CEP",
	endereco:"Preencher endereco",
	complemento:"Preencher complemento",
	bairro:"Preencher bairro",
	cidade:"Preencher cidade",
	estado:"Preencher estado",
	ddd_tel:"Preencher telefone",
	ddd_cel:"Preencher celular",
	tel:"Preencher telefone",
	cel:"Preencher celular",
	cnpj:{
		required:"Preencher CNPJ",
		cnpj:"CNPJ valido"
	},
	fantasia:"Preencher Nome Fantasia",
	razao:"Preencher Raz&atilde;o Social"
	
   }
								
	});
});
