<?php

namespace App\Http\Controllers\Bludata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



use App\Models\Empresa;


class EmpresaController extends Controller
{
    public function index()
    {
        $dados = Empresa::all();
        return view('bludata.empresas.list')->with(['dados' => $dados]);
    }

    public function create()
    {
        return view('bludata.empresas.form');
    }

    public function store(Request $request)
    {
        Empresa::create($request->all());
        return redirect()->route('empresa.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $dados = Empresa::find($id);
        return view('bludata.empresas.form')->with(['dados' => $dados]);
    }

    public function update(Request $request, $id)
    {
        $edit = Empresa::find($id);
        $edit->update($request->all());
        return redirect()->route('empresa.index');
    }

    public function destroy($id)
    {
        $dados = Empresa::find($id);
        $dados->delete();
        return redirect()->route('empresa.index');
    }
}
