<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-ofertas/index.css">
    <link rel="shortcut icon" href="../img/favico.png" type="image/x-icon">
    <title>Produtos</title>
</head>

<body>


    <div class="app">
        <?php include('../template/nav-menu.php'); ?>

        <div class="buscar">
            <form action="">
                <input id="BuscarProduto" type="text" placeholder="Ex.: Laranja">
                <!-- onde rederizo a quantidade total da busca -->
                <p id="totalProdutos"></p>
            </form>
        </div>

        <div class="boxListarProdutos">
            <div id="boxListaProdutos" class="boxListaProdutos">
            </div>
        </div>
    </div>

    <div id="btnCadProduto" class="button-novo">
        <p>+</p>
    </div>




    <div id="myModal" class="myModal">

    </div>



    <div id="myAlert" class="myAlert">
    </div>

    <script type="module" src="../js/admin-ofertas/index.js"></script>
</body>

</html>