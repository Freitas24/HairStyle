<?php

namespace App\Http\Controllers;

use App\atendimento;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;

class atendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checa se o usuário está cadastrado
        if( Auth::check() ){   
            //retorna somente os atendimento cadastradas pelo usuário cadastrado
            $listaatendimento = atendimento::where('user_id', Auth::id() )
                                                ->with(['User','servico'])
                                                ->paginate(3);     
        }else{
            //retorna todas os atendimento
            $listaatendimento = atendimento::with(['User','servico'])
                                                ->paginate(3);
        }

        return view('atendimento.list',['atendimentos' => $listaatendimento]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atendimento.create');
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
            'atendimento_id.required' => 'É obrigatório um título para o atendimento',
            'diahora.required' => 'É obrigatório o cadastro da data/hora do atendimento',
        );
        //vetor com as especificações de validações
        $regras = array(
            'atendimento_id' => 'required|string|max:255',
            'diahora' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('atendimento/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_atendimento = new atendimento();
        $obj_atendimento->servico_id =       $request['servico_id'];
        $obj_atendimento->diahora = $request['diahora'];
        $obj_atendimento->user_id     = Auth::id();
        $obj_atendimento->save();
        return redirect('/atendimento')->with('success', 'Atendimento criado com sucesso!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
        $atendimento = atendimento::where("id",$id)->with('servico')->get()->first();
        return view('atendimento.show',['atendimento' => $atendimento]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
{
        //busco os dados do obj atendimento que o usuário deseja editar
        $obj_atendimento = atendimento::find($id);
        
        //verifico se o usuário logado é o dono da Atividade
        if( Auth::id() == $obj_atendimento->user_id ){
            //retorno a tela para edição
            return view('atendimento.edit',['atendimento' => $obj_atendimento]);    
        }else{
            //retorno para a rota /atendimento com o erro
            return redirect('/atendimento')->withErrors("Você não tem permissão para editar este item");
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
            'atendimento_id.required' => 'É obrigatório um título para o atendimento',
            'diahora.required' => 'É obrigatório o cadastro da data/hora do atendimento',
        );
        //vetor com as especificações de validações
        $regras = array(
            'atendimento_id' => 'required|string|max:255',
            'diahora' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('atendimento/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_atendimento = atendimento::findOrFail($id);
        $obj_atendimento->atendimento_id =       $request['atendimento_id'];
        $obj_atendimento->diahora = $request['diahora'];
        $obj_atendimento->user_id     = Auth::id();
        $obj_atendimento->save();
        return redirect('/atendimento')->with('success', 'Atendimento alterado com sucesso!!');
    }
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\atendimento  $atividade
     * @return \Illuminate\Http\Response
     */
    
    public function delete($id)
    {
        $obj_atendimento = atendimento::find($id);
        
        //verifico se o usuário logado é o dono da atendimento
        if( Auth::id() == $obj_atendimento->user_id ){
            //retorno o formulário questionando se ele tem certeza
            return view('atendimento.delete',['atendimento' => $obj_atendimento]);    
        }else{
            //retorno para a rota /atendimento com o erro
            return redirect('/atendimento')->withErrors("Você não tem permissão para deletar este item");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\atendimento  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_atendimento = atendimento::findOrFail($id);
        $obj_atendimento->delete($id);
        return redirect('/atendimento')->with('sucess','Atendimento excluída com Sucesso!!');
    }
}

