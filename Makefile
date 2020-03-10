.PHONY: all
all: build install test

.PHONY: build
build:
	@docker build -t elo/php docker/php

.PHONY: install
install:
	@docker run --rm -it -v "${PWD}:/work" elo/php composer install

.PHONY: test
test:
	@docker run --rm -it -v "${PWD}:/work" elo/php vendor/bin/phpunit
