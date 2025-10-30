# Sistema C2

Desenvolvido para centralizar o controle e gerenciamento dos veículos oficiais de um órgão público. O C2 é um sistema web desenvolvido na linguagem PHP com design responsivo para suportar dispositivos móveis.

# Uso

1. Certifique-se de ter o Git instalado em sua máquina. Você pode baixar e instalar o Git a partir do site oficial: [https://git-scm.com/book/en/v2/Getting-Started-Installing-Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git).

2. Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina. Você pode baixar e instalar a partir do site oficial: 
- [Docker](https://docs.docker.com/get-docker/).
- [Docker Compose](https://docs.docker.com/compose/install/).

3. Abra o terminal ou prompt de comando e navegue até um diretório de sua prefrência. Substitua `suapasta` pelo nome do seu diretório:
   ```bash
   cd suapasta
   ```

4. Clone este repositório para sua máquina local através do comando abaixo:
```bash
git clone https://github.com/marcelobuzzetti/Controle.git
```

5. Navegue até o diretório que você acabou de clonar.

   ```bash
    cd Controle
   ```

6. Execute o Docker Compose para construir e iniciar todos os serviços (Nginx, PHP-FPM, Dependencies e MySQL):
    ```bash
    docker-compose -p controle up -d
    ```

7. Abra seu navegador e visite `http://localhost`.

8. O Usuário e Senha padrões do sistema são `admin`.

9. Para colocar uma imagem dentro do QRCode, deve-se salvar uma imagem, no formato PNG, com o nome brasao.png, na pasta libs/imagens

10. Para parar o sistema:
    ```bash
    docker-compose -p controle stop
    ```
    
11. Parar e remover os container :
    ```bash
    docker-compose -p controle down
    ```

## Serviços e Portas

O sistema utiliza 4 containers Docker:

- **Nginx** (c2_web): Servidor web na porta 80
- **PHP-FPM** (c2_php_fpm): Processador PHP na porta 9000
- **Dependencies** (c2_dependencies): Instala dependências Node.js e Composer automaticamente
- **MySQL** (c2_db): Banco de dados na porta 3306

As dependências PHP (Composer) e Node.js (npm) são instaladas automaticamente durante o build do container de dependências.
