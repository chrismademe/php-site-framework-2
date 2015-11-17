# PHP Site Framework 2

1. Clone this repo to your project folder
2. Edit `package.json` with your project name and description.
3. Rename the default theme, found in `app/theme/default` to suit your project.
4. Update `app/config.php` with your new theme name.
5. Rename `.env.example` to `.env` and add environment variables for your project.

### Install Dependencies
```
npm install
composer install
```

## Theme Cache
Twig caches rendered templates. To do so, it requires permissions to write to the cache folder. Make sure the permissions are set to 775 in the `app/theme/_cache` folder.
