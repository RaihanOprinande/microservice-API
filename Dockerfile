FROM nginx
LABEL maintaner="opri.fahdi@gmail.com"
# COPY profile_repo_html /usr/share/nginx/html

FROM php:8.2-apache
COPY src/ /var/www/html 
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli