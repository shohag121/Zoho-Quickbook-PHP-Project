# ZohoCRM-API
php project starter for working with Zoho CRM API v2.

## Install
Run
```
composer create-project shohag/zoho-crm-api-installer my-new-project
```
or download or clone the repository, `cd` into the project folder and run:
```
composer install
```

## Run Project
Run:
```
cd my-new-project
php serve
```
This will open a server on localhost:900.

### Authentication
1. Visit /gen.php E.G.: http://localhost:900/gen.php
1. Create Client App
1. Fill up the `config.php` file with app credentials.
1. Click the __Authorize__ link to authorize the app and generate tokens.
1. Visit `index.php`
