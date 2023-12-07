document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");
    const cartTable = document.querySelector("#cart-table");
    const txTotalDaVenda = document.querySelector("#txTotalDaVenda");

    addToCartButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const productContainer = button.closest(".box_exibidor_produto");

            // Verifica se o contêiner do produto existe
            if (productContainer) {
                const productName = productContainer.querySelector(".title_produto");

                // Verifica se o nome do produto existe
                if (productName) {
                    const productNameText = productName.textContent;
                    const productId = productContainer.getAttribute("data-product-id");
                    console.log("productId:", productId);
                    const productPriceText = productContainer.querySelector(".valor_do_produto").textContent;
                    const productPrice = parseFloat(productPriceText.replace(/[^\d.-]/g, ''));

                    // Verifica se o produto já está no carrinho
                    const existingRow = findProductRow(productId);

                    if (existingRow) {
                        // Se o produto já está no carrinho, atualiza a quantidade e recalcula o total
                        const txQtd = existingRow.querySelector("input[name='txQtd[]']");
                        txQtd.value = parseInt(txQtd.value) + 1;

                        const quantity = parseFloat(txQtd.value) || 0;
                        const totalValue = quantity * productPrice;
                        const txTotalProduto = existingRow.querySelector("input[name='txTotalProduto[]']");
                        txTotalProduto.value = "R$ " + totalValue.toFixed(2);
                    } else {
                        // Se o produto não está no carrinho, adiciona uma nova linha
                        const newRow = cartTable.insertRow(-1);

                        // Adicione a célula do nome do produto
                        const cell1 = newRow.insertCell(0);
                        cell1.textContent = productNameText;

                        // Adicione a célula da quantidade
                        const cell2 = newRow.insertCell(1);
                        const txQtd = document.createElement("input");
                        txQtd.type = "number";
                        txQtd.name = "txQtd[]";
                        txQtd.value = 1;
                        cell2.appendChild(txQtd);

                        // Adicione a célula do valor de venda
                        const cell3 = newRow.insertCell(2);
                        const txValorVenda = document.createElement("input");
                        txValorVenda.type = "text";
                        txValorVenda.name = "txValorVenda[]";
                        txValorVenda.value = "R$ " + productPrice.toFixed(2);  // Exiba o valor formatado
                        txValorVenda.readOnly = true;
                        cell3.appendChild(txValorVenda);

                        // Adicione a célula do total do produto
                        const cell4 = newRow.insertCell(3);
                        const txTotalProduto = document.createElement("input");
                        txTotalProduto.type = "text";
                        txTotalProduto.name = "txTotalProduto[]";
                        txTotalProduto.readOnly = true;
                        cell4.appendChild(txTotalProduto);

                        // Calcula e exibe o valor total ao adicionar o item
                        const quantity = parseFloat(txQtd.value) || 0;
                        const totalValue = quantity * productPrice;
                        txTotalProduto.value = "R$ " + totalValue.toFixed(2);

                        // Adiciona o botão "Remover" na nova linha
                        const removeButton = document.createElement("button");
                        removeButton.textContent = "X";
                        removeButton.addEventListener("click", function () {
                            // Remove a linha ao clicar no botão "Remover"
                            cartTable.deleteRow(newRow.rowIndex);
                            // Atualiza o total após remover o item
                            updateTotal();
                        });

                        // Adiciona a célula do botão "Remover"
                        const cell5 = newRow.insertCell(4);
                        cell5.appendChild(removeButton);

                        // Campo oculto para armazenar o ID do produto
                        const txIdProduto = document.createElement("input");
                        txIdProduto.type = "hidden";
                        txIdProduto.name = "txIdProduto[]";
                        txIdProduto.value = productId;
                        newRow.appendChild(txIdProduto);

                        txQtd.addEventListener("input", function () {
                            const quantity = parseFloat(txQtd.value) || 0;
                            const totalValue = quantity * productPrice;
                            txTotalProduto.value = "R$ " + totalValue.toFixed(2);

                            // Atualiza o campo de texto com o total formatado
                            updateTotal();
                        });
                    }

                    // Atualiza o total da venda ao adicionar um produto ao carrinho
                    updateTotal();
                }
            }
        });
    });

    // Função para encontrar a linha de um produto no carrinho
    function findProductRow(productId) {
        for (let i = 1; i < cartTable.rows.length; i++) {
            const cellProductId = cartTable.rows[i].querySelector("input[name='txIdProduto[]']");
            if (cellProductId.value === productId) {
                return cartTable.rows[i];
            }
        }
        return null;
    }

    // Função para atualizar o total da venda
    function updateTotal() {
        let total = 0;

        // Itera sobre as linhas da tabela
        for (let i = 1; i < cartTable.rows.length; i++) {
            // Obtém o valor total da célula 3 (índice 2)
            const cellTotal = cartTable.rows[i].cells[3].querySelector("input[name='txTotalProduto[]']");

            // Converte o valor para número e adiciona ao total
            const totalValue = parseFloat(cellTotal.value.replace(/[^\d.-]/g, '')) || 0;
            total += totalValue;
        }

        // Atualiza o campo de texto com o total formatado
        txTotalDaVenda.value = "R$ " + total.toFixed(2);
        console.log("Total atualizado:", txTotalDaVenda.value);
    }

    // Adiciona um ouvinte de eventos para atualizar o total quando a quantidade é alterada
    cartTable.addEventListener("input", function (event) {
        const target = event.target;

        // Verifica se o elemento alterado é um campo de quantidade
        if (target && target.name === "txQtd[]") {
            // Atualiza o total
            updateTotal();
        }
    });
});
