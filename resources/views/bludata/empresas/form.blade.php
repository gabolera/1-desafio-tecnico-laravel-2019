@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{isset($dados->id) ? 'Atualizar empresa' : 'Cadastrar nova empresa'}}
                <a href="{{route('empresa.index')}}" class="btn btn-sm btn-secondary" style="float: right;"> << Cancelar </a>
                </div>

                <div class="card-body">
                    <form action="{{isset($dados->id) ? route('empresa.update', $dados->id) : route('empresa.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label> Nome </label>
                            <input type="text" class="form-control" name="nome" value="{{isset($dados->nome) ? $dados->nome : '' }}">
                            @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> CNPJ </label>
                            <input type="number" class="form-control" name="CNPJ" value="{{isset($dados->cnpj) ? $dados->cnpj : '' }}">
                            @error('cnpj')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> UF </label>                            
                            <select name="UF" class="custom-select">
                                <option value="AC" {{ isset($dados->UF) ? ($dados->UF == 'AC') ? 'selected' : '' : '' }}>Acre</option>
                                <option value="AL" {{ isset($dados->UF) ? ($dados->UF == 'AL') ? 'selected' : '' : '' }}>Alagoas</option>
                                <option value="AP" {{ isset($dados->UF) ? ($dados->UF == 'AP') ? 'selected' : '' : '' }}>Amapá</option>
                                <option value="AM" {{ isset($dados->UF) ? ($dados->UF == 'AM') ? 'selected' : '' : '' }}>Amazonas</option>
                                <option value="BA" {{ isset($dados->UF) ? ($dados->UF == 'BA') ? 'selected' : '' : '' }}>Bahia</option>
                                <option value="CE" {{ isset($dados->UF) ? ($dados->UF == 'CE') ? 'selected' : '' : '' }}>Ceará</option>
                                <option value="DF" {{ isset($dados->UF) ? ($dados->UF == 'DF') ? 'selected' : '' : '' }}>Distrito Federal</option>
                                <option value="ES" {{ isset($dados->UF) ? ($dados->UF == 'ES') ? 'selected' : '' : '' }}>Espírito Santo</option>
                                <option value="GO" {{ isset($dados->UF) ? ($dados->UF == 'GO') ? 'selected' : '' : '' }}>Goiás</option>
                                <option value="MA" {{ isset($dados->UF) ? ($dados->UF == 'MA') ? 'selected' : '' : '' }}>Maranhão</option>
                                <option value="MT" {{ isset($dados->UF) ? ($dados->UF == 'MT') ? 'selected' : '' : '' }}>Mato Grosso</option>
                                <option value="MS" {{ isset($dados->UF) ? ($dados->UF == 'MS') ? 'selected' : '' : '' }}>Mato Grosso do Sul </option>
                                <option value="MG" {{ isset($dados->UF) ? ($dados->UF == 'MG') ? 'selected' : '' : '' }}>Minas Gerais</option>
                                <option value="PA" {{ isset($dados->UF) ? ($dados->UF == 'PA') ? 'selected' : '' : '' }}>Pará</option>
                                <option value="PB" {{ isset($dados->UF) ? ($dados->UF == 'PB') ? 'selected' : '' : '' }}>Paraíba</option>
                                <option value="PR" {{ isset($dados->UF) ? ($dados->UF == 'PR') ? 'selected' : '' : '' }}>Paraná</option>
                                <option value="PE" {{ isset($dados->UF) ? ($dados->UF == 'PE') ? 'selected' : '' : '' }}>Pernambuco</option>
                                <option value="PI" {{ isset($dados->UF) ? ($dados->UF == 'PI') ? 'selected' : '' : '' }}>Piauí</option>
                                <option value="RJ" {{ isset($dados->UF) ? ($dados->UF == 'RJ') ? 'selected' : '' : '' }}>Rio de Janeiro</option>
                                <option value="RN" {{ isset($dados->UF) ? ($dados->UF == 'RN') ? 'selected' : '' : '' }}>Rio Grande do Norte</option>
                                <option value="RS" {{ isset($dados->UF) ? ($dados->UF == 'RS') ? 'selected' : '' : '' }}>Rio Grande do Sul</option>
                                <option value="RO" {{ isset($dados->UF) ? ($dados->UF == 'RO') ? 'selected' : '' : '' }}>Rondônia</option>
                                <option value="RR" {{ isset($dados->UF) ? ($dados->UF == 'RR') ? 'selected' : '' : '' }}>Roraima</option>
                                <option value="SC" {{ isset($dados->UF) ? ($dados->UF == 'SC') ? 'selected' : '' : '' }}>Santa Catarina</option>
                                <option value="SP" {{ isset($dados->UF) ? ($dados->UF == 'SP') ? 'selected' : '' : '' }}>São Paulo</option>
                                <option value="SE" {{ isset($dados->UF) ? ($dados->UF == 'SE') ? 'selected' : '' : '' }}>Sergipe</option>
                                <option value="TO" {{ isset($dados->UF) ? ($dados->UF == 'TO') ? 'selected' : '' : '' }}>Tocantins</option>
                            </select>
                            @error('UF')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block">{{isset($dados->id) ? 'Atualizar dados' : 'Cadastrar empresa'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection