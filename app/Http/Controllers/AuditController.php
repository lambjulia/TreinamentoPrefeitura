<?php

namespace App\Http\Controllers;

use App\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/';
     
    public function __construct()
    {
        $this->middleware(['AdmSistema' OR 'AdmTI']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function audit()
    {
        $audits = Audit::all();
        return View('auditoria/auditoria', compact('audits'));
    }

    public function show ($id) {
        $audits = Audit::all();
        $audits = Audit::find($id);
        return view ('auditoria/showaudit', compact('audits'));
    }
}
