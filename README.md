# Mini ERP Project

## Overview
This is a mini ERP (Enterprise Resource Planning) project built using Laravel. It provides functionalities to manage orders, products, coupons, and inventory. The application is designed to help businesses streamline their operations and manage their resources effectively.

## Features
- **Order Management**: Create, read, update, and delete orders.
- **Product Management**: Manage product listings, including creation and updates.
- **Coupon Management**: Create and manage discount coupons.
- **Inventory Management**: Track inventory levels for products.

## Installation
1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```
   cd mini-erp
   ```
3. Install dependencies:
   ```
   composer install
   ```
4. Set up your environment file:
   ```
   cp .env.example .env
   ```
5. Generate the application key:
   ```
   php artisan key:generate
   ```
6. Run migrations to set up the database:
   ```
   php artisan migrate
   ```

## Usage
- Start the local development server:
  ```
  php artisan serve
  ```
- Access the application at `http://localhost:8000`.

## Directory Structure
- **app/Http/Controllers**: Contains all the controllers for managing different resources.
- **app/Models**: Contains the models representing the database tables.
- **database/migrations**: Contains migration files for creating database tables.
- **resources/views**: Contains Blade templates for the frontend views.
- **routes/web.php**: Defines the web routes for the application.

## Contributing
Feel free to fork the repository and submit pull requests for any improvements or features you'd like to add.

## License
This project is open-source and available under the MIT License.