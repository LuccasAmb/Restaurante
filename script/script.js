/* jQuery.fn.clickToggle = function (a, b) {
    var ab = [b, a];
    return this.on("click", function () { ab[this._tog ^= 1].call(this); });
}; */


var PageName = getPageName(location.href);

var CurrentImage;

function checkNivel(nivel) {
    $("#" + nivel).prop("checked", true);
}

function getPageName(url) {
    var index = url.lastIndexOf("/") + 1;
    var filenameWithExtension = url.substr(index);
    var filename = filenameWithExtension.split(".")[0];
    return filename;
}

function DateFormat(input) {
    if (input !== null || input !== "NULL") {
        var datePart = input.match(/\d+/g),
            year = datePart[0].substring(2), // get only two digits
            month = datePart[1], day = datePart[2];
        return day + '/' + month + '/' + year;
    } else {
        return "01/01/01"
    }
}


var ordSort = "DESC";
var sort = $(this).attr('sort');
function LoadTable() {
    if (!sort) {
        sort = "default";
    }

    var html = "";
    var form = document.getElementById("search");
    var formData = new FormData(form);
    formData.append('sort', sort);
    formData.append('ord', ordSort);
    console.log(PageName);
    $.ajax({
        url: 'php/search.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            switch (PageName) {
                case "funcionarios":
                    var html = "<div class='container'><div class='row justify-content-center'></div></div><div class='table-responsive mw-100'><table class='table table-wrap table-hover table-striped table-bordered'><thead><tr><th scope='col'><a class='noLink sort' href='#'>#</a></th><th scope='col'><a class='noLink sort' href='#'>Nome</a></th><th scope='col'>Telefone</th><th scope='col'>Cargo</th><th scope='col'><a class='noLink sort' href='#'>Salário</a></th><th scope='col'><a class='noLink sort' href='#'>Data de Admiss.</a></th><th scope='col'>Foto</th></tr></thead><tbody>";
                    $.each(response, function (key, value) {
                        html += "<tr><td>" + value.IDFuncionarios + "</td>";
                        html += "<td><a class='showModal' thisID='" + value.IDFuncionarios + "' href='#'>" + value.Nome + "</a></td>";
                        html += "<td>" + value.Telefone + "</td>";
                        html += "<td>" + value.Cargo + "</td>";
                        html += "<td> R$" + value.Salario + "</td>";
                        html += "<td>" + DateFormat(value.DataAdmissao) + "</td>";
                        html += "<td><img class='table-image' src='img/funcionarios/" + value.Foto + "'/></td></tr>";
                    });
                    html += "</tbody></table></div>";
                    break;

                case "produtos":
                    var html = "<div class='row justify-content-center'><div class='container'><div class='row justify-content-center'></div></div><div class='table-responsive mw-100'><table class='table table-wrap table-hover table-striped table-bordered'><thead><tr><th scope='col'><a class='noLink sort' href='#'>#</a></th><th scope='col'><a class='noLink sort' href='#'>Nome</a></th><th scope='col'><a class='noLink sort' href='#'>Qtd.</a></th><th scope='col'>Cód. Barra</th><th scope='col'><a class='noLink sort' href='#'>Data de Fabric.</a></th><th scope='col'><a class='noLink sort' href='#'>Data de Val.</a></th><th scope='col'>Fornecedor</th><th scope='col'>Categoria</th><th scope='col'>Foto</th></tr></thead><tbody>";
                    $.each(response, function (key, value) {
                        html += "<tr><td>" + value.IDProdutos + "</td>";
                        html += "<td><a class='showModal' thisID='" + value.IDProdutos + "' href='#'>" + value.Nome + "</a></td>";
                        html += "<td>" + value.Qtd + " " + value.Medida + "</td>";
                        html += "<td>" + value.CodBarra + "</td>";
                        html += "<td>" + DateFormat(value.DataFab) + "</td>";
                        html += "<td>" + DateFormat(value.DataVal) + "</td>";
                        html += "<td>" + value.Fornecedor + "</td>";
                        html += "<td>" + value.Categoria + "</td>";
                        html += "<td><img class='table-image' src='img/produtos/" + value.Foto + "'/></td></tr>";
                    });
                    html += "</tbody></table></div>";
                    break;

                case "fornecedores":
                    var html = "<div class='row justify-content-center'><div class='container'><div class='row justify-content-center'></div></div><div class='table-responsive mw-100'><table class='table table-wrap table-hover table-striped table-bordered'><thead><tr><th scope='col'><a class='noLink sort' href='#'>#</a></th><th scope='col'><a class='noLink sort' href='#'>Nome</a></th><th scope='col'>Telefone</th><th scope='col'>Endereço</th><th scope='col'>E-mail</th><th scope='col'>CEP</th><th scope='col'>Foto</th></tr></thead><tbody>";
                    $.each(response, function (key, value) {
                        html += "<tr><td>" + value.IDFornecedores + "</td>";
                        html += "<td><a class='showModal' thisID='" + value.IDFornecedores + "' href='#'>" + value.Nome + "</a></td>";
                        html += "<td>" + value.Telefone + "</td>";
                        html += "<td>" + value.Endereco + "</td>";
                        html += "<td>" + value.Email + "</td>";
                        html += "<td>" + value.CEP + "</td>";
                        html += "<td><img class='table-image' src='img/fornecedores/" + value.Foto + "'/></td></tr>";
                    });
                    html += "</tbody></table></div>";
                    break;

                case "pratos":
                    var html = "<div class='row justify-content-center'><div class='container'><div class='row justify-content-center'></div></div><div class='table-responsive mw-100'><table class='table table-wrap table-hover table-striped table-bordered'><thead><tr><th scope='col'><a class='noLink sort' href='#'>#</a></th><th scope='col'><a class='noLink sort' href='#'>Nome</a></th><th scope='col'>Descrição</th><th scope='col'><a class='noLink sort' href='#'>Preço</a></th><th scope='col'>Foto</th></tr></thead><tbody>";
                    $.each(response, function (key, value) {
                        html += "<tr><td>" + value.IDPratos + "</td>";
                        html += "<td><a class='showModal' thisID='" + value.IDPratos + "' href='#'>" + value.Nome + "</a></td>";
                        html += "<td>" + value.Descricao + "</td>";
                        html += "<td>R$ " + value.Preco + "</td>";
                        html += "<td><img class='table-image' src='img/pratos/" + value.Foto + "'/></td></tr>";
                    });
                    html += "</tbody></table></div>";
                    break;

                case "cardapio":
                    var html = '<div class="row">';
                    $.each(response, function (key, value) {
                        html += '<div class="col-md-6 col-lg-4 col-sm-12 mb-3" thisID="' + value.IDPratos + '">';
                        html += '<div class="card" style="width: 18rem;">';
                        html += "<img class='card-img-top' src='img/pratos/" + value.Foto + "'/>";
                        html += '<div class="card-body text-center">';
                        html += "<h3 class='card-title'>" + value.Nome + "</h5>";
                        html += "<p class='card-text'>" + value.Descricao + "</p>";
                        html += "<h5 class='card-title money'>R$ " + value.Preco + "</h5>";
                        html += '<a href="#" class="btn btn-primary showModal" thisID="' + value.IDPratos + '" href="#">Comprar</a>';
                        html += '</div></div></div>';
                    });
                    html += "</div>";
                    break;

                case "mesas":
                    var html = "<div class='row justify-content-center'><div class='container'><div class='row justify-content-center'></div></div><div class='table-responsive mw-100'><table class='table table-wrap table-hover table-striped table-bordered'><thead><tr><th scope='col'><a class='noLink sort' href='#'>#</a></th><th scope='col'><a class='noLink sort' href='#'>Nome</a></th><th scope='col'>IP</th></tr></thead><tbody>";
                    $.each(response, function (key, value) {
                        html += "<tr><td>" + value.IDMesas + "</td>";
                        html += "<td><a class='showModal' thisID='" + value.IDMesas + "' href='#'>" + value.Nome + "</a></td>";
                        html += "<td>" + value.IP + "</td></tr>";
                    });
                    html += "</tbody></table></div>";
                    break;


            }

            $("#tableDiv").html(html);
        },
        complete: function () {
            console.log('competlo');

        }
    });
}

