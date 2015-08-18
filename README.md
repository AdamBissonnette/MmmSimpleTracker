Mmm Simple Tracker
========

This is a simple project to log client ip and browser info

# Dependencies

* PHP >= 5.4
* [Composer](https://getcomposer.org/)

# Installation

* Install PHP Dependencies: composer install
* Create DB: vendor/bin/doctrine orm:schema-tool:create
* Update DB: vendor/bin/doctrine orm:schema-tool:update --force
* Delete DB: vendor/bin/doctrine orm:schema-tool:drop --force (Note: this won't actually delete your sqlite.db file!)