# Humus Neo4j Module for Zend Framework 2

This module integrates Neo4j-PHP-OGM with Zend Framework 2
quickly and easily. The following features are intended to work out of the box:

  - Neo4j support
  - Multiple entity managers

## Requirements
[Zend Framework 2 Application Skeleton](http://www.github.com/zendframework/ZendSkeletonApplication) (or compatible
architecture)

## Installation

Installation of this module uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

#### Installation steps

  1. `cd my/project/directory`
  2. create a `composer.json` file with following contents:

     ```json
     {
         "minimum-stability": "dev",
         "require": {
             "prolic/humus-neo4j-ogm-module": "dev-master"
         }
     }
     ```
  3. install composer via `curl -s http://getcomposer.org/installer | php` (on windows, download
     http://getcomposer.org/installer and execute it with PHP)
  4. run `php composer.phar install`
  5. open `my/project/directory/configs/application.config.php` and add following keys to your `modules` (in this order)

     ```php
     'HumusNeo4jOGMMOdule',
     ```

  6. copy `vendor/prolic/humus-neo4j-ogm-module/config/module.humus-neo4j-ogm.local.php.dist` into your application's
     `config/autoload` directory, rename it to `module.humus-neo4j-ogm.local.php` and make the appropriate changes.
     With this config file you can configure your neo4j connection settings.

  7. create directory `my/project/directory/data/HumusNeo4jOGMModule/Proxy` and make sure your application has write access to it.

## Usage

#### Service Locator
Access the entity manager using the following service manager alias:

```php
<?php
$em = $this->getServiceLocator()->get('humusneo4jogm.entitymanager.ogm_default');
```
