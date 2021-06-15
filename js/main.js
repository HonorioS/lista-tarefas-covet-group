$(document).ready(function() {

    $(".btn-login").click(function() {
        login()
    })


    $(".logout").click(function() {
        logout()
    })

    $(".menu-gestao-user").click(function() {
        // $(".gestao-utilizador").removeClass('d-none')
        utilizadores()
    })

    $(".btn-close-main-box-user").click(function() {
        $(".gestao-utilizador").addClass('d-none')
    })

    $(".btn-close-form-user").click(function() {
        $(".form-user").addClass('d-none')

        $(".col-form-user").removeClass('border-success')
        $(".col-form-user").removeClass('border-danger')
        $(".col-form-user").addClass('border-dark')

        $(".info-mail").addClass('d-none')
        $("#frEmail").addClass('mb-3')

        limpar_campos();
    })

    $(".btn-open-box-add-user").click(function() {

        $(".btn-add-user").removeClass("d-none")
        $(".btn-update-user").addClass("d-none")

        document.getElementsByClassName("title-form-user")[0].innerHTML = "Novo Utilizador"
        $(".form-user").removeClass('d-none')

    })


    $(".btn-add-user").click(function() {

        registar_utilizador()
    })

    $(".btn-update-user").click(function() {

        atualizar_dados_utilizador(document.getElementById("idUser").value)
    })

    $(".btn-close-box-delet-user").click(function() {

        $(".box-delet-user").addClass('d-none')
    })

    $(".i-close-box-delet").click(function() {

        $(".box-delet-user").addClass('d-none')
    })


    $(".i-delet-user").click(function() {

        apagar_utilizador();
    })


})

function login() {

    var mail = document.getElementById("frUsername").value
    var pass = document.getElementById("frPassword").value
    var url = "./php/login.php";
    var remember = document.getElementById("frRemenber")

    if (mail != "" || pass != "") {

        $.ajax({
            type: "POST",
            crossDomain: true,
            cache: false,
            url: url,
            data: {
                mailPHP: mail,
                passPHP: pass,
            },

            datatype: "text",
            success: function(data) {

                var values = JSON.parse(data);
                var login = values.login;
                var username = values.username;

                switch (login) {

                    case "1":

                        location.href = './admin/'
                        localStorage.setItem('username', username)

                        if (remember.checked == true) {
                            localStorage.setItem('user', mail)
                            localStorage.setItem('pass', pass)
                        }
                        break

                    case "-1":
                        //  alert("invalid login")

                        // $(".box-alerts").hide()
                        //$(".box-alerts").removeClass("d-none").fadeIn(2000)
                        // $(".box-alerts").addClass("d-none").fadeOut(2000)
                        break
                }

            }

        });


    } else {

        alert(" deve  prencher os campos !  ")

    }

}

function carregarDadosLogin() {

    var user = localStorage.getItem("user")
    var pass = localStorage.getItem("pass")

    if (user != undefined && pass != undefined) {

        if (user != null && pass != null) {

            document.getElementById("frUsername").value = user
            document.getElementById("frPassword").value = pass
            document.getElementById("frRemenber").checked = true

        }
    }

}

function logout() {

    var url = "../php/logout.php";
    $.ajax({
        type: "POST",
        crossDomain: true,
        cache: false,
        url: url,
        datatype: "text",
        // success: function(data) {

        // var values = JSON.parse(data);
        // var info = values.info;

        // if (info == "close") {

        // location.href = '../index.php'

        // } else {

        // alert("error close session")
        // }
        //  }

    })

}

function utilizadores() {

    var callFunction = "we_can_go";
    var url = "../php/main.php";
    $.ajax({
        type: "POST",
        crossDomain: true,
        cache: false,
        url: url,
        data: {
            listaUserPHP: callFunction
        },
        datatype: "text",
        success: function(data) {
            if (data != "error") {
                var utilizadores = data.split(',')
                    // alert(data)

                // var utilizadores = data.split(',')
                listaUtilizadores(utilizadores)
                    // localStorage.setItem("items", data)
                    // localStorage.setItem("utilizador", data)

            } else {
                alert(" error")
            }
        }
    });

}


