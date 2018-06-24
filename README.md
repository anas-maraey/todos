# todos
Simple CRUD Operations on TODOs and Users

**Register**
----
  Creates a new user and returns json data about the newly created user.

* **URL**

  /api/register

* **Method:**

  `POST`

* **Data Params**

   **Required:**
 
   `name=[string]`
   `email=[email]`
   `password=[string]`

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{ token : "access_token_goes_here", name : "Michael Bloom" }`
 
* **Error Response:**

  * **Code:** 400 Bad Request <br />
    **Content:** `{ error : "Validation errors" }`

  ```
