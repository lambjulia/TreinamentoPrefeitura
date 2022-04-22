<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest; 
use App\User;
use App\Protocolo;
use App\Pessoa;
use PDF;
use App\arquivo;
use Illuminate\Support\Facades\Auth;


class ProtocoloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
        {
        $pessoa = Pessoa::all();  
        $protocolo = Protocolo::all();
        return view('protocolo/tabelaprot', compact('pessoa', $pessoa, 'protocolo', $protocolo));
        }

        

    
     public function cadastro()
    {
        $protocolo = Protocolo::all();
        $pessoa = Pessoa::all(); 
        return view('protocolo/cadastroprot', compact('pessoa', $pessoa, 'protocolo', $protocolo));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoa = Pessoa::all();
        return view ('prot.create', ['pessoa' => $pessoa, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(Request $request)
    {       
            //dd($request);
            
            $pessoa = Pessoa::all(); 
            $protocolo= new Protocolo($request->all());
            $protocolo->descricao = $request->input('descricao');
            $protocolo->data = $request->input('data');
            $protocolo->prazo = $request->input('prazo');  
            $protocolo = Pessoa::where('id', 'pessoa_id')->first();
            
          
            $protocolo->save();

            $arquivos = new Arquivo();

            if(!is_null($request->file('arquivos'))) {
                $arquivos->arquivo = $request->file('arquivos')->store('arquivo/'.$protocolo->id);
                $arquivos->tipo = 'arquivos';
                $arquivos->protocolo_id = $protocolo->id;
                $arquivos->save();
              }

             

            return redirect('/tabelaprotocolo', compact('pessoa', 'protocolo'))->with('success','Protocolo cadastrado com sucesso!');;
    }

    public function show ($id) 
    {
        $protocolo = Protocolo::all();
        $protocolo = Protocolo::find($id);
        return view ('protocolo/showprot', ['protocolo' => $protocolo, 'id' => $id]);
    }



    public function edit($id) 
    {
       
        $protocolo = Protocolo::find($id);
      
        $pessoa = Pessoa::all();

        return view ('protocolo/editprot', compact('pessoa', 'protocolo'));
        
    }


    public function update(Request $request, $id)
    {
        
      $protocolo = Protocolo::findOrFail($id);
      $pessoa = Pessoa::all();
        $protocolo->update([
          'pessoa_id' => $request -> pessoa_id,
          'descricao' => $request -> descricao,
          'data' => $request -> data,
          'prazo' => $request -> prazo,
         

      ]);
        

        return redirect('/lista')->with('success','Protocolo editado com sucesso!');
      
        
    }

    public function delete($id)
    {
        $protocolo = protocolo::find($id);
        $protocolo->delete();
        return redirect('/tabelaprotocolo')->with('warning','Protocolo excluido com sucesso!');;
    }

    public function searchprot(){
        $search = $_GET['query'];
       $protocolo = Protocolo::where('descricao', 'LIKE', '%' .$search. '%')
       ->orWhere('data', 'LIKE', '%' .$search. '%')
       ->orWhere('pessoa_id', 'LIKE', '%' .$search. '%')
       ->orWhere('prazo', 'LIKE', '%' .$search. '%')->get();

        return view('protocolo/tabelaprot', compact('protocolo'));
    }

    public function generatePDF()
    {
        $protocolo = Protocolo::all();
        
        $pdf = PDF::loadView('pdf', compact('protocolo'))->setOptions(['defaultFont' => 'sans-serif']);
  
        return $pdf->setPaper('a4')->download('relatorio.pdf');
    }

    public function upload(Request $request) {

        $request->file('arquivo')->store('protocolos');
        var_dump($request->file('arquivo') ,$request->all);
    }
       
}
