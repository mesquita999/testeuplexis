@extends('layouts.app')

@section('content')
<div class="row bg-title phidden">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Capturar Artigos</h4>
    </div>    
</div>

<div class="row p-t-20 content-hide">
<div class="col-md-12 col-lg-12 col-sm-12">            
    <div class="row">
    	<div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
				    <label for="captura_texto" class='control-label'>Informe o texto para captura</label>
				    <input type="text" name="captura_texto" id="captura_texto" value='Gestão' value="" class="form-control">
				</div>					
            </div>

            <div class="panel-footer text-right" >
            	<button type="button" class="btn btn-primary" id='btnCapturar' >Capturar</button>
            </div>
        </div>      
    </div>
</div>
</div>
@endsection

@section('footer-script')
<script type="text/javascript">

	function mensagemErro(texto)
	{
		return '<div class="alert alert-danger message-error">' + texto + '</div>';
	}

	function salvarCaptura(arr_post)
	{
		$.ajax({
	      		url: "{{ route('artigo-post') }}",
	      		method: 'POST',
	      		data: {
	         		arr_post: arr_post,
	         		_token: '{{csrf_token()}}'
	      		},
	      		success: function(result){
	      			
	      			if(result.success)
	      			{
	      				$('.panel').parent().append('<div class="alert alert-info success-message">' + result.success + '</div>');
	      			}
	      			else if(result.error)
	      			{
	      				$('.panel').parent().append(mensagemErro('Oops, houve um erro ao salvar os artigos: ' + result.error));
	      			}
	      		},
	      		error: function(error){
	      			console.log(error);
	      			$('.panel').parent().append(mensagemErro('Oops, houve um erro ao enviar os artigos capturados: ' + result.error));
	      		}
	      	});
	}

	$('#btnCapturar').click(function(e){
   		e.preventDefault();

   		$('.message-error').remove();
   		$('#captura_texto').removeClass('has-error');
   		$('.success-message').remove();

   		if($.trim($('#captura_texto').val()) == "")
   		{
   			$('#captura_texto').parent().addClass('has-error');
   			$('#captura_texto').parent().append("<label class='message-error control-label'><small>É necessário informar o texto para captura</small></label>");
   		}
   		else
   		{
   			var arr_post = [];

	   		$.ajax({
	      		url: "https://www.uplexis.com.br/blog/",
	      		method: 'get',
	      		data: {
	         		s: $('#captura_texto').val()
	      		},
	      		success: function(result){

	      			var html = $.parseHTML(result);
	      			var post = $(html).find('.post');

	      			var titulo = "";
	      			var link   = "";

	      			$(post).each(function(i,e){

	      				if($(e).find('.title').length > 0)
	      				{
	      					titulo = $.trim($(e).find('.title').html());
	      					link = $(e).find('.btn-uplexis').attr('href');
	      					arr_post.push({titulo: titulo, link: link});
	      				}
	      			});

	      			if(arr_post.length > 0)
	      				salvarCaptura(arr_post);
	      			else
	      			{
	      				$('.panel').parent().append(mensagemErro('Oops, nenhum artigo foi capturado para o texto informado.'));
	      			}
	      		},
	      		error: function(error){
	      			$('.panel').parent().append(mensagemErro('Oops, houve um erro ao tentar capturar artigos.'));
	      			console.log(error);
	      		}
	      	});
	   	}
   	});
</script>
@endsection