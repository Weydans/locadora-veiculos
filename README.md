# Locadora de Vaículos

Sistema desenvolvido em Laravel utilizando as principais funcionalidades do framework.



## Dependências

É necessário ter previamente instalado em sua máquina os seguintes softwares:

- [git](https://git-scm.com/downloads)
- [Docker](https://docs.docker.com/engine/install/)
- [docker-compose](https://docs.docker.com/compose/install/)

Clique nos links acima para acessar a página de instalação de cada um.



## Instalação

- Clone o projeto
```bash
git clone https://github.com/Weydans/locadora-veiculos.git
```



## Execução

- Acesse a pasta do projeto
```bash
cd locadora-veiculos
```


- Suba a plicação com um dos comandos abaixo (`buid` para produção ou apenas `make` para desenvolvimento)
```bash
sudo make build
```

```bash
sudo make
```


## Acesso

O acesso pode ser realizado via url `http://localhost:8080/`



## Parar Execução

Interrompe a execução dos containers
```bash
sudo make down
```



## Desinstalação

Remove a pasta com todos os arquivos do projeto
```bash
sudo make uninstall && cd ..
```
