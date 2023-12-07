document.addEventListener('DOMContentLoaded', function() {
    var toggleCarrinhoBtns = document.querySelectorAll('.expande-recolhe');

    toggleCarrinhoBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var vendaId = btn.getAttribute('data-venda-id');
            var carrinhoRows = document.querySelectorAll('.carrinho_relatorio[data-venda-id="' + vendaId + '"]');

            carrinhoRows.forEach(function(row) {
                row.classList.toggle('escondido');
            });
        });
    });
});