function LoadCart() {
    var html = "";
    var html2 = "";
    var html3 = "";

    var tableoption = $('input[name=tableoptions]:checked').val();
    console.log(tableoption);
    console.log(PageName);
    $.ajax({
        type: 'POST',
        url: 'php/cart.php',
        dataType: 'json',
        data: {
            action: "loadcart",
            page: PageName,
            tableoption: tableoption
        },
        success: function (response) {
            console.log(response);
            switch (PageName) {
                case "cozinha":
                case "atendimento":
                    if (response == 0) {
                        html = '<div class="row"><div class="col text-center mt-4"><h1>Não há pedidos!</h1></div></div>';
                    } else {
                        html += '<div class="row">';
                        $.each(response, function (key, value) {
                            if (value.IDPedidos) {
                                html += '<div class="col-md-4 col-lg-4 col-sm-6 my-3"><div class="card"><div class="card-body justify-content-center">';
                                html += '<h5 class="card-title">Pedido ' + value.IDPedidos + '</h5>';
                                html += '<p class="card-text">' + value.Cliente + '</p>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'aberto" type="checkbox" checked/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Aberto</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'enviado" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Encaminhado</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'preparo" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Em preparo</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'pronto" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Pronto</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'entregue" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Entregue</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'finalizado" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Finalizado</label></div></div></div>';
                                html += '<p class="card-text"><b>Mesa: </b>' + value.Mesa + ' <i>(' + value.IP + ')</i></p>';
                                html += '<h5 class="card-title"><small>Total: </small><b class="money">R$ ' + value.Total + '</b></h5>';
                                html += '<div class="text-center"><a class="showModal btn btn-primary" thisaction="' + value.Estado + '" thisID="' + value.IDPedidos + '" href="#">Exibir</a></div>';
                                html += '</div></div></div>';
                            }
                        });
                        html += '</div>';
                    }
                    $("#tableDiv").html(html);
                    $.each(response, function (key, value) {
                        switch (value.Estado) {
                            case "aberto":
                                $('input[cart=c' + key + 'aberto]').prop('checked', true);
                                break;
                            case "enviado":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                break;
                            case "preparo":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                break;
                            case "pronto":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                $('[cart=c' + key + 'pronto]').prop('checked', true);
                                break;
                            case "entregue":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                $('[cart=c' + key + 'pronto]').prop('checked', true);
                                $('[cart=c' + key + 'entregue]').prop('checked', true);
                                break;
                            case "finalizado":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                $('[cart=c' + key + 'pronto]').prop('checked', true);
                                $('[cart=c' + key + 'entregue]').prop('checked', true);
                                $('[cart=c' + key + 'finalizado]').prop('checked', true);
                                break;

                        }
                    });
                    break;

                case "pedidos":
                    if (response == 0) {
                        html = '<div class="row"><div class="col text-center mt-4"><h1>Não há pedidos, comece um novo pedido!</h1></div></div>';
                        html += '<div class="row"><div class="col text-center mt-4"><a class="btn btn-primary" id="newCart" href="#">Criar novo pedido</a></div></div>';
                    } else {
                        html += '<div class="row">';
                        $.each(response, function (key, value) {
                            if (value.IDPedidos) {
                                html += '<div class="col-md-4 col-lg-4 col-sm-6 my-3"><div class="card"><div class="card-body justify-content-center">';
                                if (value.Estado == "aberto") {
                                    html += '<h5 class="card-title">Pedido ' + value.IDPedidos + '<i class="fa fa-trash float-right" aria-hidden="true"></i></h5>';
                                } else {
                                    html += '<h5 class="card-title">Pedido ' + value.IDPedidos + '</h5>';
                                }
                                html += '<p class="card-text">' + value.Cliente + '</p>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'aberto" type="checkbox" checked/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Aberto</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'enviado" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Encaminhado</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'preparo" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Em preparo</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'pronto" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Pronto</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'entregue" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Entregue</label></div></div></div>';
                                html += '<div class="form-check my-3"><div class="pretty p-icon p-round p-pulse p-locked"><input cart="c' + key + 'finalizado" type="checkbox"/><div class="state p-primary"><i class="icon mdi mdi-check"></i><label>Finalizado</label></div></div></div>';
                                html += '<h5 class="card-title"><small>Total: </small><b class="money">R$ ' + value.Total + '</b></h5>';
                                html += '<div class="text-center"><a class="showModal btn btn-primary" thisaction="' + value.Estado + '" thisID="' + value.IDPedidos + '" href="#">Exibir</a></div>';
                                html += '</div></div></div>';
                            }
                        });
                        html += '<div class="col-md-4 col-lg-4 col-sm-6 my-3"><div class="card"><div class="card-body text-center">';
                        html += '<a id="newCart" class="noLink" href="#"><h5>Adicionar novo pedido</h5></a>';
                        html += '</div></div></div>';
                        html += '</div>';

                    }

                    $("#tableDiv").html(html);
                    $.each(response, function (key, value) {
                        switch (value.Estado) {
                            case "aberto":
                                $('input[cart=c' + key + 'aberto]').prop('checked', true);
                                break;
                            case "enviado":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                break;
                            case "preparo":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                break;
                            case "pronto":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                $('[cart=c' + key + 'pronto]').prop('checked', true);
                                break;
                            case "entregue":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                $('[cart=c' + key + 'pronto]').prop('checked', true);
                                $('[cart=c' + key + 'entregue]').prop('checked', true);
                                break;
                            case "finalizado":
                                $('[cart=c' + key + 'aberto]').prop('checked', true);
                                $('[cart=c' + key + 'enviado]').prop('checked', true);
                                $('[cart=c' + key + 'preparo]').prop('checked', true);
                                $('[cart=c' + key + 'pronto]').prop('checked', true);
                                $('[cart=c' + key + 'entregue]').prop('checked', true);
                                $('[cart=c' + key + 'finalizado]').prop('checked', true);
                                break;

                        }
                    });
                    break;

            }

        }
    });
}

