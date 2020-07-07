@csrf
<div class="form-group">
    <div class="form-group">
        <label>Selecione o Serviço</label>
        <select id="select-servico" class="custom-select" onchange="listenerValorFinal()" required name="servico_id">
            <option value="">SELECIONE O SERVIÇO</option>
            @if (isset($servicos))
            @foreach ($servicos as $servico)
            @if ( isset($entrada->servico_id) && $servico->id == $entrada->servico_id)
            <option selected value="{{$servico->id}}" id="{{$servico->preco}}">{{$servico->descricao}} -
                {{$servico->preco}} R$
                @else
            <option value="{{$servico->id}}" id="{{$servico->preco}}">{{$servico->descricao}} - {{$servico->preco}} R$
                @endif

            </option>
            @endforeach
            @endif

        </select>
    </div>
</div>
<div class="form-group">
    <div class="form-group">
        <label>Selecione o Funcionário para a comissão</label>
        <select class="custom-select" name="funcionario_id">
            <option value="">SELECIONE O FUNCIONÁRIO</option>
            @if (isset($funcionarios))
            @foreach ($funcionarios as $funcionario)

            @if (isset($entrada->funcionario_id) && $entrada->funcionario_id == $funcionario->id)
            <option selected value="{{$funcionario->id}}">{{$funcionario->nome}} - {{$funcionario->telefone}}</option>
            @else
            <option value="{{$funcionario->id}}">{{$funcionario->nome}} - {{$funcionario->telefone}}</option>
            @endif

            @endforeach
            @endif
        </select>
    </div>
</div>
<div class="form-group">
    <label for="desconto">Desconto (Se houver)</label>
    <input type="number" class="form-control" id="desconto" placeholder="Valor Desconto (Se Houver)" name="desconto"
        min="0" onchange="listenerValorFinal()" value="">
</div>

<div class="form-group">
    <label>Valor Final da Entrada</label>
    <input type="hidden" class="form-control" value="0" id="valor_final_entrada" name="valor_final">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Valor Total: </span>
            <span id="paragrafo_valor_final" class="info-box-number"></span>
        </div>
        <!-- /.info-box-content -->
    </div>

</div>

<button onclick="return confirmar()" type="submit" class="btn btn-primary">Salvar</button>

<script>
    function listenerValorFinal(){
        //aqui a gente tem o index da option selecionada
        var index = document.getElementById("select-servico").options.selectedIndex;
        //aqui temos o valor do id do option selecionado
        var valorServico = document.getElementById("select-servico").options[index].id;

        var valorDesconto = document.getElementById("desconto").value;

        var valorFinal = valorServico - valorDesconto;

    //alert(document.getElementById("teste").getAttribute('value'));
        document.getElementById("valor_final_entrada").setAttribute("value", Number(valorFinal)) ;
        document.getElementById("paragrafo_valor_final").innerHTML =  Number(valorFinal) + " R$" ;
    }

    function confirmar(){
        var valorTotal = document.getElementById("valor_final_entrada").value;

        return confirm("O valor da Entrada ficou: "+valorTotal+" R$, deseja confirmar?");
    }

</script>