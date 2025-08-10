FROM php:8.0-cli-alpine

ENV TZ=Asia/Jakarta

WORKDIR /app

COPY --chown=root:root . .

RUN chmod -R 755 .

RUN apk add --no-cache unzip tzdata

RUN docker-php-ext-install mysqli pdo_mysql

RUN ln -sf /usr/share/zoneinfo/$TZ /etc/localtime

RUN unzip -o vendor.zip -d . && unzip -o node_modules.zip -d .

RUN php artisan storage:link

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]