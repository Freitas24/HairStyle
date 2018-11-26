<h1>Lista de Atendimentos</h1>

@foreach($atendimentos as $atendimento)
<p>Id: <b>{{$atendimento->id}}</b></p>
<p>Data e Hora de Início: <b>{{\Carbon\Carbon::parse($atendimento->diahora_inicio)->format('d/m/Y h:m')}}</b></p>
<p>Data e Hora Final: <b>{{\Carbon\Carbon::parse($atendimento->diahora_final)->format('d/m/Y h:m')}}</b></p>
<p>Cliente: <b>{{$atendimento->user->name}}</b></p>
<p>Descrição: <b>{{$atendimento->servico->descricao}}</b></p>
<p>R$ <b>{{$atendimento->servico->valor}}</b></p>
<p>Tempo médio: <b>{{$atendimento->servico->tempomedio}}</b></p>
<hr>
@endforeach