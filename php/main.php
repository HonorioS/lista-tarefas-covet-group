

<?php

include_once 'conection.php';

function listar_de_utilizadores()
{

    global $conexao;
    $consulta = "SELECT * FROM utilizadores  order by ID";
    $result = mysqli_query($conexao, $consulta);

    if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {

            echo $row['ID'] . "," . $row['Nome'] . "," . $row['Email'] . "," . $row['PalavraPasse'] .
                "," . $row['Tipo'] . "," . $row['Permissao'] . ",";
        }
    } else {

        echo "error";
    }
}


if ($_POST['listaUserPHP']) {

    listar_de_utilizadores();
}


function registar_utilizador()
{

    global $conexao;
    $arr = array();

    $nome =  $_POST['nomePHP'];
    $email =  $_POST['emailPHP'];
    $pass =  $_POST['passPHP'];
    $tipo =  $_POST['tipoPHP'];

    $logAcesso = "0";
    $totalAcesso = 0;
    $permissao = 1;

    if (validacao_de_utilizador($email) == 1) {

        $add = "INSERT INTO Utilizadores (Nome,Email,PalavraPasse,TotalAcesso,Tipo,LogsAcesso,Permissao) 
        value('$nome','$email','$pass','$totalAcesso','$tipo','$logAcesso','$permissao')";

        $result = mysqli_query($conexao, $add);

        if ($result) {

            $arr = array("info" => "add");
        } else {

            $arr = array("info" => "error");
        }
    } else {

        $arr = array("info" => "existe");
    }

    echo json_encode($arr);
}

if ($_POST['registarUserPHP']) {

    registar_utilizador();
}

function validacao_de_utilizador($email)
{

    global $conexao;

    $query = "SELECT * FROM utilizadores  WHERE Email='$email'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    if ($row == 0) {

        return 1;  // nao existe 

    } else {

        return -1; // existe 
    }
}


function atualizar_dados_utilizador()
{

    global $conexao;
    $arr = array();
    $nome =  $_POST['nomePHP'];
    $email =  $_POST['emailPHP'];
    $pass =  $_POST['passPHP'];
    $tipo =  $_POST['tipoPHP'];
    $id = $_POST['idPHP'];
    $permissao = 1;

    $update = "UPDATE utilizadores SET Nome='$nome', Email='$email', PalavraPasse='$pass',Tipo='$tipo',Permissao='$permissao'WHERE ID = '$id'";
    $result = mysqli_query($conexao, $update);

    if ($result) {

        $arr = array("info" => "update");
    } else {

        $arr = array("info" => "error");
    }

    echo json_encode($arr);
}

if ($_POST['updatePHP']) {

    atualizar_dados_utilizador();
}

function apagar_utilizador()
{

    global $conexao;
    $arr = array();
    $id =  $_POST['idPHP'];

    $delet =  "DELETE FROM utilizadores WHERE ID='$id'";
    $result = mysqli_query($conexao, $delet);

    if ($result) {

        $arr = array("info" => "delet");

    } else {

        $arr = array("info" => "error");
    }
    echo json_encode($arr);
}

if ($_POST['deletPHP']) {

    apagar_utilizador();
}

?>