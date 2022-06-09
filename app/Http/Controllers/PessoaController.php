<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use View;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Validator;
use LaravelLegends\PtBrValidator\Rules\Cpf;
use Illuminate\Support\Facades\Auth;

use App\Pessoa;

class PessoaController extends Controller
{

    public function index()
    {
        $pessoa = \App\Pessoa::all();

        return view('pessoa/tabela', compact('pessoa', $pessoa));
    }


    public function cadastro()
    {
        return view('pessoa/cadastro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoa/cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(Request $request)
    {

        $cpfSanitizado  = str_replace(array('.', '-'), '', $request->input('cpf'));
        $pessoa = new Pessoa();
        $pessoa->nome = $request->input('nome');
        $pessoa->data_de_nascimento = $request->input('data_de_nascimento');
        $pessoa->cpf = $cpfSanitizado;
        $pessoa->sexo = $request->input('sexo');
        $pessoa->cidade = $request->input('cidade');
        $pessoa->bairro = $request->input('bairro');
        $pessoa->rua = $request->input('rua');
        $pessoa->numero = $request->input('numero');
        $pessoa->complemento = $request->input('complemento');

        $validator = Validator::make($request->all(), [
            'nome' => ['required'],
            'data_de_nascimento' => ['required'],
            'cpf' => ['required', 'unique:pessoas', 'cpf'],
            'sexo' => ['required'],


        ], [
            'cpf.cpf' => 'CPF inválido',
            'cpf.unique' => 'CPF ja cadastrado.',
            'nome.required' => 'O campo nome é obrigatório',
            'data_de_nascimento.required' => 'O campo data de nascimento é obrigatório',
            'sexo.required' => 'O campo sexo é obrigatório',
        ]);

        if ($validator->fails()) {
            return redirect('cadastro')
                ->withErrors($validator)
                ->withInput();
        }

        $pessoa->save();


        return redirect('/tabela')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function show($id)
    {
        $pessoa = Pessoa::all();
        $pessoa = Pessoa::find($id);
        return view('pessoa/show', ['pessoa' => $pessoa]);
    }



    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa/edit', ['pessoa' => $pessoa]);
    }


    public function update(Request $request, $id)
    {

        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update([
            'nome' => $request->nome,
            'data_de_nascimento' => $request->data_de_nascimento,
            'cpf' => $request->cpf,
            'sexo' => $request->sexo,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,

        ]);


        return redirect('tabela')->with('success', 'Pessoa editada com sucesso!');
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }

    public function delete($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();
        return redirect('tabela')->with('warning', 'Pessoa excluida com sucesso!');
    }

    public function search()
    {
        $search = $_GET['query'];
        $pessoa = Pessoa::where('nome', 'LIKE', '%' . $search . '%')->orWhere('cpf', 'LIKE', '%' . $search . '%')
            ->orWhere('data_de_nascimento', 'LIKE', '%' . $search . '%')
            ->orWhere('cpf', 'LIKE', '%' . $search . '%')
            ->orWhere('sexo', 'LIKE', '%' . $search . '%')
            ->orWhere('cidade', 'LIKE', '%' . $search . '%')
            ->orWhere('bairro', 'LIKE', '%' . $search . '%')
            ->orWhere('rua', 'LIKE', '%' . $search . '%')
            ->orWhere('numero', 'LIKE', '%' . $search . '%')
            ->orWhere('complemento', 'LIKE', '%' . $search . '%')->get();

        return view('pessoa/tabela', compact('pessoa'));
    }
}
