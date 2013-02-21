// JavaScript Document
if(location.host == 'localhost')
{
	var TEMPLATE_URL = 'http://localhost/knauf/cleaneo/'
} else {
	var TEMPLATE_URL = 'http://knauf.com.br/cleaneo_teste/';
}
$(document).ready(function(){
	
	$('.signSel').click(function(){
		var value = $(this).val();
		var cat = $("#cat").val();
		$.ajax({
			type: 'POST',
			url: TEMPLATE_URL+'assets/ajax/sign_type.php',
			data: {value: value, cat: cat},
			success: function( results ){
				$('#box_cadastro').html( results );
			}
		});							 
	});	
	
	$('#formCadastro').validate({
		 rules: {
     
     name: "required",
     // compound rule
     email: {
       required: true,
       email: true
     }
   }	,
   messages:{
	  nome: "Preencher campo nome",
	  
	  email:{
		 required:"Preencher campo Email",
		 email:"Email valido"
		}
	 }
								
	});
});