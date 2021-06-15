
<?php

session_start();
session_destroy();

//header('Location: ../index.php');

$arr = array();


if (isset($_SESSION['user'])) {

    $arr = array("info"=>"close");
}

echo json_encode($arr);
