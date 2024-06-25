# PropertyBook Assessment Laravel Application

## Introduction

This is a Laravel-based web application that includes the following features:
- A fully functional one-page website with navigation.
- Admin panel for managing sections and pricing.
- Sections can have subsections (self-referencing).
- Basic user authentication for the admin panel.
- Example seeders for `User`, `Pricing`, and `Section` models.

## Requirements

- PHP >= 7.4
- Composer
- Laravel 8.x
- SQLite (or any other database supported by Laravel)
- Node.js and npm (for frontend dependencies)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/theonga/propertybook_ev 
    cd propertybook_ev
    ```

2. **Install dependencies:**

    ```bash
    composer install
    npm install
    ```

3. **Set up the environment file:**

    Copy `.env.example` to `.env` and configure the necessary environment variables.

    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**

    Ensure you have a SQLite database file or configure your preferred database in the `.env` file.

    ```bash
    touch database.sqlite
    ```

    Update your `.env` file with the following:

    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=/absolute/path/to/database/database.sqlite
    ```

6. **Run migrations and seeders:**

    ```bash
    php artisan migrate --seed
    ```

    This will create the necessary tables and seed the database with initial data.

## Usage

1. **Run the development server:**

    ```bash
    php artisan serve
    ```

2. **Access the application:**

    Open your web browser and navigate to `http://localhost:8000`.

3. **Admin Panel:**

    Access the admin panel at `http://localhost:8000/admin`.
    
    Use the following credentials to log in:
    
    ```markdown
    Email: vacancy@propertybook.co.zw
    Password: password1
    ```

## Features

### Frontend

- **Navigation Menu:**
    - Smooth scrolling to sections.
- **Sections:**
    - Dynamic content with titles, descriptions, and images.

### Backend

- **Admin Panel:**
    - Manage sections and pricing.
    - Add, update, and delete sections and subsections.
    - Add, update, and delete pricing plans.

### Models

- **Section:**
    - `name`: string
    - `title`: string
    - `content`: text (nullable)
    - `image`: string (nullable)
    - `parent_id`: unsignedBigInteger (nullable, self-referencing)

- **Pricing:**
    - `package`: string
    - `description`: text (nullable)
    - `price`: decimal
    - `features`: text (comma-separated values)

## Seeders

- **UserSeeder:**
    - Creates an admin user with predefined credentials.
    
- **PricingSeeder:**
    - Seeds the database with initial pricing plans.
    
- **SectionSeeder:**
    - Seeds the database with initial sections.
    - Update the images in `/admin`
    - For Services section, create sub sections that has "Services" as the parent,
    - For Our Story section, create sub sections that has "Story" as the parent, e.g the Mission, Vision sections

## Customization

- **CSS and JavaScript:**
    - Use `resources/css/app.css` and `resources/js/app.js` for custom styles and scripts.
    - Compile assets using Laravel Mix:

    ```bash
    npm run dev
    ```