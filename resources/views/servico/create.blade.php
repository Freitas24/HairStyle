<h1>Formulário de Cadastro de Serviço</h1>
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

<form action="/servicos" method="post">
	{{ csrf_field() }}
	Descrição: <input type="text" name="descricao"><br>
	Tempo Médio:  <input type="text" name="tempomedio">   <br>
	Valor total:  <input type="text" name="valor">   <br>
	<input type="submit" value="Salvar">
</form>