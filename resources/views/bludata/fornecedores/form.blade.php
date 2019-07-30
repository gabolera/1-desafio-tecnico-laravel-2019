@extends('layouts.app')

@section('content')
<style>
.nasc{
    display: none;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{isset($dados->id) ? 'Atualizar fornecedor' : 'Cadastrar nova fornecedor'}}
                <a href="{{route('fornecedor.index')}}" class="btn btn-sm btn-secondary" style="float: right;"> << Cancelar </a>
                </div>

                <div class="card-body">
                    <form action="{{isset($dados->id) ? route('fornecedor.update', $dados->id) : route('fornecedor.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label> Empresa </label>
                            <select name="empresa_id" class="custom-select">
                                <option value="" disabled selected> SELECIONE UMA EMPRESA </option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{$empresa->id}}" {{isset($dados->empresa_id) ? ($empresa->id == $dados->empresa_id) ? 'selected' : '' : '' }}>{{$empresa->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Nome </label>
                            <input type="text" class="form-control" name="nome" value="{{isset($dados->nome) ? $dados->nome : '' }}">
                        </div>
                        <div class="form-group">
                            <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_cnpj" id="Radios1" value="1" checked/>
                                    <label class="form-check-label" for="Radios1">
                                        CNPJ
                                    </label>
                                </div>
                            
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_cnpj" id="Radios2" value="0"/>
                                    <label class="form-check-label" for="Radios2">
                                        CPF
                                    </label>
                                </div>
                            <input type="number" class="form-control" name="cpfj" value="{{isset($dados->cpfj) ? $dados->cpfj : '' }}">
                        </div>
                        <div class="nasc">
                            <div class="form-group">
                                <label for="">Data Nascimento</label>
                                <input type="date" class="form-control" name="nasc" id="">
                                <label for="">RG</label>
                                <input type="number" class="form-control" name="RG">
                            </div>
                        </div>
                        <table id="myTable" class="table order-list card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width:45%">Telefone</th>
                                    <th style="width:45%">Tipo telefone</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            @if(isset($telefones))
                            @php $count = 0; @endphp
                            @foreach ($telefones as $telefone)
                            <tr>
                                <td>
                                    <input name="array[{{$count}}][telefone]" type="text" class="form-control telefones"
                                        placeholder="(00) 00000-0000" value="{{$telefone->telefone}}">
                                </td>
                                <td>
                                <select name="array[{{$count}}][telefone_tipo]" class="form-control custom-select">
                                        <option value="0" {{isset($telefone->telefone_tipo) ? ($telefone->telefone_tipo == 0) ? 'selected' : '' : '' }}>Principal</option>
                                        <option value="1" {{isset($telefone->telefone_tipo) ? ($telefone->telefone_tipo == 1) ? 'selected' : '' : '' }}>Celular</option>
                                        <option value="2" {{isset($telefone->telefone_tipo) ? ($telefone->telefone_tipo == 2) ? 'selected' : '' : '' }}>Outro</option>
                                    </select>
                                </td>
                                <td><a class="icon ibtnDel btn btn-danger btn-sm" href="#" value="Delete"> Remover </a></td>
                            </tr>
                            @php $count = $count + 1; @endphp
                            @endforeach
                            @else
                            @php $count = 1; @endphp
                            <tr>
                                <td>
                                    <input name="array[0][telefone]" type="text" class="form-control telefones"
                                        placeholder="(00) 00000-0000">
                                </td>
                                <td>
                                    <select name="array[0][telefone_tipo]" class="form-control custom-select">
                                        <option value="0">Principal</option>
                                        <option value="1">Celular</option>
                                        <option value="2">Outro</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            @endif
    
                            </tbody>
    
                        </table>
                        <div class="col-12 d-flex justify-content-end" style="margin: 10px 0 10px 0">
                            <input type="button" class="btn btn-sm btn-block" id="addrow" value="Adicionar outro contato" style="background-color: #ff6400; color: #fff;" />
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success btn-block" style="margin-top: 20px;">{{isset($dados->id) ? 'Atualizar fornecedor' : 'Cadastrar fornecedor'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function () {
    $('#Radios1').click(function () {
        $('.nasc').hide();
        $('input[name=nasc]').val('');       
    });
    $('#Radios2').click(function () {
        $('.nasc').show();
        $('input[name=nasc]').val('');    
    });
    $('.nasc').hide();
});

$(document).ready(function () {
    var counter = {{$count}};
    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input name="array['+ counter +'][telefone]" type="text" class="form-control telefones" placeholder="(00) 00000-0000"></td>';
        cols += '<td><select name="array['+ counter +'][telefone_tipo]" class="form-control custom-select"><option value="0">Principal</option><option value="1">Celular</option><option value="2">Fax</option></select></td>';
        cols += '<td><a class="icon ibtnDel btn btn-danger btn-sm" href="#" value="Delete"> Remover </a></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });
    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
    });
});
</script>
@endsection


