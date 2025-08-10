FROM php:8.0-cli-alpine

ENV TZ=Asia/Jakarta

WORKDIR /app

COPY --chown=root:root . .

RUN chmod -R 755 .

RUN apk add --no-cache unzip tzdata

RUN ln -sf /usr/share/zoneinfo/$TZ /etc/localtime

RUN unzip -o vendor.zip -d . && unzip -o node_modules.zip -d .

RUN php artisan storage:link

RUN \
echo "extension=bz2" >> /etc/php8/php.ini && \
echo "extension=curl" >> /etc/php8/php.ini && \
echo "extension=fileinfo" >> /etc/php8/php.ini && \
echo "extension=gettext" >> /etc/php8/php.ini && \
echo "extension=mbstring" >> /etc/php8/php.ini && \
echo "extension=mysqli" >> /etc/php8/php.ini && \
echo "extension=pdo_mysql" >> /etc/php8/php.ini

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]