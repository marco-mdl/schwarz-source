# schwarz demo project

## Getting Started

```
$ mkdir projectName
$ cd projectName
$ git clone git@github.com:marco-mdl/schwarz-docker.git
$ git clone git@github.com:marco-mdl/schwarz-source.git src
$ cd schwarz-docker/
$ docker-compose up -d
$ docker-compose exec php composer install
$ docker-compose exec php bin/console doct:migr:migra
$ docker-compose exec php bin/phpunit
```


call http://localhost
