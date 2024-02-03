# task Meta Data
first create database 
After cloning the project  create .env file with the 
newly created database and its credentials and also add
SMS_PROVIDER=https://run.mocky.io/v3/8eb88272-d769-417c-8c5c-159bb023ec0a
to the .env file 
you will need composer install artisan key generate command and serve the project
to test the APIs

# API Documentation

## 1. User Registration

**Route:** `POST /api/signup`

**Description:** Register a new user.

**Request:**
```json
{
    "name": "moataz",
    "email": "moataz@test2.com",
    "phone_number": "0123456789",
    "password": "securepassword"
}

Response (Success):


{
    "user": {
        "id": 1,
        "name": "moataz",
        "email": "moataz@test2.com",
        "phone_number": "0123456789"
        // add other user fields as necessary
    },
    "message": "Registration successful"
}

2. User Login
Route: POST /api/login

Description: Log in an existing user.

Request:
{
    "email": "moataz@koinz.com",
    "password": "securepassword"
}
Response (Success):
{
    "message": "Login successful",
    "token": "Bearer <your_access_token>"
}


3. Get Recommended Books
Route: GET /api/get-recommended-books

Description: Get the top 5 recommended books.

Headers:

Authorization: Bearer <bearer_token_returned_from_login>
Response (Success):
[
{
"book_id": "5",
"book_name": "Clean Code",
"num_of_read_pages": "100"
},
{
"book_id": "1",
"book_name": "Harry Potter",
"num_of_read_pages": "90"
},
{
"book_id": "10",
"book_name": "The Kite Runner",
"num_of_read_pages": "20"
}
]


4. Submit Reading Interval
Route: POST /api/submit-reading-interval

Description: Submit reading intervals for a specific book.

Request:
{
    "user_id": 2,
    "book_id": 2,
    "start_page": 2,
    "end_page": 120
}
Headers:

Accept: application/json
Authorization: Bearer <bearer_token_returned_from_login>
Response (Success):
{
    "message": "Reading interval submitted successfully"
}

