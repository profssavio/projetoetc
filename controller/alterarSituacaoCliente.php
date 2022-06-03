<?php
require_once '../dao/ClienteDAO.php';

$id         = $_POST["id"];
$clienteDAO = new ClienteDAO();
$cliente    = $clienteDAO->findById( $id );

$novaSituacao = $cliente["situacao"] == "A" ? "I" : "A";
$clienteDAO->alterarSituacao( $novaSituacao, $cliente["id"] );

?>