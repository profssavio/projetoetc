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
    <script src="../js/jquery-3.6.0.min.js"></script>
    <style>
        #loading_spinner {
            display: none;
        }
    </style>
</head>

<body>
    <div id="loading_spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <div class="container mt-3">
        <?php
            require_once '../dao/ClienteDAO.php';
            include '../js/funcao.php';
            $clienteDAO = new ClienteDAO();
            $clientes   = $clienteDAO->findAll();
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead>";
            echo "  <tr>";
            echo "      <th>Nome</th>";
            echo "      <th>Cpf</th>";
            echo "      <th class='text-center'>Data de nascimento</th>";
            echo "      <th>Sexo</th>";
            echo "      <th>Telefone</th>";
            echo "      <th>E-mail</th>";
            echo "      <th>Perfil</th>";
            echo "      <th class='text-center'>Situação</th>";
            echo "      <th class='text-center'>Excluir</th>";
            echo "      <th class='text-center'>Editar</th>";
            echo "  </tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ( $clientes as $cliente ) {
                echo "<tr>";
                echo "  <td> {$cliente["nome"]}</td>";
                echo "  <td>", formatarCpfCnpj( $cliente["cpf"] ), "</td>";
                echo "  <td class='text-center'> ", date( "d/m/Y", strtotime( $cliente["datanascimento"] ) ), "</td>";
                echo "  <td>", $cliente["sexo"] == "M" ? "Masculino" : "Feminino", "</td>";
                echo "  <td> {$cliente["telefone"]} </td>";
                echo "  <td> {$cliente["email"]} </td>";
                echo "  <td> {$cliente["perfil"]} </td>";
                echo "  <td class='text-center'>";
                $colorSituacao = $cliente["situacao"] == 'A' ? "green" : "red";
                echo "<a href='#' onClick='alterarSituacao({$cliente["id"]});'><i class='fa-solid fa-user' style='color:{$colorSituacao}'></i></a>";
                echo " </td>";
                echo "  <td align='center'><a href='../controller/excluirClienteController.php?id={$cliente["id"]}'><i class='fa-solid fa-trash-can'></a></i></td>";
                echo "  <td align='center'><a href='formAlterarCliente.php?id={$cliente["id"]}&&'><i class='fa-solid fa-pen-to-square'></a></i></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
    <script>
        function alterarSituacao(id) {
            $('#loading_spinner').show();
            $.ajax({
                url: '../controller/alterarSituacaoCliente.php',
                type: 'POST',
                data: "id=" + id,
                success: function(data) {
                    $('#loading_spinner').hide();
                    $.ajax('../view/listarTodosClientes.php').then( function(){
                        console.log("listar");
                       }
                    );
                },
                error: function() {
                    alert("Something went wrong!");
                }
            });
        }
    </script>
</body>

</html>