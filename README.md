# TODOs
Simple CRUD Operations on TODOs and Users using `Laravel 5.4` with `PHP 5.6`
  

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
 
   `Authorization : "Bearer token"`

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
 
   `Authorization : "Bearer token"`

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
        
        
**Update Profile**
----
  Updates user data and returns json data about the updated user.

* **URL:**

  /api/users/:id

* **Method:**

  `PUT`
  
*  **URL Params:**

    **Required:**
      `id : [integer]`

* **Request Headers:**

   **Required:**
 
   `Authorization : "Bearer token"`
   `Content-Type : "application/json"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ {
        "id": 4,
        "name": "ali",
        "email": "ali@example.com",
        "created_at": "2018-06-24 10:59:16",
        "updated_at": "2018-06-24 20:08:53"
    } }`
 
* **Error Response:**

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "Unauthorized" }`
 
 
 
 **Get All TODOs**
----
  Returns a json data about all TODOs.

* **URL:**

  /api/todos

* **Method:**

  `GET`

*  **URL Params:**

    None
  
* **Request Headers:**

   **Required:**
 
   `Authorization : "Bearer token"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ 
   "todos": [
        {
            "id": 1,
            "title": "updated",
            "done": 1,
            "user_id": 4,
            "created_at": "2018-06-24 15:26:59",
            "updated_at": "2018-06-24 17:31:39",
            "user": {
                "id": 4,
                "name": "ali",
                "email": "ali@yahoo.com"
            }
        },
        {
            "id": 2,
            "title": "Test",
            "done": 0,
            "user_id": 4,
            "created_at": "2018-06-24 15:29:03",
            "updated_at": "2018-06-24 15:29:03",
            "user": {
                "id": 4,
                "name": "ali",
                "email": "ali@yahoo.com"
            }
        }]
        }`
 

**Create a TODO**
----
  Creates a new TODO and returns json data about the newly Created TODO.

* **URL:**

  /api/todos

* **Method:**

  `POST`
  
*  **URL Params:**

    None
    
*  **Data Params:**

   **Required:**
 
   `title : "Bearer token"`

* **Request Headers:**

   **Required:**
 
   `Authorization : "Bearer token"`
   `Content-Type : "application/json"`

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
        "title": "Test",
        "user_id": 4,
        "updated_at": "2018-06-24 22:38:38",
        "created_at": "2018-06-24 22:38:38",
        "id": 8
     }`
     
     
       

**Get a single TODO**
----
  Returns Json data about a single TODO,

* **URL:**

  /api/todos/:id

* **Method:**

  `GET`
  
*  **URL Params:**

    **Required:**
      `id : [integer]`

* **Request Headers:**

   **Required:**
 
   `Authorization : "Bearer token"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ 
        "id": 1,
        "title": "Dummy Text",
        "done": 1,
        "user_id": 4,
        "created_at": "2018-06-24 15:26:59",
        "updated_at": "2018-06-24 17:31:39"
    }`

 
**Update a TODO**
----
  Updates a TODO data (title or done) and returns json data about the updated TODO.

* **URL:**

  /api/todos/:id

* **Method:**

  `PUT`
  
*  **URL Params:**


    **Required:**
      `id : [integer]`

* **Request Body:**
  `{
    "title" : "Dummy Text",
	  "done" : 1
  }`
  
* **Request Headers:**

   **Required:**
 
     `Authorization : "Bearer token"`
     `Content-Type : "application/json"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ 
        "id": 1,
        "title": "updated",
        "done": 1,
        "user_id": 4,
        "created_at": "2018-06-24 15:26:59",
        "updated_at": "2018-06-24 17:31:39"
    }`
 
* **Error Response:**

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "Unauthorized" }`
 
 
  
**Delete a TODO**
----
  Deletes a TODO data.

* **URL:**

  /api/todos/:id

* **Method:**

  `DELETE`
  
*  **URL Params:**

    **Required:**
      `id : [integer]`
  
* **Request Headers:**

   **Required:**
 
     `Authorization : "Bearer token"`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ 
        "message": "Deleted!"
    }`
 
* **Error Response:**

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "Unauthorized" }`
 
 