function fetchModals(element) {
    var thisID = $(element).attr("thisID");
    var thisaction = $(element).attr("thisaction");
    if (thisID !== '') {
        $.ajax({
            url: "php/fetch.php",
            method: "POST",
            data: {
                thisID: thisID,
                idCart: $("#postidCart").val(),
                tab: PageName,
                action: thisaction
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                switch (PageName) {
                    case "funcionarios":
                        $("#image").attr('src', "img/funcionarios/" + data.Foto);
                        $("#id").val(data.IDFuncionarios);
                        $("#nome").val(data.Nome);
                        $("#tel").val(data.Telefone);
                        $('input[type=radio][value=' + data.Nivel + ']').prop("checked", true);
                        $("#cargo").html(data.htmlCargo);
                        $("#cargo").val(data.IDCargos).change();
                        $("#sal").val(data.Salario);
                        $("#dataAdm").val(data.DataAdmissao);
                        $("#dataNasc").val(data.DataNasc);
                        $("#end").val(data.Endereco);
                        $("#cep").val(data.CEP);
                        $("#cpf").val(data.CPF);
                        $("#modalTitle").html("Informações do funcionário");
                        break;

                    case "produtos":
                        $("#image").attr('src', "img/produtos/" + data.Foto);
                        $("#id").val(data.IDProdutos);
                        $("#nome").val(data.Nome);
                        $("#cod").val(data.CodBarra);
                        $("#preco").val(data.Preco);
                        $("#qtd").val(data.Qtd);
                        $("#dataFab").val(data.DataFab);
                        $("#dataVal").val(data.DataVal);
                        $("#idForn").html(data.htmlForn);
                        $("#idForn").val(data.IDFornecedores).change();
                        $("#categoria").html(data.htmlCat);
                        $("#categoria").val(data.IDCategorias).change();
                        $("#medida").html(data.htmlMedidas);
                        $("#medida").val(data.IDMedidas).change();
                        $("#modalTitle").html("Informações do produto");
                        break;

                    case "fornecedores":
                        $("#image").attr('src', "img/fornecedores/" + data.Foto);
                        $("#id").val(data.IDFornecedores);
                        $("#nome").val(data.Nome);
                        $("#tel").val(data.Telefone);
                        $("#email").val(data.Email);
                        $("#end").val(data.Endereco);
                        $("#cep").val(data.CEP);
                        $("#prazo").val(data.Prazo);
                        $("#cnpj").val(data.CNPJ);
                        $("#formModal").find('[name="pag[]"]').each(function (index, value) {
                            $(this).prop("checked", false);
                        });
                        if (data.Pagamento == "" || data.Pagamento == null || data.Pagamento == "null" || data.Pagamento == undefined) {
                        } else {
                            var pag = data.Pagamento.split(",");
                            for (var i = 0; i < pag.length; i++) {
                                if (pag[i] === "dinheiro" || pag[i] === "credito" || pag[i] === "debito" || pag[i] === "boleto" || pag[i] === "cheque") {
                                    document.getElementById(pag[i]).checked = true;
                                }
                            }
                        }
                        $("#obs").val(data.Observacoes);
                        $("#modalTitle").html("Informações do fornecedor");
                        break;

                    case "pratos":
                        $("#image").attr('src', "img/pratos/" + data.Foto);
                        $("#id").val(data.IDPratos);
                        $("#nome").val(data.Nome);
                        $("#preco").val(data.Preco);
                        $("#desc").val(data.Descricao);
                        $(".ingrediente").html(data.htmlIngrediente);
                        $(".medida").html(data.htmlMedida);
                        $("#modalTitle").html("Informações do prato");
                        $(".ingrediente:first").val(data.Ingredientes[0].IDProdutos).change();
                        $(".medida:first").val(data.Ingredientes[0].IDMedidas).change();
                        $(".qtd:first").val(data.Ingredientes[0].Qtd);
                        for (var i = 1; i < data.Ingredientes.length; i++) {
                            $(".divIng").append($(".ingredientes:first").clone()).html();
                            $(".autoDelete:last").show();
                            $("input[type=number]:last").val("");
                            $(".ingrediente:last").val(data.Ingredientes[i].IDProdutos).change();
                            $(".medida:last").val(data.Ingredientes[i].IDMedidas).change();
                            $(".qtd:last").val(data.Ingredientes[i].Qtd);
                        }
                        break;

                    case "mesas":
                        $("#id").val(data.IDMesas);
                        $("#nome").val(data.Nome);
                        $("#ip").val(data.IP);
                        $("#modalTitle").html("Informações da mesa");
                        break;

                    case "cardapio":
                        $("#id").val(data.IDPratos);
                        $("#idCart").val($("#postidCart").val());
                        $("#tab").val(PageName);
                        $("#modalImg").attr('src', "img/pratos/" + data.Foto);
                        $("#nome").html(data.Nome);
                        $("#preco").html("R$ " + data.Preco);
                        $("#desc").html(data.Descricao);
                        if (val.QtdAtt == "") {
                            $("#qtd").val(0);
                        } else {
                            $("#qtd").val(data.QtdAtt);
                        }
                        $("#obs").val(data.Obs);
                        break;

                    case "pedidos":
                        var html = "";
                        $("#modalTitle").html("Informações do Pedido " + data.IDPedidos + " - [" + data.Estado.toUpperCase() + "]");
                        if (data.Pedidos) {
                            $.each(data.Pedidos, function (key, value) {
                                html += '<div class="row justify-content-center">';
                                html += '<div class="card mb-3" style="max-width: 540px;">';
                                html += '<div class="row no-gutters">';
                                html += '<div class="col-md-4">';
                                html += "<img class='card-img-top' src='img/pratos/" + value.Foto + "'/></div>";
                                html += '<div class="col-md-8">';
                                html += '<div class="card-body text-center">';
                                html += '<input type="hidden" id="idCart" value="' + data.IDPedidos + '">';
                                html += "<h5 class='card-title'>" + value.Nome + "</h5>";
                                html += "<h5 class='card-title money'>R$ " + (value.Preco * value.Qtd) + "</h5>";
                                html += '<h5 class="card-title">' + value.Qtd + ' unidade(s) </br><h6><small class="font-weight-bold">R$ ' + value.Preco + ' cada</small></h6></h5>';
                                if (value.Obs !== null) {
                                    html += '<p class="card-text"><b>Observações: </b>' + value.Obs + '</p>';
                                }
                                html += '</div></div></div></div></div>';
                            });
                            switch (data.Estado) {
                                case "aberto":
                                    html += '<form action="cardapio.php" id="postCardapio" method="POST" enctype="multipart/form-data">';
                                    html += '<input type="hidden" name="idCart" value="' + data.IDPedidos + '">';
                                    html += '</form>';
                                    html += '<button type="submit" form="postCardapio" class="btn btn-primary mx-2">Editar pedido</button>';

                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="enviado" href="#">Enviar pedido</a>';
                                    break;
                                case "enviado":
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="aberto" href="#">Cancelar envio</a>';
                                    break;
                                case "entregue":
                                    html += '<p><b>Ao clicar em finalizar pedido, um atendente irá à sua mesa para acertar o pagamento!</b></p>';
                                    html += '<a class="noLink btn btn-primary mx-2 callPayment" href="#">Finalizar pedido</a>';
                                    break;
                            }
                            html += '<a class="noLink btn btn-dark mx-2"  data-dismiss="modal" aria-label="Close" href="#">Fechar</a>';
                        } else {
                            html += '<form action="cardapio.php" method="POST" enctype="multipart/form-data">';
                            html += '<input type="hidden" name="idCart" value="' + data.IDPedidos + '">';
                            html += '<h3>Não há itens no seu pedido</h3>';
                            html += '<button type="submit" class="btn btn-primary mx-2">Adicionar itens ao pedido</button>';
                            html += '</form>';
                        }

                        $("#divModal").html(html);
                        break;

                    case "cozinha":
                    case "atendimento":
                        var html = "";
                        $("#modalTitle").html("Informações do Pedido " + data.IDPedidos + " - [" + data.Estado.toUpperCase() + "]");
                        if (data.Pedidos) {
                            $.each(data.Pedidos, function (key, value) {
                                html += '<div class="row justify-content-center">';
                                html += '<div class="card mb-3" style="max-width: 540px;">';
                                html += '<div class="row no-gutters">';
                                html += '<div class="col-md-4">';
                                html += "<img class='card-img-top' src='img/pratos/" + value.Foto + "'/></div>";
                                html += '<div class="col-md-8">';
                                html += '<div class="card-body text-center">';
                                html += '<input type="hidden" id="idCart" value="' + data.IDPedidos + '">';
                                html += "<h5 class='card-title'>" + value.Nome + "</h5>";
                                html += "<h5 class='card-title money'>R$ " + (value.Preco * value.Qtd) + "</h5>";
                                html += '<h5 class="card-title">' + value.Qtd + ' unidade(s) </br><h6><small class="font-weight-bold">R$ ' + value.Preco + ' cada</small></h6></h5>';
                                if (value.Obs !== null) {
                                    html += '<p class="card-text"><b>Observações: </b>' + value.Obs + '</p>';
                                }
                                html += '</div></div></div></div></div>';
                            });
                            html += '<p class="card-text"><b>Mesa: </b>' + data.Mesa + ' <i>(' + data.IP + ')</i></p>';
                            switch (data.Estado) {
                                case "enviado":
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="preparo" href="#">Preparar pedido</a>';
                                    break;
                                case "preparo":
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="enviado" href="#">Cancelar preparo</a>';
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="pronto" href="#">Pedido pronto</a>';
                                    break;
                                case "pronto":
                                    switch (PageName) {
                                        case "cozinha":
                                            html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="preparo" href="#">Cancelar término do preparo</a>';
                                            break;
                                        case "atendimento":
                                            html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="entregue" href="#">Pedido entregue</a>';
                                            break;
                                    }
                                    break;
                                case "entregue":
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="pronto" href="#">Cancelar entrega</a>';
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="finalizado" href="#">Finalizar pedido</a>';
                                    break;
                                case "finalizado":
                                    html += '<a class="noLink btn btn-primary mx-2 cartfunction" estado="entregue" href="#">Cancelar finalização do pedido</a>';
                                    break;
                            }
                            html += '<a class="noLink btn btn-dark mx-2"  data-dismiss="modal" aria-label="Close" href="#">Fechar</a>';
                        } else {
                            html += '<form action="cardapio.php" method="POST" enctype="multipart/form-data">';
                            html += '<input type="hidden" name="idCart" value="' + data.IDPedidos + '">';
                            html += '<h3>Não há itens no seu pedido</h3>';
                            html += '<button type="submit" class="btn btn-primary mx-2">Adicionar itens ao pedido</button>';
                            html += '</form>';
                        }

                        $("#divModal").html(html);
                        break;
                }
                CurrentImage = data.Foto;
            },
            complete: function () {
                $("#crud").val("update");
            }
        });
    }
}


