FROM phpdockerio/php:8.3-fpm
WORKDIR "/project"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.3-http \ 
        php8.3-mysql \ 
        php8.3-psr \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
