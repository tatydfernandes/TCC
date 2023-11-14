// Obtém o elemento de input de data pelo ID
var inputDate = document.getElementById("txDataPed");

// Obtém a data atual no formato "AAAA-MM-DD"
var dataAtual = new Date().toISOString().split('T')[0];

// Define o valor do campo de entrada para a data atual
inputDate.value = dataAtual;