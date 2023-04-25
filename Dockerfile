FROM mattrayner/lamp:latest-1804
COPY ./database /var/lib/mysql
COPY . ./app
