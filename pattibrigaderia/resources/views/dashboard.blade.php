@extends('layouts.layoutdefault')
@section('content')


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Produto', 'Quantidade'],
            @foreach($carrinhoGrafico as $cg)
                ['{{ $cg->produto }}',{{ $cg->totalQtd }}],
            @endforeach
        ]);

        var options = {
          title: 'Mais vendidos',
          backgroundColor: 'transparent',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<div class="container_B">
    <div id="piechart"></div>
</div>

<div class="container_A">

    <table class="table_vendas">
        
        <tr class="venda_relatorio">
            <th></th>
            <th>ID</th>
            <th>Cliente</th>
            <th>Tipo de venda</th>
            <th>Data da venda</th>
            <th>Data da entrega</th>
            <th>Total da Venda</th>
            <th>Forma de Pagamento</th>
            <th>Status</th>
        </tr>
        @foreach($vendas as $v)
        
        <tr class="venda_relatorio">
            <td>
                <button class="expande-recolhe" data-venda-id="{{ $v->idVenda }}">+-</button>
            </td>
            <td>{{$v->idVenda}}</td>
        <td>{{$v->cliente}}</td>
        <td>{{$v->tpVenda}}</td>
        <td>{{$v->dtVenda}}</td>
        <td>{{$v->dtEntrega}}</td>
        <td>R${{$v->totalVenda}}</td>
        <td>{{$v->fPagamento}}</td>
        <!-- Formulário de atualização incorporado -->
        <form method="post" action="{{ route('venda.update', $v->idVenda) }}">
                <td>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <select name="txStatus">
                    <option value="Pago" {{ $v->status == 'Pago' ? 'selected' : '' }}>Pago</option>
                    <option value="Não Pago" {{ $v->status == 'Não Pago' ? 'selected' : '' }}>Não Pago</option>
                    <option value="Parcial" {{ $v->status == 'Parcial' ? 'selected' : '' }}>Parcial</option>
                </select>
            </td>
            <td>
                <button type="submit">Atualizar</button>
            </td>
        </form>
            
    </tr>

        @foreach($carrinho as $c)
        @if($c->idVenda == $v->idVenda)
        
        <tr class="carrinho_relatorio escondido" data-venda-id="{{ $v->idVenda }}">
            <td></td>
            <td>{{$c->idCarrinho}}</td>
            <td>{{$c->qtd}}x{{$c->produto}}</td>
            <td>R${{$c->valor_total}}</td>
        </tr>
        @endif
        @endforeach
        
        @endforeach
    </table>
</div>

@endsection
<script src="/js/scriptvendascarrinho.js"></script>