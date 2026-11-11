FROM node:24-alpine

ARG GIT_URL=https://github.com/michaelkolesidis/zigzag.git
ARG GIT_REF=3c09ccbbcdff11bc8abc4b3b7444f46ab2e8c13a

WORKDIR /app

RUN apk add --no-cache git \
    && npm install -g pnpm@10.30.3 \
    && git init \
    && git fetch --depth 1 "${GIT_URL}" "${GIT_REF}" \
    && git checkout --detach FETCH_HEAD \
    && HUSKY=0 pnpm install --frozen-lockfile \
    && pnpm run build

EXPOSE 80
CMD ["pnpm", "run", "preview", "--host", "0.0.0.0", "--port", "80", "--strictPort"]
