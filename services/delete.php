<?php
require('../conexao.php');

session_start();

$data = $_POST;
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$preco = $_POST['preco'];
$cor = $_POST['cor'];

$query = "DELETE FROM veiculos WHERE modelo='" . $modelo . "' AND marca='" . $marca . "' AND preco='" . $preco . "' AND cor='" . $cor . "'";

try {
    $statement = $db->prepare($query);
    $result = $statement->execute();
    $_SESSION['success'] = $result;
    echo 'success';

} catch (Exception $e) {
    echo 'Exception -> ' . $e->getMessage();
    //var_dump($e->getMessage());
    $_SESSION['success'] = false;
}
echo 'not';
$db = null;
header('Location: ../listagem.php');