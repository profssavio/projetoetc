<?php
require_once 'conexao/Conexao.php';

class PedidoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findAll() {
        try {
            $sql = "SELECT c.nome, p.id, p.data, p.valor_total as total FROM tb_pedido p "
                . "INNER JOIN tb_cliente c ON (c.id = p.cliente)";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $pedidos = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $pedidos;
        } catch ( \PDOException$e ) {
            echo "Erro ao lista os pedidos ", $e->getMessage();
        }
    }
}