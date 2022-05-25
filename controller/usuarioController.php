<?php
require_once '../dao/UsuarioDAO.php';
session_start();

$email = $_POST["email"];
$senha = md5( $_POST["senha"] );

$UsuarioDAO = new UsuarioDAO();
$usuario    = $UsuarioDAO->findByEmailSenha( $email, $senha );

if ( !empty( $usuario ) ) {
    $_SESSION["usuario"]   = $usuario["email"];
    $_SESSION["idCliente"] = $usuario["idCliente"];
    header( "Location: ../view/principal.php" );
} else {
    $msg = "senha e/ou usuario incorreto!";
    header( "Location: ../index.php?msg={$msg}" );
}