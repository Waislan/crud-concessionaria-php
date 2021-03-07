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

$query = 'INSERT INTO veiculos (marca, modelo, ano, preco, foto, cor, descricao) 
        VALUES (:marca, :modelo, :ano, :preco, :foto, :cor, :descricao)';

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
header('Location: ../cadastro.php');