function exibirDataHora() {
  const dataAtual = new Date();

  //obter o nome do dia da semana
  const diasDaSemana = [
    "Domingo",
    "Segunda-feira",
    "Terça-feira",
    "Quarta-feira",
    "Quinta-feira",
    "Sexta-feira",
    "Sábado",
  ];
  const diaDaSemana = diasDaSemana[dataAtual.getDay()];

  // Obter dia , mês e ano
  const dia = dataAtual.getDate();
  const mes = dataAtual.getMonth() + 1; //janeiro é 0, por isso somamos 1
  const ano = dataAtual.getFullYear();

  // Obter a hora, minutos e segundos
  const hora = dataAtual.getHours().toString().padStart(2, "0");
  const minutos = dataAtual.getMinutes().toString().padStart(2, "0");
  const segundos = dataAtual.getSeconds().toString().padStart(2, "0");

  // Montar a string formatada
  const dataHoraFormatada =
    diaDaSemana +
    "," +
    " " +
    dia +
    "/" +
    mes +
    "/" +
    ano +
    " " +
    hora +
    ":" +
    minutos +
    ":" +
    segundos;

  document.getElementById("dataHora").textContent = dataHoraFormatada;
}

//chama a função para exibir o tempo
exibirDataHora();

// Atualiza a data e hora a cada segundo
setInterval(exibirDataHora, 1000);