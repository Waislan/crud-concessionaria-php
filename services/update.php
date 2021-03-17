<?php
require('../conexao.php');

session_start();

$data = $_POST;
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];
$foto = $_POST['foto'];
$cor = $_POST['cor'];
$descricao = $_POST['descricao'];

$_SESSION['valid_edit'] = true;
valida_campos($marca, $modelo, $ano, $preco, $foto, $cor, $descricao);

if($_SESSION['valid_edit'] == true) {
    $query = "UPDATE veiculos
        SET marca='" . $marca . "', modelo='" . $modelo . "', ano='" . $ano . "', preco='" . $preco . "', foto='" . $foto . "', cor='" . $cor . "', descricao='" . $descricao . "'
        WHERE id='" . $id . "'";
    try {
        $statement = $db->prepare($query);
        $statement->execute($data);
        $_SESSION['success'] = true;

    } catch (Exception $e) {
        echo 'Exception -> ' . $e->getMessage();
        //var_dump($e->getMessage());
        $_SESSION['success'] = false;
    }
    $db = null;
}
header('Location: ../cadastro.php');

function valida_campos($marca, $modelo, $ano, $preco, $foto, $cor, $descricao) {
    if(isset($marca) != 1) {
        $_SESSION['valid_edit'] = false;
    }
    else if(is_string($modelo) != 1) {
        $_SESSION['valid_edit'] = false;
    }
    else if(($ano < 1960) or ($ano > 2022)) {
        $_SESSION['valid_edit'] = false;
    }
    else if($preco < 1000){
        $_SESSION['valid_edit'] = false;
    }
    else if(isset($foto) != 1) {
        $_SESSION['valid_edit'] = false;
    }
    else if(isset($cor) != 1) {
        $_SESSION['valid_edit'] = false;
    }
    else if(isset($descricao) != 1) {
        $_SESSION['valid_edit'] = false;
    }
}