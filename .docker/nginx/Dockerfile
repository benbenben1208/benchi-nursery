FROM nginx:1.19-alpine

ENV TZ Asia/Tokyo

COPY ./.docker/nginx/conf/ecs/default.conf /etc/nginx/conf.d/default.conf
COPY . /api
EXPOSE 80
WORKDIR /api
# RUN chown -R www-data:www-data
