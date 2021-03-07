<?php
    $usuario = 'root';
    $senha = '';

    try {
        // exclua ":3308" se o seu MySQL usa a porta padrão (3306)
        $db = new PDO('mysql:host=localhost:3308;dbname=concessionaria-db', $usuario, $senha);
    } catch (PDOException $e){
        print 'Error!: ' . $e->getMessage() . '<br/>';
    }

    
    
