@csrf
<div class="form-group">
    <label for="descricao">Descrição do Vale</label>
    <input type="text" class="form-control" id="descricao" placeholder="Descrição do Vale" name="descricao" required
        value="{{ $vale->descricao ?? old('descricao')}}">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" class="form-control" id="valor" placeholder="Descrição do Vale" name="valor" required
        value="{{ $vale->valor ?? old('valor')}}" min="0">
</div>

<div class="form-group">
    <div class="form-group">
        <label>Selecione o Sócio que irá receber o Vale</label>
        <select class="custom-select" name="socio_id" required>
            <option value="">SELECIONE O SOCIO</option>
            @if (isset($socios))
            @foreach ($socios as $socio)

            @if (isset($vale->socio_id) && $vale->socio_id == $socio->id)
            <option selected value="{{$socio->id}}">{{$socio->nome}}</option>
            @else
            <option value="{{$socio->id}}">{{$socio->nome}}</option>
            @endif

            @endforeach
            @endif
        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>