function listaUtilizadores(utilizadores) {

    //  document.getElementsByClassName("gestao-utilizador")[0].style.display = "block"
    $(".gestao-utilizador").removeClass('d-none')

    var tbody = document.getElementsByClassName("body-table")[0]

    //  var count = 0;

    for (i = 0; i < utilizadores.length - 1; i += 6) {


        if (!document.getElementById("trID-" + i)) {

            var tr = document.createElement("tr")
            tr.id = "trID-" + i

            // id 
            var idUser = document.createElement('th')
            idUser.setAttribute("scope", "row")
            idUser.id = "userID-" + i
            idUser.innerHTML = utilizadores[i]
            idUser.value = utilizadores[i]

            // nome 
            var itemNome = document.createElement('td')
            itemNome.id = "itemNome-" + i
            itemNome.innerHTML = utilizadores[i + 1]
            itemNome.value = utilizadores[i + 1]

            // email 
            var itemUser = document.createElement('td')
            itemUser.id = "itemUser-" + i
            itemUser.innerHTML = utilizadores[i + 2]
            itemUser.value = utilizadores[i + 2]

            // pass 
            var itemPass = document.createElement('span')
            itemPass.type = "hidden"
            itemPass.id = "itemPass-" + i
            itemPass.value = utilizadores[i + 3]
            itemPass.style.display = "none"

            // tipo 
            var itemTipo = document.createElement('td')
            itemTipo.id = "itemTipo-" + i
            itemTipo.innerHTML = utilizadores[i + 4]
            itemTipo.value = utilizadores[i + 4]

            // permissao 
            var itemAcesso = document.createElement('input')
            itemAcesso.type = "hidden"
            itemAcesso.id = "itemAcesso-" + i
            itemAcesso.value = utilizadores[i + 5]

            // edit 
            var trEdit = document.createElement('td')
            trEdit.id = "trEdit-" + i
            var call_edit_funct = 'editar_utilizador(`' + i + '`)'

            var edit = document.createElement('i')
            edit.id = "editID-" + i
            edit.style.cursor = "pointer"
            edit.setAttribute('onclick', call_edit_funct)
            edit.setAttribute('class', 'fas fa-pencil-alt fa-1x')

            trEdit.appendChild(edit)

            // deleted
            var call_delet_funct = 'abrir_janela_deletar_user(`' + i + '`)'
            var trDelet = document.createElement('td')
            trDelet.id = "trDelet-" + i

            var delet = document.createElement('i')
            delet.id = "deletID-" + i
            delet.style.cursor = "pointer"
            delet.setAttribute('onclick', call_delet_funct)
            delet.setAttribute('class', 'far fa-trash-alt fa-1x')

            trDelet.appendChild(delet)

            tr.appendChild(idUser)
            tr.appendChild(itemNome)
            tr.appendChild(itemUser)
            tr.appendChild(itemTipo)
            tr.appendChild(trEdit)
            tr.appendChild(trDelet)
            tr.appendChild(itemPass)

            tbody.appendChild(tr)
        }

    }

}

function limpar_campos() {

    document.getElementById("frName").value = ""
    document.getElementById("frEmail").value = ""
    document.getElementById("frPass").value = ""
    document.getElementById("exampleDataList").value = ""
}

function registar_utilizador() {

    var nome = document.getElementById("frName").value
    var email = document.getElementById("frEmail").value
    var password = document.getElementById("frPass").value
    var tipo = document.getElementById("exampleDataList").value
    var mail_pattern = /^[^]+@[^]+\.[a-z]{2,4}$/;

    var callFunction = "ok"
    var url = "../php/main.php";

    if (nome != "" || email != "" || password != "") {

        // validacao do email 
        if (email.match(mail_pattern)) {

            $.ajax({
                type: "POST",
                crossDomain: true,
                cache: false,
                url: url,
                data: {

                    registarUserPHP: callFunction,
                    nomePHP: nome,
                    emailPHP: email,
                    passPHP: password,
                    tipoPHP: tipo
                },
                datatype: "text",
                success: function(data) {

                    var values = JSON.parse(data);
                    var info = values.info;

                    switch (info) {

                        case "add":

                            limpar_campos()
                            $(".info-mail").addClass('d-none')
                            $("#frEmail").addClass('mb-3')
                            $(".col-form-user").removeClass('border-dark')
                            $(".col-form-user").addClass('border-success')

                            break

                        case "error":
                            alert(info + " try again ")

                            $(".col-form-user").removeClass('border-dark')
                            $(".col-form-user").addClass('border-danger')

                            $(".info-mail").addClass('d-none')
                            $("#frEmail").addClass('mb-3')

                            break

                        case "existe":

                            alert("o email que pretende inserir já " + info + " deve inserir outro email ")

                            $(".col-form-user").removeClass('border-dark')
                            $(".col-form-user").addClass('border-danger')

                            $(".info-mail").addClass('d-none')
                            $("#frEmail").addClass('mb-3')

                            break
                    }

                }
            });
        } else {

            $(".info-mail").removeClass('d-none')
            $("#frEmail").removeClass('mb-3')
            document.getElementsByClassName("info-mail")[0].innerHTML = "Email invalido"
        }

    } else {

        alert("Deve Preencher os Campos ! ")
    }

}

