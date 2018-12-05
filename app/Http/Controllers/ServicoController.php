<?php

namespace App\Http\Controllers;

use App\servico;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;

class servicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaservico = servico::paginate(3);   
        return view('servico.list',['servicos' => $listaservico]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servico.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'descricao.required' => 'É obrigatório uma descrição para o serviço',
            'valor.required' => 'É obrigatório um valor para o serviço',
        );
        //vetor com as especificações de validações
        $regras = array(
            'descricao' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('servicos/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_servico = new servico();
        $obj_servico->descricao =       $request['descricao'];
        $obj_servico->valor     =       $request['valor'];
        $obj_servico->tempomedio     =       $request['tempomedio'];
        $obj_servico->save();
        return redirect('/servicos')->with('success', 'Serviço criado com sucesso!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
        $servico = servico::where("id",$id)->with('serviço')->get()->first();
        return view('servico.show',['servico' => $servico]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
{
        //busco os dados do obj servico que o usuário deseja editar
        $obj_servico = servico::find($id);
        
        //verifico se o usuário logado é o dono da Atividade
        if( Auth::id() == $obj_servico->user_id ){
            //retorno a tela para edição
            return view('servico.edit',['servico' => $obj_servico]);    
        }else{
            //retorno para a rota /servico com o erro
            return redirect('/servico')->withErrors("Você não tem permissão para editar este item");
        }
           
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
 {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'servico_id.required' => 'É obrigatório um título para o serviço',
        );
        //vetor com as especificações de validações
        $regras = array(
            'servico_id' => 'required|string|max:255',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('servico/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_servico = servico::findOrFail($id);
        $obj_servico->servico_id =       $request['servico_id'];
        $obj_servico->user_id     = Auth::id();
        $obj_servico->save();
        return redirect('/servico')->with('success', 'Serviço alterado com sucesso!!');
    }
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\servico  $servico
     * @return \Illuminate\Http\Response
     */
    
    public function delete($id)
    {
        $obj_servico = servico::find($id);
        
        //verifico se o usuário logado é o dono da servico
        if( Auth::id() == $obj_servico->user_id ){
            //retorno o formulário questionando se ele tem certeza
            return view('servico.delete',['servico' => $obj_servico]);    
        }else{
            //retorno para a rota /servico com o erro
            return redirect('/servico')->withErrors("Você não tem permissão para deletar este item");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_servico = servico::findOrFail($id);
        $obj_servico->delete($id);
        return redirect('/servico')->with('sucess','Serviço excluída com Sucesso!!');
    }
}