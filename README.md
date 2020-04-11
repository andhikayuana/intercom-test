# Intercom Test

## Requirements

* [Git](https://git-scm.com/)
* [PHP 7.2](https://www.php.net/)
* [Composer](https://getcomposer.org/)

## How to Install

* clone this repository using git
* go to project directory
* install project dependencies using `composer install`

```sh
git clone git@github.com:andhikayuana/intercom-test.git
cd intercom-test
composer install
```

## How to Execute

you can execute inside the project directory by using this command

```sh
php yuana
# or you can use 
make run
```

if you need to test with another file, you can replace `storage/customers.txt` file

and then you will see the invited customers that printed on the terminal and you can find the output file inside the `tmp/output.txt`

if you need to see the output sample, you can find in `storage/sample-output.txt`

## Running Test

To run the test, you can execute `make test` command and then you can find the test coverage inside `tmp/coverage/index.html`

## Misc.

if you found an error like `PHP Fatal error:  Allowed memory size of 268435456 bytes exhausted` you need to increase the PHP memory limit. [reference](https://www.php.net/manual/en/ini.core.php#ini.memory-limit)

if you need to empty the tmp directory, you can execute `make clean` command