function editar_utilizador(id) {


    document.getElementsByClassName("title-form-user")[0].innerHTML = "Editar Utilizador"

    var nome = document.getElementById("itemNome-" + id).value
    var mail = document.getElementById("itemUser-" + id).value
    var tipo = document.getElementById("itemTipo-" + id).value
    var pass = document.getElementById("itemPass-" + id).value
    var id = document.getElementById("userID-" + id).value

    if (nome != "" || mail != "" || pass != "") {

        document.getElementById("idUser").value = id
        document.getElementById("frName").value = nome
        document.getElementById("frEmail").value = mail
        document.getElementById("frPass").value = pass
        document.getElementById("exampleDataList").value = tipo

        $(".btn-add-user").addClass("d-none")
        $(".btn-update-user").removeClass("d-none")

        $(".form-user").removeClass('d-none')

    } else {

        alert("campos vazios")

    }

}

function atualizar_dados_utilizador(id) {

    var nome = document.getElementById("frName").value
    var mail = document.getElementById("frEmail").value
    var tipo = document.getElementById("exampleDataList").value
    var pass = document.getElementById("frPass").value

    var mail_pattern = /^[^]+@[^]+\.[a-z]{2,4}$/;
    var callFunction = "ok"

    var url = "../php/main.php";

    if (nome != "" || mail != "" || tipo != "" || pass != "") {

        // validacao do email 
        if (mail.match(mail_pattern)) {

            $.ajax({
                type: "POST",
                crossDomain: true,
                cache: false,
                url: url,
                data: {
                    nomePHP: nome,
                    emailPHP: mail,
                    passPHP: pass,
                    tipoPHP: tipo,
                    idPHP: id,
                    updatePHP: callFunction,
                },

                datatype: "text",

                success: function(data) {

                    var values = JSON.parse(data);
                    var info = values.info;
                    switch (info) {

                        case "update":

                            limpar_campos()

                            $(".info-mail").addClass('d-none')
                            $("#frEmail").addClass('mb-3')

                            $(".col-form-user").removeClass('border-dark')
                            $(".col-form-user").addClass('border-success')

                            break

                        case "error":

                            alert("UPDATE " + info + " try again ")

                            $(".col-form-user").removeClass('border-dark')
                            $(".col-form-user").addClass('border-danger')

                            $(".info-mail").addClass('d-none')
                            $("#frEmail").addClass('mb-3')
                            break

                    }

                }

            })


        }

    } else {


        alert("Deve Preencher Campos !")

    }

}

function apagar_utilizador() {

    var id = localStorage.getItem("id")
    var callFunction = "we_can_go";
    var url = "../php/main.php";

    $.ajax({
        type: "POST",
        crossDomain: true,
        cache: false,
        url: url,
        data: {

            idPHP: id,
            deletPHP: callFunction
        },
        datatype: "text",
        success: function(data) {

            var values = JSON.parse(data);
            var info = values.info;
            switch (info) {
                case "delet":
                    alert(info + " succesfull")

                    $(".box-delet-user").removeClass('border-warning')
                    $(".box-delet-user").addClass('border-success')

                    break

                case "error":
                    alert(info + " delet user ")
                    $(".box-delet-user").removeClass('border-warning')
                    $(".box-delet-user").addClass('border-danger')
                    break

            }

        }
    })

}


function abrir_janela_deletar_user(id) {

    var id = document.getElementById("userID-" + id).value
    localStorage.setItem("id", id)
    $(".box-delet-user").removeClass('d-none')

}