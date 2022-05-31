Meu Drive
# Configurações basicas

## Ohmyzsh

Server para identificar o branch no Shell

* instalar primeiro sudo apt install zsh
* acessar o site https://ohmyz.sh/

## Git
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

## Java OpenJdk

* Instalação

```
sudo apt-get install openjdk-17-jdk
sudo apt-get install openjdk-15-jdk
sudo apt-get install openjdk-8-jdk. 
```
* Trocar versão

```
sudo update-alternatives --config java
sudo update-alternatives --config javac
```

## Maven

* Instalação

```
sudo apt install maven
```


## NVM (NODE)

* Site: https://github.com/nvm-sh/nvm
* Instalação

```
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
```

* Editar os arquivs .bashrc e .zshrc

```
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion
```

* Comandos

```
nvm list-remote
nvm install xxx
nvm alias default xxx

Example:
  nvm install 8.0.0                     Install a specific version number
  nvm use 8.0                           Use the latest available 8.0.x release
  nvm run 6.10.3 app.js                 Run app.js using node 6.10.3
  nvm exec 4.8.3 node app.js            Run `node app.js` with the PATH pointing to node 4.8.3
  nvm alias default 8.1.0               Set default node version on a shell
  nvm alias default node                Always default to the latest available node version on a shell
  nvm uninstall
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

## Vpn 

```
sudo apt install network-manager-vpnc
sudo apt install network-manager-openconnect
```

## Comando Linux para verificar porta em uso e derrubar

```
lsof -i tcp:3000
kill -9 PID
```

## Comando Linux Pesquisa local

```
which composer
```
