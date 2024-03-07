FROM node:20
WORKDIR /app
COPY package*.json ./
RUN npm install -g @quasar/cli
RUN npm install
COPY . .
EXPOSE 8080
CMD ["quasar", "dev"]
