<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest; 
use App\User;
use App\Protocolo;
use App\Pessoa;
use PDF;


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
        return view ('prot.create', compact("pessoa"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(Request $request)
    {
            $protocolo= new Protocolo();
            $protocolo->contribuinte = $request->input('contribuinte');
            $protocolo->descricao = $request->input('descricao');
            $protocolo->data = $request->input('data');
            $protocolo->prazo = $request->input('prazo');

           
        
            $protocolo->save();

            return redirect('/tabelaprotocolo')->with('success','Protocolo cadastrado com sucesso!');;
    }

    public function show ($numeroprot) 
    {
        $protocolo = Protocolo::all();
        $protocolo = Protocolo::find($numeroprot);
        return view ('protocolo/showprot', ['protocolo' => $protocolo, 'numeroprot' => $numeroprot]);
    }



    public function edit($numeroprot) 
    {
       
        $protocolo = Protocolo::find($numeroprot);
      
        $pessoa = Pessoa::all();

        return view ('protocolo/editprot', compact('pessoa', 'protocolo'));
        
    }


    public function update(Request $request, $numeroprot)
    {
        
      $protocolo = Protocolo::findOrFail($numeroprot);
      $pessoa = Pessoa::all();
        $protocolo->update([
          'contribuinte' => $request -> contribuinte,
          'descricao' => $request -> descricao,
          'data' => $request -> data,
          'prazo' => $request -> prazo,
         

      ]);
        

        return redirect('/lista')->with('success','Protocolo editado com sucesso!');
      
        
    }

    public function delete($numeroprot)
    {
        $protocolo = protocolo::find($numeroprot);
        $protocolo->delete();
        return redirect('/tabelaprotocolo')->with('warning','Protocolo excluido com sucesso!');;
    }

    public function searchprot(){
        $search = $_GET['query'];
       $protocolo = Protocolo::where('descricao', 'LIKE', '%' .$search. '%')
       ->orWhere('data', 'LIKE', '%' .$search. '%')
       ->orWhere('contribuinte', 'LIKE', '%' .$search. '%')
       ->orWhere('prazo', 'LIKE', '%' .$search. '%')->get();

        return view('protocolo/tabelaprot', compact('protocolo'));
    }

    public function generatePDF()
    {
        $protocolo = Protocolo::all();
        
        $pdf = PDF::loadView('pdf', compact('protocolo'))->setOptions(['defaultFont' => 'sans-serif']);
  
        return $pdf->setPaper('a4')->stream('relatorio.pdf');
    }
}