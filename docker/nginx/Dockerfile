FROM nginx:1.27

# Nginxのログディレクトリを作成
RUN mkdir -p /var/log/nginx/logs

# 設定ファイルをコピー
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# ログディレクトリの権限を設定
RUN chown -R www-data:www-data /var/log/nginx/logs
