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
sed -i 's|;extension=bz2|extension=bz2|g' /etc/php8/php.ini && \
sed -i 's|;extension=curl|extension=curl|g' /etc/php8/php.ini && \
sed -i 's|;extension=fileinfo|extension=fileinfo|g' /etc/php8/php.ini && \
sed -i 's|;extension=gettext|extension=gettext|g' /etc/php8/php.ini && \
sed -i 's|;extension=mbstring|extension=mbstring|g' /etc/php8/php.ini && \
sed -i 's|;extension=exif|extension=exif|g' /etc/php8/php.ini && \
sed -i 's|;extension=mysqli|extension=mysqli|g' /etc/php8/php.ini && \
sed -i 's|;extension=pdo_mysql|extension=pdo_mysql|g' /etc/php8/php.ini

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]