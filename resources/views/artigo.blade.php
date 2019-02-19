@extends('layouts.app')

@section('content')
<div class="row bg-title phidden">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Lista de Artigos</h4>
    </div>    
</div>

<div class="row p-t-20 content-hide">
<div class="col-md-12 col-lg-12 col-sm-12">            
    <div class="row">
		<div class='white-box'>
			@if (count($artigos) > 0)
		        <div class='table-responsive'>
		            <table class='table table-striped'>
		            	<thead>
		                  	<tr>
		                    	<th>Artigo</th>
		                    	<th>Link</th>
		                    	<th>Deletar</th>
		                  	</tr>
		                </thead>
		                <tbody>     
						 	
						    @foreach ($artigos as $artigo)
							    <tr>
								    <td><a href="{{ $artigo->link }}" target="_blank">{{ $artigo->titulo }}</a></td>
								    <td><a href="{{ $artigo->link }}" target="_blank">{{ $artigo->link }}</a></td>
								    <td><img src="{{ asset('img/delete.png') }}" alt="deletar" data-key='{{ $artigo->id }}' class='del-artigo' width="20px" style='cursor:pointer;border:none;' /></td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			@else
				<div class='alert alert-danger'>Nenhum artigo encontrado</div>
			@endif
		</div>     
    </div>
</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id='deletar-artigo'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2>Deseja deletar o artigo?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="$('#delete-form').submit();">Sim</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>
<form id="delete-form" action="" method="POST" style="display: none;">
	<input type='text' name='id_artigo' id='id_artigo' value='' />
    {{ csrf_field() }}
</form>
@endsection

@section('footer-script')
	<script type="text/javascript">

		$('.del-artigo').click(function(e){
			var id = $(this).attr('data-key');
			$('#id_artigo').val(id);

			var url_delete = "{{ route('artigo-del', 'id_artigo') }}";
			url_delete = url_delete.replace('id_artigo', id);

			$('#delete-form').attr('action', url_delete);

			$('#deletar-artigo').modal('show');
		});
	</script>

@endsection