$(document).ready(function () {



    let myChart = document.getElementById('myChart').getContext('2d');

    let barChart = new Chart(myChart, {
        type: 'bar',
        data: {
            labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
            datasets: [{
                label: 'Lucro',
                data: [
                    800, 600, 250, 550, 300, 900, 1000
                ],
                backgroundColor: '#bb1f23',
                borderWidth: 0
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Vendas Semanais',
                fontSize: 18
            }
        }
    });

    let myOtherChart = document.getElementById('myOtherChart').getContext('2d');

    let pieChart = new Chart(myOtherChart, {
        type: 'line',
        data: {
            labels: ['1ª Semana', '2ª Semana', '3ª Semana', '4ª Semana'],
            datasets: [{
                label: 'Lucro',
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
                text: 'Vendas Mensais',
                fontSize: 18
            }

        }
    });

    let myThirdChart = document.getElementById('myThirdChart').getContext('2d');

    let doughChart = new Chart(myThirdChart, {
        type: 'doughnut',
        data: {
            labels: ['Excelente', 'Bom', 'Regular', 'Ruim'],
            datasets: [{
                label: 'Lucro',
                data: [
                    10, 15, 5, 2
                ],
                backgroundColor: [
                    '#C72227',
                    '#BA2025',
                    '#3B0A0C',
                    '#7A1518'
                ],
                borderWidth: 0
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Avaliações de Clientes',
                fontSize: 18
            }

        }
    });

});

function UpdateList() {

    var liItems = [];
    $("#ToDoListItems").find('li').each(function () {
        var liIndex, liItem;
        liIndex = $(this).index();
        liItem = $(this).text();
        liItems[liIndex] = liItem;
    });

    $.ajax({
        url: 'php/dashboard.php',
        type: 'POST',
        data: {
            items: liItems,
            action: "update"
        },
        dataType: "json",
        success: function (data) {

        },
        complete: function (data) {

        },
        error: function () {

        }
    });
}

function FetchList() {
    $.ajax({
        url: 'php/dashboard.php',
        type: 'POST',
        data: { action: "fetch" },
        dataType: "json",
        success: function (data) {
            var html = "";
            $.each(data, function (key, value) {
                html += '<li class="litodo">' + value.Descricao + '</li>';
            })
            $('#ToDoListItems').html(html);
        },
        complete: function () {

        },
        error: function () {

        }
    });
}


$(document).ready(function () {
    FetchList();

    $('#toDoList').submit(function () {
        var toAdd = $('#ListItem').val();

        if (toAdd !== "") {
            $('#ToDoListItems').append('<li class="litodo">' + toAdd + '</li>');
            UpdateList();
        }

        return false;
    });

    $(document).on('dblclick', '.litodo', function () {
        console.log($(this).index());
        $(this).remove();
        UpdateList();
    });

    $('#ListItem').focus(function () {
        $(this).val('');
    });

    $('#ToDoListItems').sortable({
        update: function () {
            UpdateList();
        }
    });

});