<h1>Lista de Serviços</h1>

<!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
	<div class="container">
  		<div class="alert alert-success">
    		{{\Session::get('success')}}
  		</div>
  	</div>
  @endif


@foreach($servicos as $servico)
<p>Id: <b>{{$servico->id}}</b></p>
<p>Descrição: <b>{{$servico->descricao}}</b></p>
<p>R$ <b>{{$servico->valor}}</b></p>
<p>Tempo médio: <b>{{$servico->tempomedio}}</b></p>
<hr>
@endforeach

{{$servicos->links()}}