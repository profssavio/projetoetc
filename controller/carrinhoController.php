<?php
session_start();
if ( !isset( $_SESSION['carrinho'] ) ) {
    $_SESSION['carrinho'] = [];
}

$idProduto = $_GET["id"];
$acao      = $_GET["acao"];

if ( $acao == "add" ) {
    if ( !isset( $_SESSION['carrinho'][$idProduto] ) ) {
        $_SESSION['carrinho'][$idProduto] = 1;
    } else {
        $_SESSION['carrinho'][$idProduto] += 1;
    }
    header( "Location: ../view/carrinho.php" );
}

if ( $acao == 'del' ) {
    if ( isset( $_SESSION['carrinho'][$idProduto] ) ) {
        unset( $_SESSION['carrinho'][$idProduto] );
    }
    header( "Location: ../view/carrinho.php" );
}
