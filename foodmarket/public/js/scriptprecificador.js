/* PARTE 1 */
document.addEventListener("DOMContentLoaded", function () {
    const quantidadeInputs = document.querySelectorAll(".QTD_TBI");
    const custoInputs = document.querySelectorAll(".COST_TBI");
    const resultadoInputs = document.querySelectorAll(".COSTG_TBI");
    const novaQuantidadeInputs = document.querySelectorAll(".NQTD_TBI");
    const resultadoTds = document.querySelectorAll(".RESULTADO_TBI");

    // Adicionar ouvintes de eventos de entrada aos campos relevantes
    quantidadeInputs.forEach(function (quantidadeInput, index) {
        quantidadeInput.addEventListener("input", function () {
            calcularResultado(index);
        });
    });

    custoInputs.forEach(function (custoInput, index) {
        custoInput.addEventListener("input", function () {
            calcularResultado(index);
        });
    });

    novaQuantidadeInputs.forEach(function (novaQuantidadeInput, index) {
        novaQuantidadeInput.addEventListener("input", function () {
            calcularResultado(index);
        });
    });

    // Função para calcular o resultado
    function calcularResultado(index) {
        const quantidade = parseFloat(quantidadeInputs[index].value) || 0;
        const custo = parseFloat(custoInputs[index].value) || 0;
        const novaQuantidade = parseFloat(novaQuantidadeInputs[index].value) || 0;

        const resultadoX = quantidade !== 0 ? (custo / quantidade).toFixed(10) : 0;
        const resultadoZ = (novaQuantidade * resultadoX).toFixed(2);

        resultadoInputs[index].value = resultadoX;
        resultadoTds[index].textContent = resultadoZ;
    }

    // Calcular o resultado inicial
    calcularResultado();
});
/* PARTE 2 */
document.addEventListener("DOMContentLoaded", function () {
    // Função para calcular a soma das C1V
    function calcularSomaC1V() {
        var cells = document.getElementsByClassName("C1V");
        var soma = 0;
        for (var i = 0; i < cells.length; i++) {
            var cellText = cells[i].textContent;
            soma += parseFloat(cellText.replace(",", "."));
        }
        return soma;
    }

    // Função para calcular e atualizar os valores automaticamente
    function atualizarValores() {
        var somaC1V = calcularSomaC1V();
        var resultadoC2V1 = somaC1V;
        var resultadoC2V2 = resultadoC2V1 * 1.25;
        var resultadoC2V3 = resultadoC2V2 * 3;
        var valorC2V4 = parseFloat(document.getElementById("C2V4").value.replace(",", "."));
        var resultadoC2V5 = resultadoC2V3 / valorC2V4;
        var valorC2V6 = parseFloat(document.getElementById("C2V6").value.replace(",", "."));
        var resultadoC2V7 = resultadoC2V5 + valorC2V6;

        document.getElementById("C2V1").value = resultadoC2V1.toFixed(2);
        document.getElementById("C2V2").value = resultadoC2V2.toFixed(2);
        document.getElementById("C2V3").value = resultadoC2V3.toFixed(2);
        document.getElementById("C2V5").value = resultadoC2V5.toFixed(2);
        document.getElementById("C2V7").value = resultadoC2V7.toFixed(2);
    }

    // Adicione um evento que chama a função para atualizar os valores sempre que ocorrer uma alteração em C2V4 ou C2V6
    document.getElementById("C2V4").addEventListener("input", atualizarValores);
    document.getElementById("C2V6").addEventListener("input", atualizarValores);

    // Chame a função para atualizar os valores inicialmente
    atualizarValores();
});
