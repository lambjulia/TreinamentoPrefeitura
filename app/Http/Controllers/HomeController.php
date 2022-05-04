<?php

namespace App\Http\Controllers;

use App\Audit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('welcome');
    }

    public function audit()
    {
        $audits = Audit::all();
        return View('auditoria', compact('audits'));
    }

    public function show ($id) {
        $audits = Audit::all();
        $audits = Audit::find($id);
        return view ('showaudit', compact('audits'));
    }
}
