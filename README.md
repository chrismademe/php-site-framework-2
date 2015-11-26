# PHP Site Framework 2

1. Clone this repo to your project folder
2. Edit `package.json` with your project name and description.
3. Rename the default theme, found in `app/theme/default` to suit your project.
4. Update `app/config.php` with your new theme name.
5. PHPSF2 will attempt to copy `.env.example` for you. If this fails, copy and rename it to `.env`.

### Install Dependencies
```
npm install
composer install
```

## Theme Cache
Twig caches rendered templates. To do so, it requires permissions to write to the cache folder. Make sure the permissions are set to 775 in the `app/theme/.cache` folder.

## Use it in other projects
PHPSF2 is available as a Composer package so you can use it in your own projects. Just require it:
```
composer require chrismademe/php-site-framework-2
```

Then, include it in your project:
```php
<?php

# Composer Autoloader
require_once '/path/to/autoload.php';

# Include PHPSF2 init.
require_once '/vendor/chrismademe/php-site-framework-2/init.php';
```
