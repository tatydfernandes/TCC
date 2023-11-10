document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");
    const cartTable = document.querySelector("#cart-table");

    addToCartButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const productContainer = button.closest(".box_exibidor_produto");
            const productName = productContainer.querySelector(".title_produto").textContent;
            const productId = productContainer.getAttribute("data-product-id");
            const productPriceText = productContainer.querySelector(".valor_do_produto").textContent;
            const productPrice = parseFloat(productPriceText.replace(/[^\d.-]/g, ''));

            const newRow = cartTable.insertRow(-1);

            // Adicione a célula do nome do produto
            const cell1 = newRow.insertCell(0);
            cell1.textContent = productName;

            // Adicione a célula da quantidade
            const cell2 = newRow.insertCell(1);
            const txQtd = document.createElement("input");
            txQtd.type = "number";
            txQtd.name = "txQtd[]";
            txQtd.value = 1;
            cell2.appendChild(txQtd);

            // Adicione a célula do valor de venda
            const cell3 = newRow.insertCell(2);
            cell3.textContent = "R$ " + productPrice.toFixed(2);

            // Adicione a célula do total do produto
            const cell4 = newRow.insertCell(3);
            const txTotalProduto = document.createElement("input");
            txTotalProduto.type = "text";
            txTotalProduto.name = "txTotalProduto[]";
            txTotalProduto.readOnly = true;
            cell4.appendChild(txTotalProduto);

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
            });
        });
    });
});
