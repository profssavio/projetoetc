<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';

$idCliente = $_POST["idCliente"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$dataNascimento = $_POST["dtnasc"];
$telefone = $_POST["tel"];
$sexo = $_POST["sexo"];
$email = $_POST['email'];
$senha = md5( $_POST['senha'] );
$perfil = $_POST['perfil'];
$foto = $_FILES['foto'];

$clienteDTO = new ClienteDTO();
$clienteDTO->setId( $idCliente );
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setDataNascimento( $dataNascimento );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setSexo( $sexo );
//$clienteDTO->setFoto( $foto );

$clienteDTO->setEmail( $email );
$clienteDTO->setSenha( $senha );
$clienteDTO->setPerfil( $perfil );

$clienteDAO = new ClienteDAO();

if ( $clienteDAO->update( $clienteDTO ) ) {
    header( "Location: ../view/listarTodosClientes.php" );
}