### Instalação

RUN composer install && \
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan config:cache && \
    php artisan migrate

### bando de dados esta no arquivo 
database.sql

###Login e pass para acessar API 

login: teste@teste.comdddd
pass: 123123 

###End
