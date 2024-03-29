<?php
session_start();

if (isset($_SESSION['valid_edit'])) {
    if ($_SESSION['valid_edit'] === false) {
        echo "<script>alert('Edição Inválida!');</script>";
    }
    unset($_SESSION['valid_edit']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('components/header.php');
    ?>

    <script src="https://unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
    <script src="js/editar.js"></script>
</head>

<body>
    <div class="container my-3 ">
        <div class="jumbotron mb-3">
            <h1>Logo da Concessionária</h1>
        </div>

        <?php
        include('components/navbar.php');
        ?>

        <form id="formVeiculo" method="POST" class="row">
            <div class="form-group col-md-6">
                <label>Marca:</label>
                <select id="marca" class="form-control custom-select">
                    <option value="">-- Selecionar --</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Ford">Ford</option>
                    <option value="Hyiundai">Hyiundai</option>
                </select>
                <div class="alert-danger w-100 p-2 d-none">Marca é obrigatório</div>
            </div>
            <div class="form-group col-md-6">
                <label>Modelo:</label>
                <input type="text" id="modelo" class="form-control" value="" placeholder="Insira o nome do modelo">
                <div class="alert-danger w-100 p-2 d-none">Modelo inválido</div>
            </div>
            <div class="form-group col-md-6">
                <label>Ano:</label>
                <input type="number" id="ano" class="form-control" value="" placeholder="Insira o ano do modelo">
                <div class="alert-danger w-100 p-2 d-none">Ano inválido</div>
            </div>
            <div class="form-group col-md-6">
                <label>Preço:</label>
                <input type="text" id="preco" class="form-control" value="" placeholder="Insira o preço do modelo">
                <div class="alert-danger w-100 p-2 d-none">Preço inválido</div>
            </div>
            <div class="form-group col-md-6">
                <label>Foto:</label>
                <input type="text" id="foto" class="form-control" value="" placeholder="Insira o nome da foto">
            </div>
            <div class="form-group col-md-6">
                <label>Cor:</label>
                <select id="cor" class="form-control custom-select">
                    <option value="">-- Selecionar --</option>
                    <option value="Preto">Preto</option>
                    <option value="Branco">Branco</option>
                    <option value="Prata">Prata</option>
                    <option value="Vermelho">Vermelho</option>
                </select>
                <div class="alert-danger w-100 p-2 d-none">Cor é obrigatório</div>
            </div>
            <div class="form-group col-md-12">
                <label>Descrição:</label>
                <textarea class="form-control" id="descricao" rows="10" placeholder="Insira a descrição do veículo"></textarea>
                <div class="alert-danger w-100 p-2 d-none">Descrição é obrigatório</div>
            </div>
            <div class="form-group col-md-12 text-right">
                <button class="btn btn-primary">
                    Salvar Veículo
                </button>
                <button type="reset" class="btn btn-secondary">
                    Limpar
                </button>
            </div>
        </form>
        <hr>
        <footer class="mb-5">
            <p>&copy; Instituto Federal do Sul de Minas Gerais – IFSULDEMINAS | Campus Poços de Caldas, MG.</p>
        </footer>
    </div>

</body>

</html>