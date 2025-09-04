# Companies & You

A project in which authenticated users may create their company listings, which are available for everyone to see.

## Basic Requirements

-   PHP 8.2+
-   MySQL
-   Composer
-   CLI

## Deployment Instructions

Follow these steps to set up the project locally:

1. **Clone the Repository**:

    ```bash
    git@github.com:Jamessks/companies_and_you.git
    ```

    or just download it as a zip file and place it in the directory of your choice.

2. **Project root**: CD to the root directory of the project with a terminal of your choice

3. `cp .env.example .env `

4. `php artisan key:generate`

5. **Composer installation**: `composer install`

6. **Create database:** Create database within your MySQL configuration and adjust the following fields inside .env file
    ```DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ps_assessment
    APP_NAME="Companies & You"

    ```
7. **Run migrations and seed db**: `php artisan migrate:fresh --seed` from project root (This will create required tables and populate them with their corresponding data)

8. **Serve locally**: `php artisan serve`

9. **Access application**: Access the project at http://127.0.0.1:8000/

```
php artisan test
```

to run available unit tests with PHPUnit

# **Available actions for the project**

Unauthenticated users may:

-   navigate to home page http://127.0.0.1:8000
-   navigate to search page http://127.0.0.1:8000/search and search by company name (full text search)
-   navigate to all companies browsing page http://127.0.0.1:8000/all-companies
-   navigate to http://127.0.0.1:8000/login and login as a registered user
-   navigate to http://127.0.0.1:8000/register to create a new account

Authenticated users may:

-   navigate to home page http://127.0.0.1:8000
-   log out of their account
-   navigate to search page http://127.0.0.1:8000/search and look by company name (full text search)
-   navigate to all companies browsing page http://127.0.0.1:8000/all-companies
-   create a new company from http://127.0.0.1:8000/companies/create
-   view their own companies from http://127.0.0.1:8000/companies
-   edit, delist, restore and delete their own companies from http://127.0.0.1:8000/companies
-   view a company listing profile page (delisted or listed) eg. http://127.0.0.1:8000/companies/41

# Considerations

Ideally for a larger scale project, it would be better if a dedicated search engine was used to handle search requests for http://127.0.0.1:8000/search
like Laravel Scout, which is used specifically in laravel projects, or ElasticSearch and many others that are available.

# Todo

Dockerize the project and make setup seemless with Laravel sail
