<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap-5.1.3/css/bootstrap.min.css">
    <script src="../lib/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <?php
require_once '../dao/ClienteDAO.php';
$idCliente = $_GET['id'];
$clienteDAO = new ClienteDAO();
$cliente = $clienteDAO->findById( $idCliente );
$perfils = $clienteDAO->findAllPerfil();
?>

    <div class="container">
        <div class="col-md-12 mt-5">
            <form id="formCadastroCliente" enctype="multipart/form-data"
                action="../controller/alterarClienteController.php" method="post">
                <input type="hidden" name="idCliente" value="<?php echo $cliente['id'] ?>">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Digite o seu nome" value="<?php echo $cliente['nome'] ?>" required>
                        </div>
                    </div>
                    <div class=" col">
                        <div class="mb-3">
                            <label for="cpf" class="form-label">Cpf</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o seu cpf"
                                value="<?php echo $cliente['cpf'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="dtnasc" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" id="dtnasc" name="dtnasc"
                                value="<?php echo $cliente['datanascimento'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <?php if ( $cliente['sexo'] == "M" ) {?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" checked value="M" id="sexo">
                                <label class="form-check-label" for="sexo">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="F" id="sexo">
                                <label class="form-check-label" for="sexo">
                                    Feminino
                                </label>
                            </div>
                            <?php } else {?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="M" id="sexo">
                                <label class="form-check-label" for="sexo">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" checked value="F" id="sexo">
                                <label class="form-check-label" for="sexo">
                                    Feminino
                                </label>
                            </div>

                            <?php }?>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="tel" class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="tel" id="tel"
                                value="<?php echo $cliente['telefone'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $cliente['email'] ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="senha" class="form-label">Digite uma nova senha</label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="perfil" class="form-label">Perfil</label>
                            <select id="perfil" name="perfil" class="form-select">
                                <option selected>Selecione...</option>
                                <?php
foreach ( $perfils as $p ) {
    if ( $cliente['idperfil'] = $p['id'] ) {
        echo "<option value='{$p['id']}' selected>{$p['perfil']}</option>";
    } else {
        echo "<option value='{$p['id']}'>{$p['perfil']}</option>";
    }
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                          <img src="../image/cliente/foto/<?php echo $cliente["foto"] ?>" width="112"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>


            </form>
        </div>

</body>

</html>