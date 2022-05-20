<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';
require_once '../util/Upload.php';
define( 'DIR_FOTO', $_SERVER['DOCUMENT_ROOT'] . "/image/cliente/foto/" );

$idCliente      = $_POST["idCliente"];
$nome           = $_POST["nome"];
$cpf            = $_POST["cpf"];
$dataNascimento = $_POST["dtnasc"];
$telefone       = $_POST["tel"];
$sexo           = $_POST["sexo"];
$email          = $_POST['email'];
$senha          = !isset( $_POST['senha'] ) || empty( $_POST['senha'] ) ? $_POST['vsenha'] : md5( $_POST['senha'] );
$perfil         = $_POST['perfil'];
$foto           = $_FILES['foto'];

$clienteDTO = new ClienteDTO();
$clienteDTO->setId( $idCliente );
$clienteDTO->setNome( $nome );
$clienteDTO->setCpf( $cpf );
$clienteDTO->setDataNascimento( $dataNascimento );
$clienteDTO->setTelefone( $telefone );
$clienteDTO->setSexo( $sexo );
$clienteDTO->setEmail( $email );
$clienteDTO->setSenha( $senha );
$clienteDTO->setPerfil( $perfil );

$upload = new Upload( $_FILES["foto"] );
$clienteDTO->setFoto( isset( $_FILES["foto"]["name"] ) && $_FILES["foto"]["error"] == 0 ? $upload->getNome( $_FILES["foto"] ) : $_POST["fotoOriginal"] );

$clienteDAO = new ClienteDAO();

if ( $clienteDAO->update( $clienteDTO ) ) {
    $upload->salvar( $_FILES["foto"], DIR_FOTO );
    header( "Location: ../view/listarTodosClientes.php" );
}