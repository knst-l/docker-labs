FROM node:24-alpine

RUN npm install -g pnpm@10.30.3
WORKDIR /app
COPY source/ .
RUN HUSKY=0 pnpm install --frozen-lockfile && pnpm run build

EXPOSE 80
CMD ["pnpm", "run", "preview", "--host", "0.0.0.0", "--port", "80", "--strictPort"]
