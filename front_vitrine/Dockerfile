# Etapa 1: Build do Angular
FROM node:20 as builder
WORKDIR /app
COPY . .
RUN npm install
RUN npm run build

# Etapa 2: Servidor Nginx
FROM nginx:alpine
COPY --from=builder /app/dist/lojas001/browser /usr/share/nginx/html
COPY nginx.conf /etc/nginx/nginx.conf
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
