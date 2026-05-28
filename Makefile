install:
	composer install

test:
	composer exec --verbose phpunit tests -- --testdox

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-html coverage

test-coverage-text:
	composer exec --verbose phpunit tests -- --coverage-text