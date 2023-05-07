# Tela de Login e Cadastro

Este é um projeto de uma tela de login e cadastro desenvolvida utilizando HTML, CSS e JavaScript. O objetivo deste documento é fornecer uma visão geral do projeto e ajudar outros desenvolvedores a entender como a tela foi criada.

## Pré-requisitos

Para executar este projeto, você precisará de um navegador web moderno que suporte HTML, CSS e JavaScript.

## Estrutura do projeto

O projeto está organizado nos seguintes arquivos:

```
index.php

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

- `index.php` é o arquivo HTML que define a estrutura da página. Ele contém os formulários de login e cadastro e os campos correspondentes.
- `app.css` é o arquivo CSS que define a aparência da página. Ele contém as regras de estilo para todos os elementos na página.
- `main.css` é o arquivo CSS que define os padrões da página. Ele contém o resete das margin, padding e fonte.
- `root.css` é o arquivo CSS que define as vaiaveis da página. Ele contém as variaveis de cores.
- `script.js` é o arquivo JavaScript que adiciona a funcionalidade de mudança de class.

## Como usar

1. Clone o repositório em sua máquina local de preferencia no htdocs do xampp:

```
git clone https://github.com/seu-usuario/nome-do-repositorio.git
```

2. No banco de dados execute comando no banco de dados.
```
CREATE DATABASE plataforma;

USE plataforma;

CREATE TABLE `usuario` (
	`usuario_id` int not null auto_increment,
    `nome` varchar(200) not null,
    `email` varchar(200) not null,
    `senha` varchar(200) not null,
    `nivel` varchar(5) not null ,
    `status` varchar(5) not null,
    primary key (`usuario_id`)
);

```

Assim irá estrutura o banco de dados para acomanhar a logica do condego.

Sertifique-se de ter o xampp rodando.

3. abra no navegador e digite a url localhost/plataforma.


