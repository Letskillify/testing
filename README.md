# Premium Perfume - Ecom API

## Project Description

This is a backend API for an e-commerce platform specializing in premium perfumes.  It provides a comprehensive set of endpoints for managing products, categories, orders, users, and other essential e-commerce functionalities.  This API is built using Laravel.

## Key Features

* **Product Management:**
    * Create, retrieve, update, and delete perfume products.
    * Manage product details, including name, description, price, and images.
    * Categorize products and assign them to brands.
* **Category Management:**
    * Create, retrieve, update, and delete product categories.
    * Organize products into hierarchical categories.
* **Order Management:**
    * Create, retrieve, update, and delete customer orders.
    * Manage order status, shipping details, and billing information.
* **User Management:**
    * User registration and authentication.
    * User profile management.
* **Cart Management**
    * Add, update, and delete products in cart.
    * Calculate cart total.
* **Review System:**
    * Customers can write reviews for products.
* **Offer Management:**
    * Manage special offers and discounts on products.
* **Other Features:**
    * Search functionality.
    * API documentation.
    * Database management (MySQL).
    * RESTful API design.
    * Input validation.
    * Error handling.

## Technologies Used

* Laravel 10.x
* MySQL 8.x
* PHP 8.1 or higher
* Composer
* Postman (for API testing)

## Installation

1.  **Clone the repository:**

    ```bash
    git clone [https://github.com/Letskillify/testing.git](https://github.com/Letskillify/testing.git)
    cd testing
    ```

2.  **Install PHP dependencies:**

    ```bash
    composer install
    ```

3.  **Copy the .env file:**

    ```bash
    cp .env.example .env
    ```

4.  **Configure the .env file:**

    * Set up your database connection details:

        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_user
        DB_PASSWORD=your_database_password
        ```

    * Generate an application key:

        ```bash
        php artisan key:generate
        ```

5.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

6.  **Install Passport for API authentication:**

     ```bash
     composer require laravel/passport
     php artisan migrate
     php artisan passport:install
     ```

7.  **Serve the application:**

    ```bash
    php artisan serve
    ```

    The API will be accessible at `http://localhost:8000`.

## API Endpoints

### Product API

* `GET /api/products`:  Retrieve a list of all products.
* `GET /api/products/{id}`: Retrieve a specific product.
* `POST /api/products`:  Create a new product.
* `PUT /api/products/{id}`:  Update an existing product.
* `DELETE /api/products/{id}`: Delete a product.

### Category API

* `GET /api/categories`:  Retrieve a list of all categories.
* `GET /api/categories/{id}`: Retrieve a specific category.
* `POST /api/categories`:  Create a new category.
* `PUT /api/categories/{id}`:  Update an existing category.
* `DELETE /api/categories/{id}`: Delete a category.

### User API
* `POST /api/register`: Register a new user.
* `POST /api/login`: Login and get an authentication token.
* `GET /api/user`: Get the current user's information (requires authentication).

### Order API
* `POST /api/orders`: Create a new order.
* `GET /api/orders/{id}`: Get a specific order.
* `GET /api/orders/user/{user_id}`: Get all orders for a specific user.

### Cart API
* `GET /api/cart`: Get the user's cart.
* `POST /api/cart/add`: Add a product to the cart.
* `POST /api/cart/update/{id}`: Update the quantity of a product in the cart.
* `POST /api/cart/remove/{id}`: Remove a product from the cart.

### Review API
* `POST /api/reviews`: Add a review for a product.
* `GET /api/reviews/{product_id}`: Get all reviews for a product.

## Authentication

The API uses Laravel Passport for authentication.  All protected routes require a valid access token in the `Authorization` header:

Authorization: Bearer <your_access_token>
## Testing

To test the API endpoints, you can use Postman:

1.  Import the provided Postman collection (if available).  If not, create a new collection.
2.  Send requests to the API endpoints listed above.
3.  Include the necessary headers (e.g., `Content-Type: application/json`, `Authorization: Bearer <your_token>`).
4.  Verify the responses.

## Documentation

* API documentation is available at `/api/documentation` (after installation).  (Swagger or similar)

## Contributing

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix.
3.  Commit your changes.
4.  Push to the branch.
5.  Submit a pull request.

##  Further Development

* Implement advanced search features.
* Add more comprehensive error handling.
* Implement  payment gateway integration.
* Create admin panel.
* Add more tests.

##  License

[Specify the license, e.g., MIT]

##  Contact

[Your Name/Company Name]
[Your Email]
