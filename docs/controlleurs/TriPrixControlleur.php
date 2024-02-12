<?php
session_start();

include_once(__DIR__ . "/../DAO/FormationDAO.php");

$success = 0;
$msg = "Une erreur est survenue (ajaxPOC.php)";

if (!empty($_POST['ChoixTri'])){
    $msg = $_POST['ChoixTri'];
    $success = 1;
}

$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);