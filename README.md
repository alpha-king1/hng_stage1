Laravel Number Classification API

Overview

This is a simple Laravel API that classifies numbers based on their properties, such as being prime, perfect, or Armstrong. It also provides a fun fact about the number using the Numbers API.

Features

Check if a number is prime.

Check if a number is perfect.

Identify special properties like odd, even, Armstrong number.

Calculate the sum of its digits.

Fetch a fun fact about the number from the Numbers API.

API Endpoint

GET /api/v1/classify-number?number={number}

Query Parameter = number(the number to classify)

Success Response (200 OK):

{
    "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}

Error Response (400 Bad Request):

{
    "number": "alphabet",
    "error": true,
    "message": "Invalid input. Please provide a valid number."
}


Installation & Setup

Step 1: Clone the Repository

git clone https://github.com/your-username/your-repo.git
cd your-repo

Step 2: Install Dependencies

composer install

Step 3: Configure Environment

Create a .env file by copying .env.example:

cp .env.example .env

Then, generate an application key:

php artisan key:generate

Step 4: Start the Server

php artisan serve

Your API will now be accessible at http://localhost:8000/api/v1/classify-number?number=371

Deployment

You can deploy the API using platforms like Railway, Render, or Heroku. Ensure your .env variables are correctly set up in the hosting environment.

License

This project is open-source and available under the MIT License.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#   h n g _ s t a g e 1 
 
 