# Instalação do PHP no Windows
## Primeiro passo:
- Acessar o site php.net clique em download na ultima versão
- Depois clique em Windows downloads
- Depois na VS16 x64 Thread Safe clique a opção zip

## Segundo passo:
- Descompactar o php e colocar no diretorio c:\php\
- Renomear o arquivo php.ini-development para php.ini
- Editar o arquivo php.ini
  - Habilitar as linhas
     - extension_dir = "ext"
	 - extension=pdo_mysql

## Terceiro passo
- Se por acaso aparecer um erro que esta faltando a dll vcruntime140-dll
- Instalar os Pacotes Redistribuíveis do Visual C++ para Visual Studio 2022
- Site: https://visualstudio.microsoft.com/pt-br/downloads/
- Na opção Outras ferramentas, Estruturas e Pacotes Redistribuíveis


# Projeto Modelo - CRUD

Projeto modelo do curso Técnico em Informática do turno matutino

 - C - Create (criar) - criar um novo registro
 - R - Read (ler) - ler (exibir) as informações de um registro
 - U - Update (atualizar) - atualizar os dados do registro
 - D - Delete (apagar) - apagar um registro

# Banco de dados

 - Mysql
 - Workbench -  Uma ferramenta de gerenciamento de banco de dados amigável ao usuário chamada MySQL.
 - O Modelo está no diretório sql ```projetomodelodb.mwb```

## Classe de Conexão

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

# Linguagem de Programação

  - PHP
