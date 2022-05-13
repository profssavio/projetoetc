<?php
require_once '../dao/ClienteDAO.php';

define( 'DIR_FOTO', $_SERVER['DOCUMENT_ROOT'] . "/image/cliente/foto/" );

$idCliente = $_GET['id'];
$clienteDAO = new ClienteDAO();

$cliente = $clienteDAO->findById( $idCliente );
$foto = $cliente["foto"];

if ( $clienteDAO->deleteById( $idCliente ) ) {
    unlink( DIR_FOTO . $foto );
    header( "Location: ../view/listarTodosClientes.php" );

}
