FROM php:7.2-apache

WORKDIR /var/www/html

COPY src /var/www/html

ENV PORT=80

EXPOSE 80

CMD ["start-apache"]