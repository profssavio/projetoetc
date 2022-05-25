# Projeto Modelo - CRUD

Projeto modelo do curso Técnico em Informática do turno matutino

 - C - uma ferramenta de gerenciamento de banco de dados amigável ao usuário chamada MySQL
 - R - Read (ler) - ler (exibir) as informações de um registro
 - U - Update (atualizar) - atualizar os dados do registro
 - D - Delete (apagar) - apagar um registro

## Banco de dados

 - Mysql
 - Workbench -  Uma ferramenta de gerenciamento de banco de dados amigável ao usuário chamada MySQL.
 - O Modelo está no diretório sql ```projetomodelodb.mwb```

### Classe de Conexão

```
<?php

abstract class Conexao {

    private static $instance;
    /**
     * @return PDO
     */
    public static function getInstance() {
        try {
            if ( !isset( self::$instance ) ) {
                self::$instance = new PDO( 'mysql:host=127.0.0.1;dbname=projetomodelodb;charset=utf8', 'root', '' );
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            return self::$instance;
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
}
```

## Linguagem de Programação

  - PHP

## Upload 

## Carrinho de compra
