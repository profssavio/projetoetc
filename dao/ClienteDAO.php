<?php
require_once 'conexao/Conexao.php';
require_once 'UsuarioDAO.php';

class ClienteDAO {
    private $pdo;
    private $usuarioDAO;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function salvar( ClienteDTO $clienteDTO ) {
        try {
            $this->pdo->beginTransaction();
            $sql = 'INSERT INTO '
                . 'tb_usuario(email,senha,perfil) '
                . 'VALUES(:email,:senha,:perfil)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ':email', $clienteDTO->getEmail() );
            $stmt->bindValue( ':senha', $clienteDTO->getSenha() );
            $stmt->bindValue( ':perfil', $clienteDTO->getPerfil() );
            $stmt->execute();
            $idUsuario = $this->pdo->lastInsertId();

            $sql = 'INSERT INTO '
                . 'tb_cliente(nome,cpf,datanascimento,telefone,sexo,usuario,foto) '
                . 'VALUES(:nome,:cpf,:dtnasc,:tel,:sexo,:usuario,:foto)';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( ':nome', $clienteDTO->getNome() );
            $stmt->bindValue( ':cpf', $clienteDTO->getCpf() );
            $stmt->bindValue( ':dtnasc', $clienteDTO->getDataNascimento() );
            $stmt->bindValue( ':tel', $clienteDTO->getTelefone() );
            $stmt->bindValue( ':sexo', $clienteDTO->getSexo() );
            $stmt->bindValue( ':usuario', $idUsuario );
            $stmt->bindValue( ':foto', $clienteDTO->getFoto() );
            $stmt->execute();
            return $this->pdo->commit();
        } catch ( PDOException $e ) {
            $this->pdo->rollBack();
            echo 'Erro ao cadastrar: ', $e->getMessage();
        }
    }

    public function findAll() {
        try {
            $sql = 'SELECT '
                . 'c.id,c.nome,c.cpf,c.datanascimento,c.sexo,c.telefone,c.situacao,'
                . 'u.email, p.perfil '
                . 'FROM tb_cliente c '
                . 'INNER JOIN tb_usuario u ON c.usuario = u.id '
                . 'INNER JOIN tb_perfil p ON u.perfil = p.id';

            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $clientes = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $clientes;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar os clientes: ', $e->getMessage();
        }
    }

    public function deleteById( $idCliente ) {
        try {
            $this->pdo->beginTransaction();
            $cliente = $this->findById( $idCliente );

            $sql = 'DELETE FROM tb_cliente WHERE id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idCliente );
            $stmt->execute();

            $this->usuarioDAO->deleteById( $cliente["usuario"] );
            return $this->pdo->commit();

        } catch ( PDOException $e ) {
            $this->pdo->rollBack();
            echo 'Erro ao excluir um cliente ', $e->getMessage();
        }
    }

    public function findById( $id ) {
        try {
            $sql = 'SELECT '
                . 'c.id,c.foto,c.nome,c.usuario, c.cpf,c.datanascimento,c.sexo,c.telefone,c.situacao,'
                . 'u.email, u.perfil as idperfil, p.perfil '
                . 'FROM tb_cliente c '
                . 'INNER JOIN tb_usuario u ON c.usuario = u.id '
                . 'INNER JOIN tb_perfil p ON u.perfil = p.id '
                . 'WHERE c.id = ?';

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $id );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar um cliente: ', $e->getMessage();
        }
    }

    public function update( ClienteDTO $clienteDTO ) {
        try {
            $this->pdo->beginTransaction();
            $sql = 'UPDATE tb_cliente SET '
                . 'nome=?, cpf=?, datanascimento=?, telefone=?, sexo=? '
                . 'WHERE id=?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $clienteDTO->getNome() );
            $stmt->bindValue( 2, $clienteDTO->getCpf() );
            $stmt->bindValue( 3, $clienteDTO->getDataNascimento() );
            $stmt->bindValue( 4, $clienteDTO->getTelefone() );
            $stmt->bindValue( 5, $clienteDTO->getSexo() );
            $stmt->bindValue( 6, $clienteDTO->getId() );
            $stmt->execute();

            $cliente = $this->findById( $clienteDTO->getId() );

            $sql = 'UPDATE tb_usuario SET '
                . 'email=?, senha=?, perfil=? '
                . 'WHERE id=?';

            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $clienteDTO->getEmail() );
            $stmt->bindValue( 2, $clienteDTO->getSenha() );
            $stmt->bindValue( 3, $clienteDTO->getPerfil() );
            $stmt->bindValue( 4, $cliente["usuario"] );
            $stmt->execute();

            return $this->pdo->commit();

        } catch ( PDOException $e ) {
            $this->pdo->rollBack();
            echo 'Erro ao atualizar o cliente: ', $e->getMessage();
        }
    }

    public function findByCpf( $cpf ) {
        try {
            $sql = 'SELECT * FROM tb_cliente WHERE cpf = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $cpf );
            $stmt->execute();
            $cliente = $stmt->fetch( PDO::FETCH_ASSOC );
            return $cliente;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar o cliente pelo cpf: ', $e->getMessage();
        }
    }

    public function findAllPerfil() {
        try {
            $sql = 'SELECT * FROM tb_perfil';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $perfils = $stmt->fetchAll( PDO::FETCH_ASSOC );
            return $perfils;
        } catch ( PDOException $e ) {
            echo 'Erro ao listar o perfil: ', $e->getMessage();
        }
    }

}