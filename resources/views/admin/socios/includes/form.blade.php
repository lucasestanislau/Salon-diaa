@csrf
<div class="form-group">
    <label for="nome">Nome do Sócio</label>
    <input type="text" class="form-control" id="nome" placeholder="Nome do Sócio" name="nome" required
        value="{{ $socio->nome ?? old('nome')}}" min="3">
</div>