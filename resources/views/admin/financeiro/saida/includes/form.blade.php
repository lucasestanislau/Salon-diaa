@csrf
<div class="form-group">
    <label for="descricao">Descrição da Saída</label>
    <input type="text" class="form-control" id="descricao" placeholder="Descrição da Saída" name="descricao" required
        value="{{$saida->descricao ??  old('descricao')}}">
</div>

<div class="form-group">
    <label for="valor">Valor da Saída</label>
    <input type="number" class="form-control" id="valor" placeholder="Valor da Saída" name="valor" required
        value="{{$saida->valor ?? old('valor')}}">
</div>

<button type="submit" class="btn btn-primary">Salvar</button>