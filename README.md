## Docker installation

:whale: Install Docker and Docker-Compose for the operating system of your choice.

https://docs.docker.com/install

:file_folder: Get into your project directory.

```bash
cd people
```

:rocket: Run the containers.

```bash
docker-compose up -d --build
```

:point_right: Access the PHP container.

```bash
docker exec -it php /bin/bash
```

:hammer: Install dependencies.

```bash
composer install
```

:pencil2: Rename the docker example .env file

```bash
cp .env.docker.example .env
```

:key: Generate application key

```bash
php artisan key:generate
```

:truck: Run the migrations

```bash
php artisan migrate
```

:tada: Access the site using from your browser

http://localhost:8080/