
function buscaCep(cep=null){

	if (cep!=null){
		var url = "https://viacep.com.br/ws/"+cep+"/json/";
		$(document).ready(function(){
			$.get(url,function(data){
				$('#cep').val(data.cep);
				$('#endereco').val(data.logradouro);
				$('#bairro').val(data.bairro);
				$('#cidade').val(data.localidade);
				$('#estado').val(data.uf);
			}).fail(function(){
				alert('cep inválido');
			})
		})
		
	}
}

