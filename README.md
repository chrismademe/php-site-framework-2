# PHP Site Framework 2

1. Clone this repo to your project folder
2. Edit package.json with your project name and description.

### Install Dependencies
```
npm install
composer install
```

## Theme Cache
Twig caches rendered templates. To do so, make sure the permissions are set to 775 in the `theme/_cache` folder.

## Important
When you upload your project, make sure you login to the root folder in the FTP account, your htdocs/public_html folder will be public facing and src should always be uploaded outside of the public folder.

**Do not upload /node_modules.**
