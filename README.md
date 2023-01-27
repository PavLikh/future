## Как собрать
- склонировать проект
- установить библиотеки \
`php composer install -o`
- создать .env файл \
    DB_CONNECTION=mysql \
    DB_HOST=mysql \
    DB_PORT=3306 \
    DB_DATABASE=laravel \
    DB_USERNAME=sail \
    DB_PASSWORD=password
- установить sail \
`php artisan sail:install`
- запустить собрать контейнеры \
`vendor/bin/sail up` или установить алиас, тогда \
`sail up`
- выполнить миграции \
`sail artisan migrate`
- запустить сидер \
`sail artisan db:seed --class=NotebookSeeder` \


openapi.yaml - описание апи
