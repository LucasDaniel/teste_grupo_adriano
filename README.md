
## Criado com

 - [Laravel - v10.46.0](https://laravel.com/)
 - [Composer - v2.7.1](https://getcomposer.org/)
 - [PHP - v8.1.0](https://www.php.net/downloads.php)
 - [Docker - v24.0.5](https://www.docker.com/)

## Instalação

Instale o composer, verifique se ele esta instalado

```bash
    composer -v
```

Instale o docker

Baixe do git hub o sistema

```bash
    git clone https://github.com/LucasDaniel/payments.git
```

Execute o codigo para gerar o repositorio

```bash
    docker-compose up --build
```

Entre na pasta payments e execute o comando

```bash
    composer update
```

Aqui deve ter criado um arquivo .env.example
Renomei-o para .env
Adicione essa parte no seu arquivo .env

```bash
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_USERNAME=root
    DB_PASSWORD=
```

Abra um outro terminal, entre na pasta payments do laravel e Execute

```bash
    php artisan serve
```

Exexute o migrate e seed do artisan
Provavelmente vai lhe pedir para criar a base de dados payment

```bash
    php artisan migrate
    php artisan db:seed
```

Para executar o teste do PHPUnit

```bash
    php artisan app:test 
```

## Documentação da API

Para usar quaisquer links é necessario criar um token de autenticação

#### Criar Token de autenticação [POST]

```bash
    http://127.0.0.1:8000/api/authenticate
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `login`     | `string` | **Obrigatório**. Usuário a logar |
| `password`  | `string` | **Obrigatório**. Password do usuário |

**Obs:** Senha e password para gerar token: admin | admin

Após gerar o token copia-lo e adicionar um header com o nome da chave "Authorization" de valor "Bearer ****"

#### Retorna todos os itens [GET]

```http
  http://127.0.0.1:8000/api/moviment/all
  http://127.0.0.1:8000/api/transfer/all
  http://127.0.0.1:8000/api/state_transfer/all
  http://127.0.0.1:8000/api/state_moviment/all
  http://127.0.0.1:8000/api/user/all
  http://127.0.0.1:8000/api/wallet/all
```

#### Retorna um item [GET]

```http
  http://127.0.0.1:8000/api/moviment/{id}
  http://127.0.0.1:8000/api/transfer/{id}
  http://127.0.0.1:8000/api/state_transfer/{id}
  http://127.0.0.1:8000/api/state_moviment/{id}
  http://127.0.0.1:8000/api/user/{id}
  http://127.0.0.1:8000/api/wallet/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item |

#### Fazer uma transferencia [POST]

```bash
    http://127.0.0.1:8000/api/transfer
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `value`     | `int` | **Obrigatório**. Valor a ser transferido |
| `payer`     | `int` | **Obrigatório**. Id do usuario que será diminuido na carteira |
| `payee`     | `int` | **Obrigatório**. Id do usuario que receberá o valor na carteira |

#### Retornar uma transferencia [POST]

```bash
    http://127.0.0.1:8000/api/transfer/return
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id_transfer` | `int` | **Obrigatório**. O id da transferencia que foi feita |

**Obs:** A transferencia precisa esta finalizada para conseguir reverter

#### Fazer um depósito [POST]

```bash
    http://127.0.0.1:8000/api/moviment
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id_user`   | `int` | **Obrigatório**. Id do usuario a fazer a movimentação |
| `value`     | `int` | **Obrigatório**. Quantidade a depositar/retirar |

#### Retornar uma transferencia [POST]

```bash
    http://127.0.0.1:8000/api/moviment/return
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id_transfer`      | `int` | **Obrigatório**. O id da movimentação que foi feita |

## Possiveis problemas

Ao tentar dar php artisan serve, você pode se deparar com alguns problemas

Execute o comandos abaixo para resolve-los

```bash
    composer dump-autoload
```

## 🚀 Sobre mim
[Lucas - Linkedin - Clique aqui!!!](https://www.linkedin.com/in/lucas-dniel-beltrame-de-lima-rodrigues/)

