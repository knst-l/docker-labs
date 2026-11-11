FROM node:24-alpine

RUN apk add --no-cache git && npm install -g pnpm@10.30.3
WORKDIR /app
COPY start.sh /usr/local/bin/start-zigzag
EXPOSE 80
ENTRYPOINT ["/bin/sh", "/usr/local/bin/start-zigzag"]
