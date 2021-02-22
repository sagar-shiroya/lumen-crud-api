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

**API consists of 4 different requests**
1. GET (Get candidates with page and limit offset)
2. GET (Get candidate by ID)
3. POST (Add candidate)
4. POST (Search Candidate)

**Below are four routes created:**

1. GET <http://localhost:8000/v1/candidates/page/2/limit/2>
2. GET <http://localhost:8000/v1/candidate/5>
3. POST <http://localhost:8000/v1/candidates/>
4. POST <http://localhost:8000/v1/candidates/search>

**Note:** Please include _api_token_ in header. If you didn't add API Token with correct value in header, your request will be unauthorized with 401 error code. To find correct value of api_token, please refer `AuthServiceProvider.php` file.
