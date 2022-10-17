<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\User;
use App\Departamento;
use App\Departamento_user;
use App\Protocolo;
use App\Pessoa;
use App\Acompanhamento;
use PDF;
use App\Arquivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{


    public function __construct()
    {
        $this->middleware(['AdmSistema' OR 'AdmTI']);
    }

    public function index()
    {

        $departamento = \App\Departamento::all();

        return view('departamentos/cadastrodepart', compact('departamento', $departamento));
    }


    public function store(Request $request)
    {

        $departamento = new Departamento();
        $departamento->departamento = $request->input('departamento');


        $validator = Validator::make($request->all(), [
            'departamento' => 'required',

        ], [
            'departamento.required' => 'O campo descrição é obrigatório',

        ]);

        if ($validator->fails()) {
            return redirect('cadastrodepart')
                ->withErrors($validator)
                ->withInput();
        }

        $departamento->save();



        return redirect('tabeladepart')->with('success', 'Departamento cadastrado com sucesso!');
    }

    public function tabela()
    {

        $user = User::all();
        $departamento = Departamento::all();
        return view('departamentos/tabeladepart', compact('departamento', $departamento, 'user', $user));
    }


    public function atribuir(Request $request, $id)
    {

        $id = request()->route()->parameter('id');
        error_log('teste' . $id);
        $departamento = Departamento::find($id);
        $user = User::all();
        return view('departamentos/atribuir', compact('departamento', $departamento, 'user', $user));
    }

    public function save(Request $request, $id)
    {
        $departamento_user = new Departamento_user();
        $departamento = Departamento::find($id);
        $usuario_id = $request->input('user_id');
        $usuario = User::find($usuario_id);

        $limit = $departamento->user()->where('user_id', $usuario_id)->exists();
        if ($limit) {
            return redirect()->back()->with('warning', 'Usuário já esta atribuído!');
        } else {
            $departamento->user()->attach($usuario);
            return redirect('tabeladepart')->with('success', 'Usuário atribuído com sucesso!');
        }
    }
}
