SHELL = /bin/sh

PWD := $(shell pwd)
UID := $(shell id -u)
GID := $(shell id -g)

export PWD
export UID
export GID

.PHONY: test
test: composer.lock
	docker run --rm -it -v "${PWD}":/app -w /app php:8.0-cli bin/phpspec run -fpretty

composer.lock:
	docker run --rm -it -v "${PWD}":/app -w /app --user "${UID}:${GID}" composer install

.PHONY: clean
clean:
	-rm -rf vendor
	-rm composer.lock
