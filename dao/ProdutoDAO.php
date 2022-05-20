<?php
require_once 'conexao/Conexao.php';
require_once 'UsuarioDAO.php';

class ProdutoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findAll() {
        try {
            $sql  = 'SELECT * FROM tb_produto ';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $produtos = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $produtos;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar os produtos: ', $e->getMessage();
        }
    }

    public function findByIdIn( $ids ) {
        try {
            $sql  = 'SELECT * FROM tb_produto WHERE id in (?)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $ids );
            $stmt->execute();
            $produtos = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $produtos;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar os produtos: ', $e->getMessage();
        }
    }

}
?>