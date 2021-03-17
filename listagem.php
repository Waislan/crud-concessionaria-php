<?php
require('conexao.php');

session_start();

if (isset($_SESSION['success'])){
    //echo "<script>alert('" . $_SESSION['success'] . "');</script>";
    if ($_SESSION['success'] === true){
        echo "<script>alert('Veículo apagado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao apagar veículo!');</script>";
    }
    unset($_SESSION['success']);
}

$query = "SELECT * FROM veiculos";

try {
    $statement = $db->prepare($query);
    $statement->execute();
    $_SESSION['successGetCars'] = true;
} catch (Exception $e) {
    echo 'Exception -> ' . $e->getMessage();
    //var_dump($e->getMessage());
    $_SESSION['successGetCars'] = false;
}
$db = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('components/header.php');
    ?>
</head>

<body>
    <div class="container my-3 ">
        <div class="jumbotron mb-3">
            <h1>Logo da Concessionária</h1>
        </div>

        <?php
        include('components/navbar.php');
        ?>

        <section>
            <header class="card-header p-3 mb-3">
                <h2>Veja os nossos veículos</h2>
            </header>
            <div class="card p-2 my-3">


                <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                        
                    echo "<form action=\"services/delete.php\" method=\"POST\">";
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-md-3\">";
                    echo "<img src=\"https://placehold.it/400x400\" class=\"img-thumbnail img-fluid\">";
                    echo "</div>";
                    echo "<div class=\"col-md-9 p-3\">";
                    echo "<h3>Modelo do Veículo</h3>";
                    echo "<p>";
                    echo "<strong>Marca:</strong>" . $row['marca'] . "<br>";
                    echo "<strong>Preço:</strong> R$ " . $row['preco'] . "<br>";
                    echo "<strong>Cor:</strong> " . $row['cor'] . "<br>";
                    echo "<input name=\"marca\" id=\"marca\" value=\"" . $row['marca'] . "\" hidden >";
                    echo "<input name=\"preco\" id=\"marca\" value=\"" . $row['preco'] . "\" hidden>";
                    echo "<input name=\"cor\" id=\"cor\"  value=\"" . $row['cor'] . "\" hidden>";
                    echo "<input name=\"modelo\" id=\"modelo\" value=\"" . $row['modelo'] . "\" hidden>";
                    echo "</p>";
                    echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, repudiandae voluptas maxime optio consequatur tempora assumenda quod doloribus dignissimos exercitationem quo eos voluptatibus. Facilis sit, vero eos exercitationem nobis itaque.</p>";
                    echo "<p class=\"text-right\">";
                    echo "<button href=\"editar.php\" class=\"btn btn-primary\">Editar</button>";
                    echo "<button href=\"services/delete.php\" class=\"btn btn-danger\">Excluir</button>";
                    echo "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</form>";                   
                ?>

                <?php
                /*
                        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                            echo "<div class=\"col-md-3\">";
                            echo "<img src=\"https://placehold.it/400x400\" class=\"img-thumbnail img-fluid\">";
                            echo "</div>";
                            echo "<div class=\"col-md-9 p-3\">";
                            echo "<h3>Modelo do Veículo</h3>";
                            echo "<p>";
                            echo "<strong>Marca:</strong>" . $row['marca'] . "<br>";
                            echo "<strong>Preço:</strong> R$ " . $row['preco'] . "<br>";
                            echo "<strong>Cor:</strong>" . $row['cor'] . "<br>";
                            echo "</p>";
                            echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, repudiandae voluptas maxime optio consequatur tempora assumenda quod doloribus dignissimos exercitationem quo eos voluptatibus. Facilis sit, vero eos exercitationem nobis itaque.</p>";
                            echo "<p class=\"text-right\">";
                            echo "<a href=\"editar.php\" class=\"btn btn-primary\">Editar</a>";
                            echo "<a href=\"services/delete.php\" class=\"btn btn-danger\">Excluir</a>";
                            echo "</p>";
                            echo "</div>";
                        }
                       */
                ?>
<!--
                <form action="services/delete.php" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="https://placehold.it/400x400" class="img-thumbnail img-fluid">
                        </div>
                        <div class="col-md-9 p-3">
                            <h3>Modelo do Veículo</h3>
                            <p>
                                <strong>Marca:</strong> Marca do Veículo <br>
                                <strong>Preço:</strong> R$ 12.500,00 <br>
                                <strong>Cor:</strong> Preto
                                
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, repudiandae voluptas maxime optio consequatur tempora assumenda quod doloribus dignissimos exercitationem quo eos voluptatibus. Facilis sit, vero eos exercitationem nobis itaque.
                            </p>
                            <p class="text-right">
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>
                            </p>
                        </div>
                    </div>
                </form>


                <!-- CRIAR FORM 
                    
                    <div class="col-md-3">
                        <img src="https://placehold.it/400x400" class="img-thumbnail img-fluid">
                    </div>
                    <div class="col-md-9 p-3">
                        <h3>Modelo do Veículo</h3>
                        <p>
                            <strong>Marca:</strong> Marca do Veículo <br>
                            <strong>Preço:</strong> R$ 12.500,00 <br>
                            <strong>Cor:</strong> Preto
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, repudiandae voluptas maxime optio consequatur tempora assumenda quod doloribus dignissimos exercitationem quo eos voluptatibus. Facilis sit, vero eos exercitationem nobis itaque.
                        </p>
                        <p class="text-right">
                            <a href="editar.html" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Excluir</a>
                        </p>
                    </div>
-->
            </div>
        </section>

        <hr>
        <footer class="mb-5">
            <p>&copy; Instituto Federal do Sul de Minas Gerais – IFSULDEMINAS | Campus Poços de Caldas, MG.</p>
        </footer>
    </div>

</body>

</html>