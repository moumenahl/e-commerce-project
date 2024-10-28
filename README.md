# e-commerce management system Project

## Description
This project is a **e-commerce** built with **Laravel 10** that provides a **REST API** to users role customer for Authentication and store order and display products , category products . It allows user role admin to perform **CRUD operations** (Create, Read, Update, Delete ,softdelete) on products and category and accept order or delete order.

### Key Features:
- **CRUD Operations**: Create, read, update, and delete category,products,order in the ecommerce.
- **Form Requests**: Validation is handled by custom form request classes.
- **API Response Service**: Unified responses for API endpoints.
- **Resources**: API responses are formatted using Laravel resources for a consistent structure.
- **Seeders**: Populate the database with initial data for testing and development.

### Technologies Used:
- **Laravel 10**
- **PHP**
- **MySQL**
- **XAMPP** (for local development environment)
- **Composer** (PHP dependency manager)
- **Postman Collection**: Contains all API requests for easy testing and interaction with the API.
- **package/ui** (authentication in dashboard)
- **package/sanctum** (authentication in frontend side)


---

## Installation

### Prerequisites

Ensure you have the following installed on your machine:
- **XAMPP**: For running MySQL and Apache servers locally.
- **Composer**: For PHP dependency management.
- **PHP**: Required for running Laravel.
- **MySQL**: Database for the project
- **Postman**: Required for testing the requestes.

### Steps to Run the Project

1. Clone the Repository  
   ```bash
   git clone https://github.com/moumenahl/e-commerce-project.git
2. Navigate to the Project Directory
   ```bash
   cd movie-library
3. Install Dependencies
   ```bash
   composer install
4. Create Environment File
   ```bash
   cp .env.example .env
   Update the .env file with your database configuration (MySQL credentials, database name, etc.).
5. Download node.js
    ```bash
    npm install,npm run dev 
6. Run Migrations
    ```bash
    php artisan migrate
7. Seed the Database
    ```bash
    php artisan db:seed
8. Run the Application
    ```bash
    php artisan serve
9. Interact with the API and test the various endpoints via Postman collection 
    Get the collection from here: https://api.postman.com/collections/32255402-6ae0ed21-0951-48f4-bd6f-8774e64d63ed?access_key=PMAT-01JB9EW25N7E9W2ZSRMC9H2F6S
