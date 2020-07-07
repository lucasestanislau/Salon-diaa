@csrf
<div class="form-group">
    <label for="descricao">Descrição do Vale</label>
    <input type="text" class="form-control" id="descricao" placeholder="Descrição do Vale" name="descricao" required
        value="{{ $vale->descricao ?? old('descricao')}}">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" class="form-control" id="valor" placeholder="Descrição do Vale" name="valor" required
        value="{{ $vale->valor ?? old('valor')}}">
</div>

<div class="form-group">
    <div class="form-group">
        <label>Selecione o Funcionário que irá receber o Vale</label>
        <select class="custom-select" name="funcionario_id" required>
            <option value="">SELECIONE O FUNCIONÁRIO</option>
            @if (isset($funcionarios))
            @foreach ($funcionarios as $funcionario)

            @if (isset($vale->funcionario_id) && $vale->funcionario_id == $funcionario->id)
            <option selected value="{{$funcionario->id}}">{{$funcionario->nome}} - {{$funcionario->telefone}}</option>
            @else
            <option value="{{$funcionario->id}}">{{$funcionario->nome}} - {{$funcionario->telefone}}</option>
            @endif

            @endforeach
            @endif
        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>