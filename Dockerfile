FROM ubuntu:20.04

# Fully automated, no prompts
ENV DEBIAN_FRONTEND noninteractive

# install all the things
RUN apt-get update

RUN apt-get install -y curl
RUN apt-get install -y php-cli
RUN apt-get install -y php-curl
RUN apt-get install -y php-mbstring
RUN apt-get install -y php-mysql
RUN apt-get install -y php-xml
RUN apt-get install -y php-json
RUN apt-get install -y php-zip

RUN rm -rf /var/lib/apt/lists/*

# install Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php \
    --filename=composer \
    --install-dir=/usr/local/bin

RUN useradd --create-home --shell /bin/bash dev

WORKDIR /app

ENTRYPOINT ["php"]