function ResetModal() {
    $("#addIng").hide();
    $("#btnModal").html("Adicionar");
    $("#txtCat").hide();
    $("#categoria").show();
    $("#txtCargo").hide();
    $("#cargo").show();
    $("#addCat").html(" + Nova");
    $("#cancelImg").hide();
    $(".inputFile").val("");
    $("#img-table img").attr('src', 'img/layout/user.png');
    $("#img-table").show();
    $('#formModal').each(function () {
        this.reset();
    });
    $("#addCat").hide();
}

function FetchConta() {
    let id = $("#id").val();
    $("#btnModal").val("Editar");
    $("#btnModal").hide();
    $.ajax({
        url: "php/fetch.php",
        method: "POST",
        data: {
            tab: PageName,
            thisID: id
        },
        dataType: "json",
        success: function (data) {
            $("#img-table img").attr('src', "img/funcionarios/" + data.Foto);
            $(".id").val(data.IDFuncionarios);
            $("#id").val(data.IDFuncionarios);
            $("#email").val(data.Usuario);
            $("#nome").val(data.Nome);
            $("#tel").val(data.Telefone);
            $("#dataNasc").val(data.DataNasc);
            $("#end").val(data.Endereco);
            $("#cep").val(data.CEP);
        }
    });
}


//window.addEventListener('DOMContentLoaded', function () {

