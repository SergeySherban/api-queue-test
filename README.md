## Setup Instructions

1. Clone the Repository:

   git clone <repository_url>

   cd project-directory

2. Install Dependencies:

    composer install

3. Create Environment File:

    cp .env.example .env

4. Generate Application Key:

    php artisan key:generate

5. Configure Database:

    Update the database configuration in the .env file with your database credentials.

6. Run Migrations:

    php artisan migrate

## Testing the API Endpoint

1. Start the Development Server:

    php artisan serve

2. Sending a POST Request:

    Use a tool like Postman or cURL to send a POST request to the /api/submit endpoint with the following JSON payload structure:

    {
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
    }

## Unit test

    php artisan test --testsuite=Unit


## Validating the Response:

1. If the request is successful and the data is valid, you'll receive a JSON response with a message indicating that the submission was received.

2. If there are validation errors (e.g., missing required fields), you'll receive a JSON response with the corresponding error message and a status code of 422 Unprocessable Entity.

3. If any unexpected error occurs during job processing, you'll receive a JSON response with an error message and a status code of 500 Internal Server Error.
