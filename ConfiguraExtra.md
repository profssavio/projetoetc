# Configurações basicas

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

