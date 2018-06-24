# TODOs
Simple CRUD Operations on TODOs and Users

**Register**
----
  Creates a new user and returns json data about the newly created user.

* **URL:**

  /api/register

* **Method:**

  `POST`

*  **URL Params:**

    None
  
* **Data Params**

   **Required:**
 
   `name=[string]`
   `email=[email]`
   `password=[string|min 6 characters]`
   `password_confirmation=[string]`

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{ token : "access_token_goes_here", name : "Michael Bloom" }`
 
* **Error Response:**

  * **Code:** 400 Bad Request <br />
    **Content:** `{ error : "Validation errors" }`

  

**Login**
----
  Returns token for the authenticated user.

* **URL:**

  /api/login

* **Method:**

  `POST`
  
*  **URL Params:**

    None

* **Data Params:**

   **Required:**
 
   `email=[email]`
   `password=[string]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ token : "access_token_goes_here" }`
 
* **Error Response:**

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "Unauthorized" }`

  

**User Profile**
----
  Returns Json data about the user.

* **URL:**

  /api/profile

* **Method:**

  `GET`
  
*  **URL Params:**

    None

* **Request Headers:**

   **Required:**
 
   `Authorization="Bearer token"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ id : 1, name : "user name", email : "email", "created_at": "2018-06-24 10:59:16", "updated_at": "2018-06-24 20:08:53" }`
 
 
 **Get All Users**
----
  Returns a json data about all users.

* **URL:**

  /api/users

* **Method:**

  `GET`

*  **URL Params:**

    None
  
* **Request Headers:**

   **Required:**
 
   `Authorization="Bearer token"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ 
    "users": [
        {
            "id": 3,
            "name": "Anas Ahmed",
            "email": "anas@yahoo.com",
            "created_at": "2018-06-23 23:14:09",
            "updated_at": "2018-06-23 23:14:09"
        },
        {
            "id": 4,
            "name": "ali",
            "email": "ali@yahoo.com",
            "created_at": "2018-06-24 10:59:16",
            "updated_at": "2018-06-24 20:08:53"
        }]
        }`
 

