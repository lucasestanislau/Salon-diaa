@csrf
<div class="form-group">
    <label for="full-name">Nome Completo</label>
    <input type="text" class="form-control" id="full-name" placeholder="Nome Completo do Funcionário" name="nome"
        required value="{{ $funcionario->nome ?? old('nome')}}">
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label>CPF</label>
            <input type="text" class="form-control" placeholder="Digite o CPF" name="cpf"
                value="{{ $funcionario->cpf ?? old('cpf')}}">
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label>RG</label>
            <input type="text" class="form-control" placeholder="Digite o RG" name="rg"
                value="{{ $funcionario->rg ?? old('rg')}}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" id="endereco" placeholder="Endereço do Funcionário" name="endereco" required
        value="{{ $funcionario->endereco ?? old('endereco')}}">
</div>
<div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" id="telefone" placeholder="Telefone do Funcionário" name="telefone" required
        value="{{ $funcionario->telefone ?? old('telefone')}}">
</div>

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label>Comissão %</label>
            <input type="number" class="form-control" placeholder="Digite a comissão do funcionário" name="comissao"
                required value="{{ $funcionario->comissao ?? old('comissao')}}">
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <label for="exampleInputFile">Foto do funcionário</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                <label class="custom-file-label" for="exampleInputFile">Escolha um arquivo</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
        </div>
    </div>

</div>