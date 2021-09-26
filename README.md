#Инструкция по деплою

* Создать пустую базу данных
* Установить composer https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04-ru
* Выполнить git clone https://github.com/VicClone/insight.git
* Перейти в insight/
* Скопировать .env.example в .env
* Заполнить в .env данные для базы данных
* Выполнить:
** composer install --optimize-autoloader --no-dev
** php artisan key:generate
** php artisan config:cache
** php artisan route:cache
** php artisan view:cache
** php artisan storage:link
* В nginx или apache путь указывать к insight/public/
