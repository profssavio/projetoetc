<?php
require_once '../dao/CarrinhoDAO.php';
require_once '../dao/ProdutoDAO.php';

session_start();
$produtos  = $_SESSION['carrinho'];
$idCliente = $_SESSION["idCliente"];

$produtoDAO = new ProdutoDAO();

$total = 0;
foreach ( $produtos as $key => $qtde ) {
    $produto = $produtoDAO->findById( $key );
    $total += $produto["preco"] * $qtde;
}

$carrinhoDAO = new CarrinhoDAO();

if ( $carrinhoDAO->finalizarCarrinho( $produtos, $idCliente, $total ) ) {
    unset( $_SESSION['carrinho'] );
    header( "Location: ../view/carrinho.php" );
}
