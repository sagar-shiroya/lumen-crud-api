## Lumen CRUD API Project

**Install Dependencies**
```
composer install
```

**Setup the repos to your local**

```
git clone https://github.com/sagar-shiroya/lumen-crud-api.git
cd lumen-crud-api
```

**Run the environment**

```
php -S localhost:8000 -t public
```

**DB Configuration**

-   Change the DB configuration in .env file
-   Migration file located at `database/migrations/2021_02_17_183451_create_candidate_table.php`
-   Migrate the table in your db with `php artisan migrate`
