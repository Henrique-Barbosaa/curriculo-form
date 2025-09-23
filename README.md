# Projeto de Envio de Currículos

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
git clone https://github.com/Henrique-Barbosaa/curriculo-form.git
```

**2. Navegue até a Pasta do Projeto:**
```shell
cd <local_onde_você_clonou_o_projeto>
```

**3. Inicie o Ambiente Docker:**
```shell
docker compose up -d --build
```

Este comando irá construir as imagens, iniciar os contêineres e executar todos os scripts de setup (instalação de dependências, migrações de banco, etc.) automaticamente.

**4. Aguarde a Inicialização Automática:**<br>
Na primeira execução, o ambiente irá instalar todas as dependências do Composer (PHP) e NPM (JS), configurar o arquivo `.env` e rodar as migrações do banco de dados. **Este processo pode levar alguns minutos.**

Você pode acompanhar o progresso em tempo real com o comando:
```shell
docker compose logs -f application
```
O ambiente estará pronto quando os logs se estabilizarem e mostrarem que o servidor foi iniciado.


**5. Inicializar Vite:**<br>
O servidor de desenvolvimento do Vite, que compila o CSS e o JavaScript em tempo real e permite o "autoreload", precisa ser iniciado em um processo separado.

Abra um **novo terminal** na raiz do projeto e execute:
```shell
docker compose exec application npm run dev
```

**Pronto! A aplicação está rodando.**

---
## 📧 Envio de E-mails Assíncronos (OPCIONAL)

A aplicação está configurada para enviar e-mails de confirmação para os candidatos de forma assíncrona, utilizando o **sistema de Filas (Queues) do Laravel**. O email é enviado para minha Sandbox no Mailtrap, que configurei para receber os emails.

Para que os emails sejam de fato enviados para o Mailtrap, **abra um novo terminal (diferente do que está rodando o Vite)** e execute o seguinte comando:
```shell
docker compose exec application php artisan queue:work
```

**Isso é algo OPCIONAL, caso queria ver as filas funcionando e os emails sendo de fato enviados para minha Sandbox no Mailtrap.**

---
## Acesso à Aplicação

* **Aplicação Web (Formulário):** [**http://localhost:8000**](http://localhost:8000)

* **E-mails de Teste (Mailtrap):** O envio de e-mails está configurado para um ambiente de teste do Mailtrap. As credenciais já estão no projeto e os e-mails enviados podem ser visualizados na caixa de entrada correspondente.

* **Banco de Dados (PostgreSQL):** O banco de dados está acessível na sua máquina local (`localhost`) na porta `5432` caso deseje inspecionar os dados com um cliente de sua preferência.
    * **Host:** `localhost`
    * **Porta:** `5432`
    * **Usuário:** `postgres`
    * **Senha:** `postgres`
    * **Database:** `postgres`

Para desligar o ambiente, execute `docker compose down`.