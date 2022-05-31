# WSL2 + DOCKER

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
