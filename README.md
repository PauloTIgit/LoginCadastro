# Tela de Login e Cadastro

Este é um projeto de uma tela de login e cadastro com sistema de CLASS para tornar a integração mais facil e segura. O objetivo deste documento é fornecer uma visão geral do projeto e ajudar outros desenvolvedores a usar em seus projetos.

## Pré-requisitos

Para executar este projeto, você precisará do XAMPP ou WAMPSERVER, pois iremos precisar dos servisos do Apache, PHP e Mysql.

## Estrutura do projeto

O projeto está organizado nos seguintes arquivos:


```
index.php 
```
- `index.php` é o arquivo HTML que define a estrutura da página. Ele contém os formulários de login e cadastro e os campos correspondentes.


```
registro.php 
```
- `registro.php` Este arquivo contem toda as validações e funções para cadastro atraves do formulario.




Nos aquivos dentro destes pastas abaixo tras todos os estilos e o dinamimo que apagina precisa. 
```
css_
    |__app.css
    |__main.css
    |__root.css

js__
    |__script.js

fotes_
      |__Noto_Sans_
                   |__NotoSans-Regular.ttf

```
- `app.css` é o arquivo CSS que define a aparência da página. Ele contém as regras de estilo para todos os elementos na página.
- `main.css` é o arquivo CSS que define os padrões da página. Ele contém o resete das margin, padding e fonte.
- `root.css` é o arquivo CSS que define as vaiaveis da página. Ele contém as variaveis de cores.
- `script.js` é o arquivo JavaScript que adiciona a funcionalidade de mudança de class.


Nos aquivos dentro da pasta abaixo tras todos . 
```
stup_
     |__autoload.php
     |__Ligacao.class.php
     |__Quartos.class.php
     |__Reservas.class.php
     |__Usuarios.class.php
```
- `autoload.php` Este contém tras todas os arquivos .class.php.
- `Ligacao.class.php` Este contém tras as class de conexão ao banco de dados.
- `Usuarios.class.php` Este contém tras todas as regras de get e set e funções especificas para cadastro e login.


## Como usar

1. Clone o repositório em sua máquina local de preferencia no htdocs do xampp ou no www do wamp:

```
git clone https://github.com/seu-usuario/nome-do-repositorio.git
```

2. No banco de dados execute os comandos abixo.
```
CREATE DATABASE bancodados;

USE bancodados;

CREATE TABLE `usuario`(
`user_id` int not null auto_increment,
		`user_nome` varchar(255) not null,
		`user_email` varchar(255) not null,
		`user_senha` varchar(255) not null,
		`user_cpf` char(255) not null,
		`user_telefone` varchar(255) not null,
		`user_status` varchar(255) not null,
        `user_nivel` varchar(255) not null,
        `user_hash` varchar(255) not null,
    primary key (`user_id`)

);

```

Assim irá estrutura o banco de dados para acomanhar a logica do projeto.


3. abra no navegador e digite a url http://localhost/{Pasta que onde você clonou o projeto}.


