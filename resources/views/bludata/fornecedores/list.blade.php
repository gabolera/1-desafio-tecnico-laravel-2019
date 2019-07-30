@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista Fornecedores</span>  
                    <a class="btn btn-sm btn-success" style="float: right; color:#fff;" href="{{route('fornecedor.create')}}"> + Cadastrar novo Fornecedor</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Nome Fornecedor
                            </th>
                            <th>
                                CNPJ/CPF
                            </th>
                            <th>
                                Nome Empresa
                            </th>
                            <th>
                                    UF
                                </th>
                                <th>
                                        Ações
                                    </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($dados as $dado)
                            <tr>
                                <td>
                                    {{$dado->nome}}
                                </td>
                                <td>
                                    {{$dado->cpfj}}
                                </td>
                                <td>
                                    {{$dado->empresa->nome}}
                                </td>
                                <td>
                                    {{$dado->empresa->UF}}
                                </td>
                                <td>
                                    <a href="{{route('fornecedor.edit', $dado->id)}}" class="btn btn-sm btn-primary">Visualizar</a>                                    
                                    <a href="{{route('fornecedor.edit', $dado->id)}}" class="btn btn-sm" style="background-color:#ffa600; color:#fff;">Editar</a>
                                    <a href="{{route('fornecedor.destroy', $dado->id)}}" class="btn btn-sm btn-danger">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
