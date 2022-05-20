<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="styleSheet" href="../lib/fontawesome-6.1.1/css/all.min.css" />
    <script src="../lib/fontawesome-6.1.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap-5.1.3/css/bootstrap.min.css">
    <script src="../lib/bootstrap-5.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <?php
            require_once '../dao/ProdutoDAO.php';
            $produtoDAO = new ProdutoDAO();
            $produtos   = $produtoDAO->findAll();
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead>";
            echo "  <tr>";
            echo "      <th>Nome</th>";
            echo "      <th>Descrição</th>";
            echo "      <th>Preço</th>";
            echo "      <th class='text-center'>Adicionar</th>";
            echo "      <th class='text-center'>Remover</th>";
            echo "  </tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ( $produtos as $produto ) {
                echo "<tr>";
                echo "  <td> {$produto["nome"]}</td>";
                echo "  <td> {$produto["descricao"]}</td>";
                echo "  <td> {$produto["preco"]}</td>";
                echo "  <td class='text-center'>";
                echo "      <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=add'>Adicionar</a>";
                echo "  </td>";
                echo "  <td class='text-center'>";
                echo "      <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=del'>Remover do carrinho</a>";
                echo "  </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
</body>

</html>