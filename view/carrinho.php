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
            session_start();
            require_once '../dao/ProdutoDAO.php';
            $produtoDAO = new ProdutoDAO();
            $total      = 0;
            echo "<div>";
            echo "  <a href='listarTodosProdutos.php'>Adicionar produtos</a>";
            echo "<div>";
            if ( isset( $_SESSION['carrinho'] ) && !empty( $_SESSION['carrinho'] ) ) {
                echo "<table class='table table-striped table-bordered'>";
                echo "<thead>";
                echo "  <tr>";
                echo "      <th>Nome</th>";
                echo "      <th>Preço</th>";
                echo "      <th>Qtde</th>";
                echo "      <th>Subtotal</th>";
                echo "      <th class='text-center'>Remover</th>";
                echo "  </tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ( $_SESSION['carrinho'] as $key => $qtde ) {
                    $produto = $produtoDAO->findById( $key );
                    $total += $produto["preco"] * $qtde;
                    echo "<tr>";
                    echo "  <td> {$produto["nome"]}</td>";
                    echo "  <td> {$produto["preco"]}</td>";
                    echo "  <td> {$qtde}</td>";
                    echo "  <td> R$ ", number_format(  ( $produto["preco"] * $qtde ), 2, ",", "." ), "</td>";
                    echo "  <td class='text-center'>";
                    echo "      <a href='../controller/carrinhoController.php?id={$produto["id"]}&acao=del'>Remover do carrinho</a>";
                    echo "  </td>";

                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "<div class='row'>";
                echo "  <div class='col-6'>";
                echo "      TOTAL R$ ", number_format( $total, 2, ",", "." );
                echo "  </div>";
                echo "  <div class='col-6' style='text-align: right;'>";
                echo "    <a href='../controller/finalizarComprarController.php'>";
                echo "      <button>Finalizar compra</button>";
                echo "    </a>";
                echo "  </div>";
                echo "</div>";
            } else {
                echo "Não existe produtos no carrinho!";
            }
        ?>
    </div>
</body>

</html>

<div class="row">
                    <div class="col-6">