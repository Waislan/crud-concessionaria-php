<?php
    $usuario = 'root';
    $senha = '';

    try {
        // deletar o :3301 caso o mysql use a porta padrão
        $db = new PDO('mysql:host=localhost:3301;dbname=concessionaria-db', $usuario, $senha);
    } catch (PDOException $e){
        print 'Error!: ' . $e->getMessage() . '<br/>';
    }

    
    
