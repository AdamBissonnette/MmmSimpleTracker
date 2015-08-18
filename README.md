Mmm Simple Tracker
========

Log client ip and browser info along with a given "code" request parameter for ease of lookup later

# Dependencies

* PHP >= 5.4
* [Composer](https://getcomposer.org/)

# Installation

* Install PHP Dependencies: composer install
* Create DB: vendor/bin/doctrine orm:schema-tool:create
* Update DB: vendor/bin/doctrine orm:schema-tool:update --force
* Delete DB: vendor/bin/doctrine orm:schema-tool:drop --force (Note: this won't actually delete your db.sqlite file!)