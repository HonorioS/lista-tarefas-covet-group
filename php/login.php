
<?php

session_start();
include_once 'conection.php';

global $conexao;


// $user = "admin@covetgroup.pt";
// $pass = "admin";


if (mysqli_real_escape_string($conexao, $_POST['mailPHP']) != "" &&  mysqli_real_escape_string($conexao, $_POST['passPHP'])) {

    $arr = array();

    $user = mysqli_real_escape_string($conexao, $_POST['mailPHP']);
    $pass = mysqli_real_escape_string($conexao, $_POST['passPHP']);


    $query = "SELECT * FROM Utilizadores  WHERE Email = '$user' and PalavraPasse='$pass'";
    $result = mysqli_query($conexao, $query);
    $resultQuery = mysqli_fetch_array($result);
    $row = mysqli_num_rows($result);

    if ($row == 1) {

        $_SESSION['user'] = $user;

        $arr = array(
            "login" => "1",
            "username" => $resultQuery['Nome']
        );
    } else {

        $arr = array("login" => "-1");
    }

    echo json_encode($arr);
}
