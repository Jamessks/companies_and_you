# Companies & You

A project in which authenticated users may create their company listings, which are available for everyone to see.

## Requirements

-   Docker
-   Docker Compose

## Quick Start with Docker (Recommended)

1. **Clone the Repository**:

    ```bash
    git clone git@github.com:Jamessks/companies_and_you.git
    cd companies_and_you
    ```

2. **Copy environment file**:

    ```bash
    cp .env.example .env
    ```

3. **Install dependencies**:

    ```bash
    composer install
    ```

4. **Start Docker containers**:

    ```bash
    ./vendor/bin/sail up -d
    ```

5. **Generate application key**:

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

6. **Build frontend assets**:

    ```bash
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run build
    ```

7. **Run migrations and seed database**:

    ```bash
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

8. **Access application**: http://localhost

## Useful Commands

```bash
# Start containers
./vendor/bin/sail up -d

# Stop containers
./vendor/bin/sail down

# Run tests
./vendor/bin/sail test

# Access container shell
./vendor/bin/sail shell

# Run artisan commands
./vendor/bin/sail artisan [command]

# Frontend development (hot reload)
./vendor/bin/sail npm run dev
```

## Available Features

**Unauthenticated users may:**

-   Navigate to home page http://localhost
-   Search companies by name http://localhost/search
-   Browse all companies http://localhost/all-companies
-   Login http://localhost/login
-   Register http://localhost/register

**Authenticated users may:**

-   All unauthenticated features
-   Create new companies http://localhost/companies/create
-   Manage their companies http://localhost/companies
-   Edit, delist, restore and delete their companies
-   View company profiles

## Technical Notes

-   **Docker Support**: Full Docker environment with Laravel Sail
-   **Database**: MySQL 8.0 with automatic setup
-   **Frontend**: Vite for asset compilation
-   **Testing**: PHPUnit test suite included
-   **Search**: Full-text search implementation (consider Laravel Scout for production)
