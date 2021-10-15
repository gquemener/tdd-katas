SHELL = /bin/sh

PWD := $(shell pwd)
UID := $(shell id -u)
GID := $(shell id -g)
PHP_TAG := 8.0-cli-alpine

.PHONY: test
test: composer.lock
	docker run --rm -it -v "${PWD}":/app -w /app php:${PHP_TAG} bin/phpspec run -fpretty

composer.lock:
	docker run --rm -it -v "${PWD}":/app -w /app --user "${UID}:${GID}" composer install

.PHONY: clean
clean:
	-rm -rf vendor
	-rm composer.lock
