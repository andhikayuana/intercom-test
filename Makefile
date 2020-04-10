test:
	@echo "---- Running Tests ----"
	@./vendor/bin/phpunit --testdox --coverage-html="tmp/coverage/report"

run:
	@echo "---- Getting Invited Customers ----"
	@php yuana

clean:
	@echo "--- Cleaning Coverage ----"
	@rm -rf tmp