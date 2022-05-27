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
            require_once '../dao/PedidoDAO.php';
            $pedidoDAO = new PedidoDAO();
            $pedidos   = $pedidoDAO->findAll();
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead>";
            echo "  <tr>";
            echo "      <th>Cliente</th>";
            echo "      <th>Nº do Pedido</th>";
            echo "      <th>Data da Pedido</th>";
            echo "      <th>Valor Total</th>";
            echo "      <th>Visualizar Produtos</th>";
            echo "  </tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ( $pedidos as $pedido ) {
                echo "<tr>";
                echo "  <td> {$pedido["nome"]}</td>";
                echo "  <td> {$pedido["id"]}</td>";
                echo "  <td> ", date( "d/m/Y - H:m", strtotime( $pedido["data"] ) ), "</td>";
                echo "  <td> {$pedido["total"]}</td>";
                echo "  <td align='center'>";
                echo "      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#visualizarProdutos'>";
                echo "          Visualizar";
                echo "      </button>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
    <div>

<!-- Modal -->
<div class="modal fade" id="visualizarProdutos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produtos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </div>
</body>

</html>