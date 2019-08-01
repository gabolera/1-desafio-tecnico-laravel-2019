<?php

namespace App\Http\Controllers\Bludata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Empresa;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{

    public function index()
    {
        $dados = Fornecedor::all();
        return view('bludata.fornecedores.list')->with(['dados' => $dados]);
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('bludata.fornecedores.form')->with(['empresas' => $empresas]);
    }

    public function store(Request $request)
    {
        $autorizado = 1;
        if($request->is_cnpj == '0'){
            $empresa = Empresa::find($request->empresa_id);
            if($empresa->UF == 'PR'){
                $verify = strtotime(Carbon::now()->subYears(18)->format('d-m-Y'))-strtotime($request->nasc);
                if($verify >= 0){
                }else{
                    $autorizado = 0;
                }
            }else{
            }
        }else{
        }
        if($autorizado == 1){
            $dados = new Fornecedor;
            $dados->empresa_id = $request->empresa_id;
            $dados->is_cnpj = $request->is_cnpj;
            $dados->cpfj = $request->cpfj;
            $dados->RG = $request->RG;
            $dados->nome = $request->nome;
            $dados->nasc = $request->nasc;
            $dados->telefone = json_encode($request->array);
            $dados->save();
        }else{
            $erro = 'USUÁRIO MENOR DE IDADE PARA ESSE ESTADO';
            return redirect()->route('fornecedor.index')->with(['erro' => $erro]);
        }
        return redirect()->route('fornecedor.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $empresas = Empresa::all();
        $dados = Fornecedor::find($id);
        $telefones = json_decode($dados->telefone);
        return view('bludata.fornecedores.form')->with(['dados' => $dados, 'empresas' => $empresas, 'telefones' => $telefones]);
    }

    public function update(Request $request, $id)
    {
        $autorizado = 1;
        if($request->is_cnpj == '0'){
            $empresa = Empresa::find($request->empresa_id);
            if($empresa->UF == 'PR'){
                $verify = strtotime(Carbon::now()->subYears(18)->format('d-m-Y'))-strtotime($request->nasc);
                if($verify >= 0){
                }else{
                    $autorizado = 0;
                }
            }else{
            }
        }else{
        }
        if($autorizado == 1){
            $edit = Fornecedor::find($id);
            $edit->empresa_id = $request->empresa_id;
            $edit->is_cnpj = $request->is_cnpj;
            $edit->cpfj = $request->cpfj;
            $edit->RG = $request->RG;
            $edit->nome = $request->nome;
            $edit->telefone = json_encode($request->array);
            $edit->update();
        }else{
            $erro = 'USUÁRIO MENOR DE IDADE PARA ESSE ESTADO';
            return redirect()->route('')->with(['erro' => $erro]);
        }
        return redirect()->route('fornecedor.index');
    }
    

    public function destroy($id)
    {
        $dados = Fornecedor::find($id);
        $dados->delete();
        return redirect()->route('fornecedor.index');
    }

    public function busca(request $request)
    {
        $pesquisa = $request->q;
        $dados = Fornecedor::where('nome', 'LIKE', '%'.$pesquisa.'%')->orwhere('cpfj', 'LIKE', '%'.$pesquisa.'%')->get();
        return view('bludata.fornecedores.list')->with(['dados' => $dados]);
    }
}
