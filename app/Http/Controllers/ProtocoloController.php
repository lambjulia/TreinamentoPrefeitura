<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest; 
use App\User;
use App\Protocolo;
use App\Pessoa;
use App\Acompanhamento;
use PDF;
use App\Arquivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
            
            $pessoa = Pessoa::find($request->input('pessoa_id')); 
            $protocolo= new Protocolo($request->all());
            $protocolo->descricao = $request->input('descricao');
            $protocolo->data = $request->input('data');
            $protocolo->prazo = $request->input('prazo');  
            $protocolo->pessoa()->associate($pessoa);
            
            $validator = Validator::make($request->all(), [
                'descricao' => 'required',
                'data' => 'required',
                'prazo' => 'required',
                
    

            ], [
                'descricao.required'=>'O campo descrição é obrigatório',
                'data.unique'=>'O campo data é obrigatório',
                'prazo.required' => 'O campo prazo é obrigatório',
                
            ]);

            if ($validator->fails()) {
                return redirect('cadastroprotocolo')
                            ->withErrors($validator)
                            ->withInput();
            }
          
            $protocolo->save();


              if(!empty($request->allFiles()['arquivo'])){
                for($i = 0; $i <count($request->allFiles()['arquivo']); $i++){
                   $arquivo = $request->allFiles()['arquivo'][$i];

                   $anexos = new Arquivo();
                   $anexos->tipo = 'arquivo';
                   $anexos->protocolo_id = $protocolo->id;
                   $anexos->arquivo = $arquivo->store('arquivos/'.$protocolo->id);
                   //$anexos->nomeanexo = $arquivo->getClientOriginalName();
                   $anexos->save();
                }
               }
             

            return redirect('/tabelaprotocolo')->with('success','Protocolo cadastrado com sucesso!');
    }

    public function show ($id) 
    {
        $user = User::all();
        $acompanhamento = Acompanhamento::all();
        $arquivos = Arquivo::find($id);
        $protocolo = Protocolo::find($id);
        return view ('protocolo/showprot', ['protocolo' => $protocolo, 'id' => $id, 'acompanhamento' => $acompanhamento, 'user' => $user]);
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
        
        $pdf = PDF::loadView('pdf', compact('protocolo'));
  
        return $pdf->setPaper('a4')->download('relatorio.pdf');
    }

    public function upload(Request $request) {

        $request->file('arquivo')->store('protocolos');
        var_dump($request->file('arquivo') ,$request->all);
    }
       
   public function acomp(Request $request, $id) {

        $id = request()->route()->parameter('id');
        error_log('teste'.$id);
        $acompanhamento = Acompanhamento::all();
        $user = User::all();
        $protocolo = Protocolo::find($id); 
        return view('protocolo/acompanhamento', compact('acompanhamento', $acompanhamento, 'user', $user, 'protocolo', $protocolo));
   }

   public function storeacomp(Request $request, $id) {

    
    error_log('teste'.$id);
    $protocolo = Protocolo::find($id);
    $acompanhamento= new Acompanhamento($request->all());
    $acompanhamento->descricao = $request->input('descricao');
    $acompanhamento->data = $request->input('data');
    $acompanhamento->protocolo()->associate($protocolo);

    $acompanhamento->save();

    return redirect('/tabelaprotocolo')->with('success','Protocolo cadastrado com sucesso!');
   }

   public function onegeneratePDF($id)
   {
       $protocolo = Protocolo::find($id);
       $pessoa = Pessoa::all();
       $pdf = PDF::loadView('pdfunico', compact('protocolo', 'pessoa'));
 
       return $pdf->setPaper('a4')->download('relatorio.pdf');
   }
}
