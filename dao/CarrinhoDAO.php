<?php
require_once 'conexao/Conexao.php';
require_once 'UsuarioDAO.php';
require_once 'ProdutoDAO.php';

class CarrinhoDAO {
    private $pdo;
    private $produtoDAO;

    public function __construct() {
        $this->pdo        = Conexao::getInstance();
        $this->produtoDAO = new ProdutoDAO();
    }

    public function finalizarCarrinho( $produtos, $idcliente, $total ) {
        try {
            $this->pdo->beginTransaction();
            $sql = 'INSERT INTO '
                . 'tb_pedido(cliente,valor_total) '
                . 'VALUES(?,?)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idcliente );
            $stmt->bindValue( 2, $total );
            $stmt->execute();
            $idPedido = $this->pdo->lastInsertId();

            $sql = 'INSERT INTO '
                . 'tb_pedido_has_produto(produto,pedido,qtde,preco) '
                . 'VALUES(?,?,?,?)';

            foreach ( $produtos as $key => $qtde ) {
                $produto = $this->produtoDAO->findById( $key );
                $stmt    = $this->pdo->prepare( $sql );
                $stmt->bindValue( 1, $produto["id"] );
                $stmt->bindValue( 2, $idPedido );
                $stmt->bindValue( 3, $qtde );
                $stmt->bindValue( 4, $produto["preco"] );
                $stmt->execute();
            }

            return $this->pdo->commit();

        } catch ( PDOException $e ) {
            echo 'Erro ao finalizar a comprar: ', $e->getMessage();
        }
    }

}
?>