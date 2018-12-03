<h1>Formulário de Cadastro de Atendimento</h1>
<hr>

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
	<div class="container">
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	      <li>{{ $error }}</li>
	      @endforeach
	    </ul>
	  </div>
	</div>
  @endif

<form action="/atendimentos" method="post">
	{{ csrf_field() }}
	Serviço:		<select name="servico_id">
						@foreach($servicos as $s)
							<option value="{{$s->id}}">{{$s->descricao}}</option>
						@endforeach
					</select><br>
	Agendado para:  <input type="datetime-local" name="diahora_inicio">   <br>
	<input type="submit" value="Salvar">
</form>