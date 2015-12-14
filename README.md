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

## Deploying
When you upload your site, make sure you're using the `production` tag in `.env` so that errors are not displayed on screen.

## Theme Cache
Twig has the ability to cache rendered templates. To do so, it requires permissions to write to the cache folder. You can set a directory for caching in youe .env file. If you do, don't forget to `chmod 775` on that directory.

### To do
- Add Bower support
