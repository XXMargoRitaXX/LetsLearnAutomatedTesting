install:
	composer install

validate:
	composer validate

test:
	composer exec --verbose phpunit tests -- --testdox

test-coverage:
	composer test-coverage

test-coverage-html:
	composer test-coverage-html
