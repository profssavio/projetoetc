<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';
require_once '../util/Upload.php';
include '../js/funcao.php';

define( 'DIR_FOTO', $_SERVER['DOCUMENT_ROOT'] . "/image/cliente/foto/" );

$nome = $_POST['nome'];
$cpf = removerFormatoCpfCnpj( $_POST['cpf'] );
$dataNascimento = $_POST['dtnasc'];
$sexo = $_POST['sexo'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$senha = md5( $_POST['senha'] );
$perfil = $_POST['perfil'];
$foto = $_FILES['foto'];

$upload = new Upload( $foto );

$clienteDTO = new ClienteDTO();
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setDataNascimento( $dataNascimento );
$clienteDTO->setSexo( $sexo );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setEmail( $email );
$clienteDTO->setSenha( $senha );
$clienteDTO->setPerfil( $perfil );
$clienteDTO->setFoto( isset( $foto ) && $foto["error"] == 0 ? $upload->getNome( $foto ) : null );

$clienteDAO = new ClienteDAO();
$cliente = $clienteDAO->findByCpf( $cpf );

$error[1] = "<div class='alert alert-success mt-3' role='alert'>Cadastrado com suceso!</div>";
$error[2] = "<div class='alert alert-warning mt-3' role='alert'>Já existe um cliente cadastro com o cpf " . formatarCpfCnpj( $cpf ) . "</div>";

if ( empty( $cliente ) ) {
    if ( $clienteDAO->salvar( $clienteDTO ) ) {
        $upload->salvar( $foto, DIR_FOTO );
        header( "Location: ../view/formCadastrarCliente.php?msg={$error[1]}" );
    }
} else {
    header( "Location: ../view/formCadastrarCliente.php?msg={$error[2]}" );
}