@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista Empresas</span>  
                    <a class="btn btn-sm btn-success" style="float: right; color:#fff;" href="{{route('empresa.create')}}"> + Cadastrar nova empresa</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                CNPJ
                            </th>
                            <th>
                                UF
                            </th>
                            <th>
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
                                    {{$dado->cnpj}}
                                </td>
                                <td>
                                    {{$dado->UF}}
                                </td>
                                <td></td>
                                <td style="">
                                    <a href="{{route('empresa.edit', $dado->id)}}" class="btn btn-sm btn-primary">Visualizar</a>
                                    <a href="{{route('empresa.edit', $dado->id)}}" class="btn btn-sm" style="background-color:#ffa600; color:#fff;">Editar</a>
                                    <a href="{{route('empresa.destroy', $dado->id)}}" class="btn btn-sm btn-danger">Deletar</a>
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
