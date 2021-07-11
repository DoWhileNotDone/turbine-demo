# Demo Turbine App

## Setup 

All Steps are run using docker cli from the root directory

1. Install PHP Dependencies

```bash
docker run --rm --interactive --tty --volume "$PWD/server":/app composer install
```
2. Install Node Dependencies

```bash
docker run -it  --rm -v "$PWD/client":/app -w "/app" node:latest npm install
```
3. Build Assets

```bash
docker run -it  --rm -v "$PWD/client":/app -w "/app" node:latest npm run build
```

4. Run Servers
 * Client
```bash
docker run -d -p 8882:8080 --name=demo-client --rm -v "$PWD/client/public":/app -w "/app" node:latest npx http-server
```

 * Server
```bash
docker run -d -p 8881:80 --name=demo-server --rm -v "$PWD/server":/var/www php:8-apache
```

## View Website 

http://127.0.0.1:8882/


## Run Tests

1. PHPUnit

```bash
    docker run --rm -v "$PWD/server":/app -w "/app" php:8-apache ./vendor/bin/phpunit
```

2. Jest

```bash
    docker run -it  --rm -v "$PWD/client":/app -w "/app" node:latest npm run test
```

## Shutdown

1. Stop Docker Containers
```bash
docker stop demo-client
```
```bash
docker stop demo-server
```

## To Do

 * Improve asset creation - it is a mix of webpack/babel for react, and postcss for tailwind.
 * Improve structure of react components
 * Improve react tests
 * Include CI
 * Host on AWS