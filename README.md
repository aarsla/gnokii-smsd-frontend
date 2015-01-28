Gnokii SMSD frontend (Symfony)
========================

PHP frontend for [**gnokii smsd**][1] written in [**Symfony**][2]

Requirements
--------------

gnokii-smsd installed on the same host (update parameters.yml database name/user accordingly)

Screenshots
--------------

![sshot-1](https://raw.githubusercontent.com/aarsla/gnokii-smsd-frontend/master/doc/screenshot-1.png)

![sshot-2](https://raw.githubusercontent.com/aarsla/gnokii-smsd-frontend/master/doc/screenshot-2.png)

Installation
--------------

### 1. Update dependencies###

```
php composer.phar update
```

### 2. Create database schema###

```
php app/console doctrine:schema:create
```

or update existing schema to keep existing database data

```
php app/console doctrine:schema:update --force
```

####Optionally: Import mockup data####

```
php app/console doctrine:fixtures:load
```

**Note: This will purge existing database!**

### 3. Create a user###

```
php app/console fos:user:create
```

[1]:  http://wiki.gnokii.org/index.php/SMSD
[2]:  https://github.com/symfony/symfony