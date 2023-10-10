document.addEventListener('DOMContentLoaded', function() {
    // Captura todos os elementos com a classe "nova-quantidade"
    var quantidadeInputs = document.querySelectorAll('.nova-quantidade');

    // Adiciona um evento de input a cada campo "Quantidade necessária (g)"
    quantidadeInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            // Captura o elemento da linha atual
            var row = input.closest('tr');

            // Obtém o valor da "Quantidade necessária (g)" do campo
            var quantidadeNecessaria = parseFloat(input.value) || 0;

            // Obtém o valor da "Quantidade (g)" e "Custo" da mesma linha
            var quantidade = parseFloat(row.querySelector('td:nth-child(2)').textContent);
            var custo = parseFloat(row.querySelector('td:nth-child(3) span').textContent);

            // Calcula o "Custo usado" e exibe-o na coluna correspondente
            var custoUsado = (quantidadeNecessaria / quantidade) * custo;
            // Encontra o <span class="novo-custo"> na mesma linha e atualiza o texto
            row.querySelector('td:nth-child(5) span.novo-custo').textContent = custoUsado.toFixed(2);
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Função para calcular o preço final de venda por unidade
    function calcularPrecoVenda() {
        // Captura os elementos de entrada e saída
        var custoIngredientes = parseFloat(document.getElementById('soma-custos').textContent);
        var custoIncalculaveis = parseFloat(document.getElementById('addcustinc').textContent);
        var lucroMaoObra = parseFloat(document.getElementById('M3LMO').textContent);
        var rendimento = parseFloat(document.getElementById('R-C-U_F').value);

        // Calcula o preço por unidade
        var precoPorUnidade = (custoIngredientes + custoIncalculaveis) * lucroMaoObra;
        
        // Calcula o preço final de venda por unidade
        var precoFinalUnidade = precoPorUnidade / rendimento;

        // Atualiza o resultado na tabela
        document.getElementById('P_Unit').textContent = precoPorUnidade.toFixed(2);
        document.getElementById('valor_vtotal').textContent = precoFinalUnidade.toFixed(2);
    }

    // Adiciona um evento de input aos campos relevantes
    document.getElementById('soma-custos').addEventListener('input', calcularPrecoVenda);
    document.getElementById('addcustinc').addEventListener('input', calcularPrecoVenda);
    document.getElementById('M3LMO').addEventListener('input', calcularPrecoVenda);
    document.getElementById('R-C-U_F').addEventListener('input', calcularPrecoVenda);
});





/* INFORMAÇÕES DOS INGREDIENTES */



/* ADICIONAR LINHA */

// Função para adicionar uma nova linha à tabela
function adicionarLinha() {
    var tabela = document.querySelector(".tb_criacao_produto tbody");
    var newRow = tabela.insertRow(-1);

    // Cria as células da nova linha e insere os elementos apropriados
    for (var i = 0; i < 6; i++) {
        var celula = newRow.insertCell(i);
        if (i === 0) {
            celula.innerHTML = `
                <select>
                    <option>-----</option>
                    @foreach ($ingredientes as $c)
                    <option value="{{ $c->ingrediente }}">{{ $c->ingrediente }}</option>
                    @endforeach
                </select>
            `;
        } else if (i === 5) {
            celula.innerHTML = '<button class="botao-remover" onclick="removerLinha(this)">Remover</button>';
        } else {
            celula.innerHTML = '';
        }
    }
}

// Função para remover uma linha da tabela
function removerLinha(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

// Adicione um evento de clique ao botão "Adicionar" no carregamento do documento
document.addEventListener("DOMContentLoaded", function() {
    var adicionarButton = document.querySelector(".botao-adicionar");
    adicionarButton.addEventListener("click", adicionarLinha);
});
