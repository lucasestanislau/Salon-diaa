@csrf
<div class="form-group">
    <label for="descricao">Descrição do Serviço</label>
    <input type="text" class="form-control" id="descricao" placeholder="Descrição do serviço" name="descricao" required
        value="{{ $servico->descricao ?? old('descricao')}}">
</div>
<div class="form-group">
    <label for="preco">Preço do Serviço</label>
    <input type="number" class="form-control" id="preco" placeholder="Descrição do serviço" name="preco" required
        value="{{ $servico->preco ?? old('preco')}}">
</div>