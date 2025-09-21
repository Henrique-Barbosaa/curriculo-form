# Projeto de Envio de Currículos - Teste de Desenvolvimento SESAP/RN

Este repositório contém o código para a aplicação de envio de currículos. O ambiente de desenvolvimento está 100% conteinerizado com Docker.

## 📋 Pré-requisitos

Para executar este projeto, você precisa ter instalado:

* [Docker](https://www.docker.com/products/docker-desktop/) (Docker Desktop para Windows/Mac ou Docker Engine para Linux).
* Git.

Nenhuma outra dependência (como PHP, Composer ou PostgreSQL) é necessária na sua máquina local.

## 🚀 Como Executar

O processo de inicialização é totalmente automatizado.

**1. Clone o Repositório:**
```shell
git clone <>
```

**2. Navegue até a Pasta do Projeto:**
```shell
cd <nome-da-pasta-do-projeto>
```

**3. Inicie o Ambiente Docker:**
```shell
docker compose up -d --build
```
Este comando irá construir as imagens, iniciar os contêineres e executar todos os scripts de setup (instalação de dependências, migrações de banco, etc.) automaticamente.

---
## ઍ Acesso à Aplicação

* **Aplicação Web (Formulário):** [**http://localhost:8000**](http://localhost:8000)

* **E-mails de Teste (Mailtrap):** O envio de e-mails está configurado para um ambiente de teste do Mailtrap. As credenciais já estão no projeto e os e-mails enviados podem ser visualizados na caixa de entrada correspondente.

* **Banco de Dados (PostgreSQL):** O banco de dados está acessível na sua máquina local (`localhost`) na porta `5432` caso deseje inspecionar os dados com um cliente de sua preferência.
    * **Host:** `localhost`
    * **Porta:** `5432`
    * **Usuário:** `postgres`
    * **Senha:** `postgres`
    * **Database:** `pg-db`

Para desligar o ambiente, execute `docker compose down`.