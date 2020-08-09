var PageName = getPageName(location.href);
function getPageName(url) {
    var index = url.lastIndexOf("/") + 1;
    var filenameWithExtension = url.substr(index);
    var filename = filenameWithExtension.split(".")[0];
    return filename;
}


$(document).ready(function () {

    $.ajax({
        url: "php/chart.php",
        type: "post",
        dataType: 'json',
        data: { page: PageName },
        success: function (resp) {
            console.log(resp);
            let receitaDesp = document.getElementById('receitaDesp').getContext('2d');

            let barChart = new Chart(receitaDesp, {
                type: 'bar',
                data: {
                    labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    datasets: [{
                        label: 'Receita',
                        data: [
                            800, 600, 250, 550, 300, 900, 1000
                        ],
                        backgroundColor: '#bb1f23',
                        borderWidth: 0
                    }, {
                        label: 'Despesa',
                        data: [
                            400, 200, 350, 660, 100, 950, 1500
                        ],
                        backgroundColor: '#7A1518',
                        borderWidth: 0

                    }]
                },

                options: {
                    title: {
                        display: true,
                        text: 'Receita/Despesa Semanal',
                        fontSize: 18,

                    }
                }
            });

            let despesa = document.getElementById('despesa').getContext('2d');

            let SomePieChart = new Chart(despesa, {
                type: 'pie',
                data: {
                    labels: ['Despesa 1', 'Despesa 2', 'Despesa 3'],
                    datasets: [{
                        label: 'Despesas',
                        data: [
                            800, 600, 250
                        ],
                        backgroundColor: [
                            '#C72227',
                            '#BA2025',
                            '#3B0A0C',
                            '#7A1518'
                        ],
                        borderWidth: 2
                    },]
                },

                options: {
                    title: {
                        display: true,
                        text: 'Despesas',
                        fontSize: 18,
                        responsive: true

                    }
                }
            });

            let mensal = document.getElementById('mensal').getContext('2d');

            let OtherPieChart = new Chart(mensal, {
                type: 'line',
                data: {
                    labels: ['1ª Semana', '2ª Semana', '3ª Semana', '4ª Semana'],
                    datasets: [{
                        label: 'Receita',
                        data: [
                            800, 600, 250, 550
                        ],
                        backgroundColor: '#bb1f23',
                        borderWidth: 0
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Receita Mensal',
                        fontSize: 18
                    }

                }
            });

        },
        complete: function () {

        }
    })




});