<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap-5.1.3/css/bootstrap.min.css">
    <script src="../lib/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <style>
         .error{
            color: #a94442;
            font-style: italic;
            font-size: 10px;
         }
         .has-success .form-control {
            border-color: #3c763d;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
        }
        .has-success .form-control:focus {
            border-color: #2b542c;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168
        }
        .has-error .form-control {
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
        }

        .has-error .form-control:focus {
            border-color: #843534;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483
        }
        .has-success .checkbox,
        .has-error .checkbox,

        .checkbox input[type=checkbox],

    </style>

</head>

<body>
    <?php
        require_once '../dao/ClienteDAO.php';
        $clienteDAO = new ClienteDAO();
        $perfils    = $clienteDAO->findAllPerfil();
    ?>
    <div class="container">
        <div class="col-md-12 mt-3">
            <form id="formCadastroCliente" enctype="multipart/form-data" action="../controller/cadastrarClienteController.php" method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome *</label>
                            <span class="inputErro">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu nome" required>
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="cpf" class="form-label">Cpf</label>
                            <span class="inputErro">
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o seu cpf">
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="dtnasc" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" id="dtnasc" name="dtnasc">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="M" id="sexo">
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
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="tel" class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="perfil" class="form-label">Perfil</label>
                            <select id="perfil" name="perfil" class="form-select">
                                <option selected>Selecione...</option>
                                <?php
                                    foreach ( $perfils as $p ) {
                                        echo "<option value='{$p['id']}'>{$p['perfil']}</option>";
                                    }
                                ?>
                            </select>
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
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>


            </form>
        </div>

        <?php
            if ( isset( $_GET['msg'] ) ) {
                echo $_GET['msg'];
            }
        ?>
    </div>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#tel').mask('(00) 00000-0000');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#formCadastroCliente").validate({
                rules: {
                    nome: {
                        required: true,
                        minlength: 2
                    },
                    cpf: {
                        required: true,
                    }
                },
                messages: {
                    nome: {
                        required: "Por favor insira seu Nome",
                        minlength: "Seu nome deve ter pelo menos 2 caracteres"
                    },
                    cpf: {
                        required: "Por favor insira seu Cpf",
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).parents(".inputErro").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents(".inputErro").addClass("has-success").removeClass("has-error");
                }
            });
        });
    </script>
</body>

</html>