$(document).ready(function () {

    var image = document.getElementById('image');
    var cropBoxData;
    var canvasData;
    var cropper;
    var aspectRatio = 1;
    if (PageName == "pratos") {
        aspectRatio = 16 / 9;
    }

    var initCrop = function () {
        cropper = new Cropper(image, {
            autoCropArea: 0.5,
            aspectRatio: aspectRatio,
            ready: function () {
                //Should set crop box data first here
                cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
            }
        });
    }


    $('#registerModal').on('hidden.bs.modal', function () {
        if (cropper) {
            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
            cropper = null;
        }
        $("#msg-error").html("");
        $(".ingredientes").not(":first").remove();
    });


    var loadFile = function (input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image").attr('src', e.target.result);
                initCrop();
                $("#cancelImg").show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.inputFile').on('change', function () { loadFile(this); });


    $(document).on("click", ".sort", function () {
        if (ordSort == "DESC") {
            ordSort = "ASC";
        } else {
            ordSort = "DESC";
        }
        sort = $(this).text();
        LoadTable();
    });




    //Repetir função de carregamento das tabelas
    if (PageName === "cardapio" || PageName === "mesas" || PageName === "fornecedores" || PageName === "funcionarios" || PageName === "produtos" || PageName === "pratos") {
        LoadTable();
        setInterval(LoadTable, 10000);
    } else if (PageName === "pedidos" || PageName === "cozinha" || PageName === "atendimento") {
        LoadCart();
        setInterval(LoadCart, 3000);
    }
    $('#search').on('submit keyup', function (e) {
        e.preventDefault;
        LoadTable();
        return false;
    });

    if (PageName === "conta") {
        FetchConta();
    }

    var editModal = 0;
    var addCat = 0;
    ResetModal();
    $('#registerModal').on('hidden.bs.modal', function (e) {
        ResetModal();
        editModal = 0;
        addCat = 0;
    });

    $("#deleteModal").hide();

    $("#addModal").click(function () {
        ResetModal();
        CurrentImage = "null.png";
        $("#image").attr('src', "img/layout/null.png");
        if (PageName === "produtos" || PageName === "funcionarios" || PageName === "pratos") {
        }
        $("#formModal input[name='tab']").val(PageName);
        switch (PageName) {
            case "produtos":
                $("#modalTitle").html("Adicionar produto");
                break;
            case "funcionarios":
                $("#modalTitle").html("Adicionar funcionário");
                break;
            case "fornecedores":
                $("#modalTitle").html("Adicionar fornecedor");
                break;
            case "pratos":
                $("#modalTitle").html("Adicionar pratos");
                break;
            case "mesas":
                $("#modalTitle").html("Adicionar mesas");
                break;
        }
        $("#formField").removeAttr("disabled");
        $("#upFile").show();
        $("#btnModal").show();
        $("#btnModal").val("Adicionar");
        $("#crud").val("insert");
        $("#addIng").show();
        $("#editModal").hide();
        $("#deleteModal").hide();
        $("#addCat").html(" + Nova");
        $("#addCat").show();

        $.ajax({
            url: "php/fetch.php",
            method: "POST",
            data: {
                tab: PageName,
                thisID: "1"
            },
            dataType: "json",
            success: function (data) {
                switch (PageName) {
                    case "produtos":
                        $("#idForn").html(data.htmlForn);
                        $("#categoria").html(data.htmlCat);
                        $("#medida").html(data.htmlMedidas);
                        break;
                    case "pratos":
                        $(".ingrediente").html(data.htmlIngrediente);
                        $(".medida").html(data.htmlMedida);
                        break;
                    case "funcionarios":
                        $("#cargo").html(data.htmlCargo);
                        break;
                }
            }

        });

    });

    var timerFetch;
    $(document).on('click', '.showModal', function () {
        fetchModals(this);
        var elementClicked = $(this);
        $("#formField").attr("disabled", "disabled");
        $("#upFile").hide();
        $("#btnModal").hide();
        $("#deleteModal").hide();
        $("#btnModal").val("Editar");
        $("#editModal").html("Editar");
        $("#editModal").show();
        $("#registerModal").modal('show');
        $("#exibirPrato").modal('show');
        $('#registerModal').on('shown.bs.modal', function () {
            $(".autoDelete").hide();
        })
        if (PageName == "pedidos") {
            $("#deleteModal").show();
        }
        if (PageName === "cozinha" && PageName === "atendimento") {
            timerFetch = setInterval(function () {
                fetchModals(elementClicked);
            }, 8000);
        }

    });

    $("#registerModal, #exibirPrato").on('hide.bs.modal', function () {
        clearInterval(timerFetch);
    });


    $("#editModal").click(function () {

        if (editModal == 0) {
            $("#addIng").show();
            $(".autoDelete").show();
            $(".autoDelete:first").hide();
            $("#txtCat").hide();
            $("#categoria").show();
            $("#txtCargo").hide();
            $("#cargo").show();
            $("#addCat").html(" + Nova");
            $("#addCat").show();
            $("#deleteModal").show();
            $("#formField").removeAttr("disabled");
            $("#upFile").show();
            $("#btnModal").show();
            $("#editModal").html("Cancelar");
            editModal++;
        } else {
            editModal--;
            if (cropper) {
                cropper.destroy();
            }
            $("#addIng").hide();
            $(".autoDelete").hide();
            $("#cancelImg").hide();
            $("#image").attr("src", "img/" + PageName + "/" + CurrentImage);
            $("#deleteModal").hide();
            $("#txtCargo").hide();
            $("#cargo").show();
            $("#txtCat").hide();
            $("#categoria").show();
            $("#addCat").hide();
            $("#formField").attr("disabled", "disabled");
            $("#upFile").hide();
            $("#btnModal").hide();
            $("#editModal").html("Editar");
        }
    });

    $("#deleteModal").click(function () {
        var form = document.getElementById("formModal");
        var formData = new FormData(form);
        $.ajax({
            url: "php/delete.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {

            },
            complete: function () {
                if (PageName != "pedidos") {
                    LoadTable();
                } else {
                    LoadCart();
                    $("#exibirPrato").modal('hide');
                }
                $("#registerModal").modal("hide");
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }
        });
    });

    $("#cancelImg").click(function () {
        $(".inputFile").val("");
        cropper.destroy();
        $("#image").attr('src', 'img/' + PageName + '/' + CurrentImage);
        $(this).hide();
    });


    $("#addCat").click(function () {
        if (addCat === 0) {
            $("#txtCargo").show();
            $("#cargo").hide();
            $("#cargo").prop('selectedIndex', 0);
            $("#categoria").prop('selectedIndex', 0);
            $("#categoria").hide();
            $("#txtCat").show();
            $(this).html(" - Cancelar");
            addCat++;
        } else {
            $("#txtCargo").hide();
            $("#cargo").show();
            $("#categoria").show();
            $("#txtCat").hide();
            $(this).html(" + Nova");
            $("#txtCat").val("");
            $("#txtCargo").val("");
            addCat--;
        }
    });


    //Função ao enviar algo no formulário do modal
    $("#formModal").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this),
            url = $(this).attr('action'),
            type = $(this).attr('method');
        console.log(formData);

        if (cropper) {
            var imgSrc = cropper.getCroppedCanvas({
                imageSmoothingQuality: 'high',
                fillColor: '#fff'
            });
            var dataUrl = imgSrc.toDataURL('image/jpeg', 1);
            formData.append("img", dataUrl);
        } else if (CurrentImage) {
            formData.append("filename", CurrentImage);
        }


        var pags = ",";
        $(this).find('[name="pag[]"]').each(function (index, value) {
            if ($(this).is(":checked")) {
                pags += $(this).val() + ",";
            }
        });
        formData.append("pags", pags);

        var inputs = $("#formModal").find("input select");
        var msg = "";
        console.log(inputs);
        for (var i = 0; i < inputs.prevObject[0].length; i++) {
            switch (inputs.prevObject[0][i].localName) {
                case "input":
                    if (inputs.prevObject[0][i].value == "" && inputs.prevObject[0][i].placeholder != "") {
                        switch (inputs.prevObject[0][i].placeholder) {
                            default:
                                msg += inputs.prevObject[0][i].placeholder + ", ";
                                break;
                            case "Cargo":
                                if ($("#cargo").prop('selectedIndex') == 0) {
                                    msg += inputs.prevObject[0][i].placeholder + ", ";
                                }
                                break;
                            case "Categoria":
                                if ($("#categoria").prop('selectedIndex') == 0) {
                                    msg += inputs.prevObject[0][i].placeholder + ", ";
                                }
                                break;
                        }
                    }
                    break;
                case "select":
                    if (inputs.prevObject[0][i].selectedIndex == 0) {
                        switch (inputs.prevObject[0][i].name) {
                            case "idForn":
                                msg += "Fornecedor, ";
                                break;
                            case "medida":
                            case "medida[]":
                                msg += "Medida, ";
                                break;
                            case "ingrediente[]":
                                msg += "Ingrediente, ";
                                break;
                        }
                        
                    }
                    break;
            }

        }
        msg = msg.substring(0, (msg.length - 2));
        if (msg != "") {
            $("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário preencher os campos: ' + msg + '</div>').show;
        }

        if (msg == "") {
            $.ajax({
                url: url,
                type: type,
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    $('#formModal').each(function () {
                        this.reset();
                        if (PageName === "conta") {
                            FetchConta();
                        }
                    });
                    $("#registerModal").modal("hide");
                },
                complete: function () {
                    if (PageName !== "conta" && PageName !== "pedidos") {
                        LoadTable();
                    } else if (PageName == "pedidos") {
                        LoadCart();
                    }
                },
                error: function () {

                }
            });
        }

        $("#exibirPrato").modal("hide");

        return false;
    });

    $("#editPass").click(function () {
        $('#alterarSenha').modal('show');
    });

    $("#formSenha").submit(function () {
        var atual = $("#pass").val();
        var nova = $("#newPass").val();
        var nova2 = $("#newPass2").val();
        let id = $(".id").val();

        $.ajax({
            url: "php/update.php",
            type: "post",
            data: {
                atual: atual,
                nova: nova,
                nova2: nova2,
                id: id
            },
            success: function () {

            }
        })
        return false;
    });

    $(document).on('click', '#newCart', function () {
        $.ajax({
            url: "php/cart.php",
            type: "post",
            data: {
                action: "newCart",
            },
            success: function (response) {
                console.log(response);
            },
            complete: function () {
                LoadCart();
            }
        })
    })

    $(document).on('click', '#cancelCart, #sendCart', function () {
        $("#confirmCart").modal('show');
        switch ($(this).attr('id')) {
            case "cancelCart":
                $("#modalconfirmcartTitle").html("Cancelar pedidos");
                $("#deleteModalCart").show();
                $("#sendModalCart").hide();
                break;
            case "sendCart":
                $("#modalconfirmcartTitle").html("Enviar pedido");
                $("#sendModalCart").show();
                $("#deleteModalCart").hide();
                break;
        }

    });

    $(document).on('click', '.cartfunction', function () {
        var id = $("#idCart").val();
        var estado = $(this).attr('estado');
        $.ajax({
            url: "php/cart.php",
            type: "post",
            data: {
                action: "changeEstado",
                id: id,
                estado: estado,
            },
            success: function () {

            },
            complete: function () {
                LoadCart();
                $('.modal').modal('hide');
            }
        })
    });

    $("#tableoptionsform").change(function () {
        LoadCart();
    });

});


$(document).ready(function () {
    $(document).on('click', '.noLink', function () {
        event.preventDefault();
    });
});

$(document).ready(function () {
    $(".autoDelete:first").hide();
    $("#addIng").click(function () {
        $(".divIng").append($(".ingredientes:first").clone()).html();
        $(".autoDelete:last").show();
        $("input[type=number]:last").val("");
    });

    $(document).on('click', '.autoDelete', function () {
        $(this).parentsUntil(".ingredientes").remove();
    })
});

$(document).on('click', '.number-spinner a', function () {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
    } else {
        if (oldValue > 1) {
            newVal = parseInt(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    btn.closest('.number-spinner').find('input').val(newVal);
});

$(document).ready(function(){
    $("#cpf").mask("000.000.000-00");
    $("#tel").mask("(00) 0 0000-0000");
    $("#cep").mask("00000-000");
    $("#cnpj").mask("00.000.000/0000-00");

    $("#addDespesa").click(function(){
        $("#tipo").val("despesa");
        $("#modalTitle").text("Adicionar despesa diária");
    });
    $("#addReceita").click(function(){
        $("#tipo").val("receita");
        $("#modalTitle").text("Adicionar receita diária");
    });
});