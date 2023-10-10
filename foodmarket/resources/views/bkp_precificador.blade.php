<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/scriptprecificador.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="/">
            <img class="img_logo" src="img/logo.jpeg" class="logo">
        </a>
    </header>
    <nav>
        <a href="/"><button>Home</button></a>
        <a href="precificador"><button>Precificar</button></a>
        <a href="vender"><button>Vender</button></a>
        <a href=""><button>Visualizar Vendas</button></a>
    </nav>
    <div class="content">
        <div class="container_A">
            <form method="POST" action="/ingrediente" class="formI">
            {{ csrf_field() }}
                <input type="text" name="txIngrediente" placeholder="Ingrediente">
                <input type="number" name="txQuantidade" placeholder="Qtd(g)">
                <input type="number" name="txCusto" placeholder="Custo" step="0.01" min="0">
                <input type="submit" value="Salvar">
            </form>
            <table class="lista_ingredientes">
                <tr>

                </tr>
                <tr>
                    <th>Ingrediente</th>
                    <th>Quantidade(g)</th>
                    <th>Custo</th>
                    <th>Quantidade<br/> necessária(g)</th>
                    <th>Custo usado</th>
                </tr>
                @foreach ($ingredientes as $c)
                <tr>
                    <td>{{ $c->ingrediente }}</td>
                    <td>{{ $c->quantidade }}</td>
                    <td>
                       <span>{{ $c->custo }}</span>
                    </td>
                    <td><input type="number" class="nova-quantidade" value="0"></td>
                    <td><span class="novo-custo">0.00</span></td>
                </tr>
                @endforeach
            </table>
            
        </div>

        <div class="container_B">
            <table class="tb_criacao_produto">
                <tr>
                    <th colspan="6">TABELA DE CRIAÇÃO DO PRODUTO</th>
                </tr>
                <tr>
                    <th>Ingrediente</th>
                    <th>Quantidade(g)</th>
                    <th>Custo</th>
                    <th>Quantidade Necessária(g)</th>
                    <th>Custo usado</th>
                    <th>+/-</th>
                </tr>
                <tr>
                    <td>
                        <select class="ingredient-select">
                            <option>-----</option>
                            @foreach ($ingredientes as $i)
                            <option value="{{ $c->ingrediente }}">{{ $i->ingrediente }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="quantidade"><!--aqui deve receber a quantidade referente à opção selecionada--></td>
                    <td class="custo"><!--aqui deve receber a custo referente à opção selecionada--></td>
                    <td>
                        <input type="number">
                    </td>
                    <td></td>
                    <td>
                        <button class="botao-adicionar">Adicionar</button><!--ESSE BOTÃO É REPONSÁVEL POR GERAR UMA NOVA LINHA -->
                    </td>
                </tr>

            </table>


            <table class="tb_precificador_produto">
                <tr>
                    <th colspan="2">Precificador</th>
                </tr>
                <tr>
                    <th>
                        <label for="soma-custos">Total Custo de Ingredientes</label>
                    </th>
                    <td>R$<span id="soma-custos">0.00</span></td>
                </tr>
                <tr>
                    <th>
                        <label for="addcustinc">Adiciona 25% (custos incalculáveis, gás, luz, etc)</label>
                    </th>
                    <td>R$<span id="addcustinc">0.00</span></td>
                </tr>
                <tr>
                    <th>
                        <label for="M3LMO">Multiplica por 3 (seu lucro e mão de obra)</label>
                    </th>
                    <td>R$<span id="M3LMO">0.00</span></td>
                </tr>
                <tr>
                    <th >
                        <label for="R-C-U_F">Rendimento / quantas unidades (F)</label>
                    </th>
                    <td>
                        <input type="number" id="R-C-U_F">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="P_Unit">Preço por Unidade</label>
                    </th>
                    <td>R$<span id="P_Unit">0.00</span></td>
                </tr>
                <tr>
                    <th>
                        <label for="P-E-I_G">Preço por Embalagem Individual (G)</label>
                    </th>
                    <td>
                        <input type="number" id="P-E-I_G">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="valor_vtotal">Preço final de venda por unidade</label>
                    </th>
                    <td>R$<span id="valor_vtotal">0.00</span></td>
                </tr>
            </table>
            <!--  ABAIXO FORMULÁRIO PARA INSERIR O PRODUTO NO BANCO  -->
            <form method="POST" action="" class="formP">
                <h1>Cadastrar Produto</h1>
                    <div class="box_img_produto">
                        <input type="file">
                    </div>
                    <div class="box_detalhe_produto">
                        <input type="text" name="txProduto" placeholder="Nome do Produto" require><br/>
                        <textarea></textarea><br/>
                        <input type="number" name="txValor" placeholder="Valor de venda" require><br/>
                    </div>
            </form>
        </div>
    </div>
    <footer></footer>
</body>

</html>