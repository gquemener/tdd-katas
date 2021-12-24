SHELL = /bin/sh

UID := $(shell id -u)
GID := $(shell id -g)
PWD := $(shell pwd)
PHP := docker run --rm -it --user "${UID}:${GID}" -v "${PWD}":/app -w /app php:8.0-cli-alpine php

tests: unit-tests acceptance-tests

unit-tests:
	${PHP} vendor/bin/phpspec run -fpretty

acceptance-tests:
	${PHP} vendor/bin/behat
