FROM php:apache
WORKDIR /var/www/html
RUN a2enmod rewrite
#RUN service apache2 reload