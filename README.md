
# Projeto Modelo - CRUD

Projeto modelo do curso Técnico em Informática do turno matutino

 - **C** - Create (criar) - criar um novo registro
 - **R** - Read (ler) - ler (exibir) as informações de um registro
 - **U** - Update (atualizar) - atualizar os dados do registro
 - **D** - Delete (apagar) - apagar um registro
 
No projeto existe um exemplo de carrinho de compras
 
# Visual Code: 

Um editor de código gratuito avançado e leve com ferramentas integradas 

https://code.visualstudio.com/

## Extensions

* CodeSnap
* Color Highlight
* DotENV
* IntelliSense for CSS class names in HTML
* JavaScript (ES6) code snippets
* Live Server
* Path Intellisense
* PHP Debug
* PHP DocBlocker
* PHP Getters & Setters
* PHP Intelephense
* PHP Namespace Resolver
* PHP Server
* phpfmt - PHP formatter
* vscode-icons
* Git History
* GitLens — Git supercharged
* REST Client

## Configuração do Settings do Visual Code 

```File -> Preferences -> Settings```

* Logo após clicar no icone na direita:  ```Open Settings(JSON)``` Apagar tudo e colocar esse código abaixo no lugar.

* Para Windows:

```
{
    "workbench.iconTheme": "vscode-icons",
    "workbench.colorTheme": "Quiet Light",
    "editor.mouseWheelZoom": true,
    "explorer.compactFolders": false,
    "editor.fontSize": 16,
    "editor.minimap.enabled": false,
    "editor.rulers": [120],
    "workbench.colorCustomizations": {
        "editorRuler.foreground": "#4093ff"
    },
    "php.validate.executablePath": "C:\\xampp\\php\\php.exe",
    "php.suggest.basic": false,
    "php.validate.enable": false,
    "phpserver.phpConfigPath": "C:\\xampp\\php\\php.ini",
    "phpserver.phpPath": "C:\\xampp\\php\\php.exe",
    "phpserver.browser": "chrome",
    "editor.formatOnSave": false,
    "[php]": {
        "editor.formatOnSave": true,
        "editor.defaultFormatter": "kokororin.vscode-phpfmt",
       
    },
    "phpfmt.php_bin": "C:\\xampp\\php\\php.exe",
    "phpfmt.psr2": false,
    "phpfmt.enable_auto_align":true,
    "phpfmt.exclude": [
        "AllmanStyleBraces",
    ],  
    "phpfmt.passes": [
        "AlignPHPCode",
        "AlignDoubleArrow",
        "SpaceAroundParentheses"
    ],

    "html.autoClosingTags": false,
    "liveServer.settings.CustomBrowser": "chrome",
}
```

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
     - ```extension_dir = "ext"```
     - ```extension=pdo_mysql```
     - ```extension=pdo_sqlite```
     - ```date.timezone =``` tem que adicionar o valor timezone do Brasil ```America/Sao_Paulo```
  - Alterar os valores  
     - ```max_execution_time = 120```
     - ```upload_max_filesize = 5M```

## Terceiro passo  

- Alterar os Settings do VScode para apontar para o diretorio correto.

Exemplo: Se estiver colocado o PHP no diretório ```C:\php```
    
    ```
    {
        "php.validate.executablePath": "C:\\php\\php.exe",
        "phpserver.phpConfigPath": "C:\\php\\php.ini",
        "phpserver.phpPath": "C:\\php\\php.exe",
        "phpfmt.php_bin": "C:\\php\\php.exe"
    }
    ```

## Quarto passo
- Se por acaso aparecer um erro que esta faltando a dll vcruntime140-dll
- Instalar os Pacotes Redistribuíveis do Visual C++ para Visual Studio 2022
- Site: https://visualstudio.microsoft.com/pt-br/downloads/
- Na opção Outras ferramentas, Estruturas e Pacotes Redistribuíveis


# Banco de dados

 - Mysql
 - PHPMyAdmin
 - Workbench -  Uma ferramenta de gerenciamento de banco de dados amigável ao usuário chamada MySQL.
 - O Modelo está no diretório sql ```projetomodelodb.mwb```  

## Docker

- No projeto tem o arquivo ```docker-compose.yml``` onde tem as com as configurações do container **MYSQL** e **PHPMyAdmin**
  
* Iniciar o ambiente

```
docker-compose up -d
```
* Parar o ambiente e remover os container

```
docker-compose down
```  

## Classe de Conexão

- **ATENÇÃO:** Na classe conferir o nome do banco, usuário e senha

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

---

# WSL2 + DOCKER (Windows)

## O que é o WSL2

E possibilidade de rodar o Linux dentro do Windows como um subsistema e o nome a isto foi dado de WSL ou Windows Subsystem for Linux.

Com WSL 2 é possível executar Docker no Linux usando o Windows 10/11.

Documentação: https://docs.microsoft.com/pt-br/windows/wsl

## O que é Docker

Docker é uma plataforma open source que possibilita o empacotamento de uma aplicação dentro de um container. Uma aplicação consegue se adequar e rodar em qualquer máquina que tenha essa tecnologia instalada.

## Instalação do WSL2

* Abrir o PowerShell como administrador
* Executar o comando (Ubuntu latest): 

```
wsl --install
```
* Verificar a versão instalada

```
wsl -l -v
```
* Ver uma lista de distribuições Linux disponíveis

```
wsl --list --online
```

## Instalação do DOCKER

### DOCKER ENGINE 

* Documentação: https://docs.docker.com/engine/install/ubuntu/
* Atualizar o linux e instalar

```
sudo apt update && sudo apt upgrade

sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
    
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
  
sudo apt-get update

sudo apt-get install docker-ce docker-ce-cli containerd.io
```
* Dê permissão para rodar o Docker com seu usuário corrente:

```
sudo usermod -aG docker $USER
```
* Inicie o serviço do Docker:

```
sudo service docker start
```
Este comando acima terá que ser executado toda vez que Linux for reiniciado. Se caso o serviço do Docker não estiver executando, mostrará esta mensagem de erro:

```
Cannot connect to the Docker daemon at unix:///var/run/docker.sock. Is the docker daemon running?
```

## DOCKER-COMPOSE

* Documentação: https://docs.docker.com/compose/install/

```
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
sudo ln -sf /usr/local/bin/docker-compose /usr/bin/docker-compose
docker-compose --version
```
Para instalar uma versão diferente do Compose, substitua 1.29.2 pela versão desejada.

---

# Configurações extras

## Ohmyzsh (Linux)

Server para identificar o branch no Shell

* instalar primeiro sudo apt install zsh
* acessar o site https://ohmyz.sh/

## Ohmyposh (Windows)

* acessar o site para instalar https://ohmyposh.dev/

## Git

### Windows

* Site: https://git-scm.com/download/win

### Linux

* Site: https://git-scm.com/download/linux
* Instalação básica

```
sudo apt-get install git
```
* Instalar versão latest

```
add-apt-repository ppa:git-core/ppa 
sudo apt update
sudo apt install git
```

## Portainer
Interface Gráfica para Gerenciar o Docker

* Documentação : *https://docs.portainer.io*
* Executar os comandos abaixo:

```
docker volume create portainer_data

docker run -d -p 9002:9000 --name portainer \
    --restart=always \
    -v /var/run/docker.sock:/var/run/docker.sock \
    -v portainer_data:/data \
    portainer/portainer-ce:latest
    
```

* Digitar no Browser: *http://localhost:9002*
