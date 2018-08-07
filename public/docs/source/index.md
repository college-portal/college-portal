---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_af82433e555a57f31d78233071a5a020 -->
## Authenticate User

Uses basic authentication and returns a Json Web Token

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/auth" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/auth",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/auth`


<!-- END_af82433e555a57f31d78233071a5a020 -->

<!-- START_b2892eb191cd19c0a6f1aae56ba43db4 -->
## Get Current User

Retrieve information about the current authenticated user

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/user",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "email": "owner.orlando@mailinator.com",
    "first_name": "Owner",
    "last_name": "Orlando",
    "other_names": null,
    "display_name": "Owner Orlando",
    "dob": "1964-10-30",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/user`

`HEAD api/v1/user`


<!-- END_b2892eb191cd19c0a6f1aae56ba43db4 -->

<!-- START_fa8ba4bb4dd01057546f68a50212b5fc -->
## Get Schools

Responds with a list of Schools
- Rules of Access
  - User is admin or in school
- Filters
  - ?with_schools

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Yaba College of Technology",
            "short_name": "YABATECH",
            "owner_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/schools?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/schools?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/schools",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/schools`

`HEAD api/v1/schools`


<!-- END_fa8ba4bb4dd01057546f68a50212b5fc -->

<!-- START_0a8fab856261f7930a27b84600273e6a -->
## Create School

Supply School information to create a new one

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/schools" \
-H "Accept: application/json" \
    -d "name"="deleniti" \
    -d "short_name"="deleniti" \
    -d "staff_title"="deleniti" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools",
    "method": "POST",
    "data": {
        "name": "deleniti",
        "short_name": "deleniti",
        "staff_title": "deleniti"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/schools`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    short_name | string |  required  | 
    staff_title | string |  optional  | 

<!-- END_0a8fab856261f7930a27b84600273e6a -->

<!-- START_3fb9346c9ea3514e25811b13b0e33b33 -->
## Get School by ID

Responds with a specific School by its ID
- Rules of Access
  - User is admin or in school
- Filters
  - ?with_schools

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Yaba College of Technology",
    "short_name": "YABATECH",
    "owner_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/schools/{school}`

`HEAD api/v1/schools/{school}`


<!-- END_3fb9346c9ea3514e25811b13b0e33b33 -->

<!-- START_8dcac1884859089116fde36ed3e8249e -->
## Update School

Modify information about an existing School by ID
- Rules of Access
 - User is an ADMIN or
 - User owns the School

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/schools/{school}`

`PATCH api/v1/schools/{school}`


<!-- END_8dcac1884859089116fde36ed3e8249e -->

<!-- START_c217e0fb953e485de7b69be938a4e15b -->
## Delete School

Removes a School from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns the School

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/schools/{school}`


<!-- END_c217e0fb953e485de7b69be938a4e15b -->

<!-- START_080f3ecebb7bcc2f93284b8f5ae1ac3b -->
## Get Users

Responds with a list of Users
- Rules of Access
  - User is same school
- Filters
  - ?with_staff
  - ?with_students

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "email": "owner.orlando@mailinator.com",
            "first_name": "Owner",
            "last_name": "Orlando",
            "other_names": null,
            "display_name": "Owner Orlando",
            "dob": "1964-10-30",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "email": "dean.daniel@mailinator.com",
            "first_name": "Dean",
            "last_name": "Daniels",
            "other_names": null,
            "display_name": "Dean Daniels",
            "dob": "1984-02-10",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "email": "demo.denis.okeefe@example.net",
            "first_name": "Abraham",
            "last_name": "Mosciski",
            "other_names": null,
            "display_name": "Abraham Mosciski",
            "dob": "1955-01-27",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "email": "demo.sschoen@example.net",
            "first_name": "Sydnie",
            "last_name": "Kemmer",
            "other_names": null,
            "display_name": "Sydnie Kemmer",
            "dob": "1975-04-01",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "email": "demo.eriberto.maggio@example.com",
            "first_name": "Helen",
            "last_name": "Botsford",
            "other_names": null,
            "display_name": "Helen Botsford",
            "dob": "1953-08-07",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "email": "demo.fernser@example.com",
            "first_name": "Stan",
            "last_name": "Lynch",
            "other_names": null,
            "display_name": "Stan Lynch",
            "dob": "1961-11-22",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/users?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/users?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/users",
    "per_page": 15,
    "prev_page_url": null,
    "to": 6,
    "total": 6
}
```

### HTTP Request
`GET api/v1/users`

`HEAD api/v1/users`


<!-- END_080f3ecebb7bcc2f93284b8f5ae1ac3b -->

<!-- START_4194ceb9a20b7f80b61d14d44df366b4 -->
## Create User

Supply User information to create a new one

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/users" \
-H "Accept: application/json" \
    -d "first_name"="eligendi" \
    -d "last_name"="eligendi" \
    -d "email"="lenore05@example.org" \
    -d "password"="eligendi" \
    -d "dob"="2003-09-22" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/users",
    "method": "POST",
    "data": {
        "first_name": "eligendi",
        "last_name": "eligendi",
        "email": "lenore05@example.org",
        "password": "eligendi",
        "dob": "2003-09-22"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | 
    last_name | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 
    dob | date |  required  | 

<!-- END_4194ceb9a20b7f80b61d14d44df366b4 -->

<!-- START_b4ea58dd963da91362c51d4088d0d4f4 -->
## Get User by ID

Responds with a specific User by its ID
- Rules of Access
  - User is same school
- Filters
  - ?with_staff
  - ?with_students

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/users/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "email": "owner.orlando@mailinator.com",
    "first_name": "Owner",
    "last_name": "Orlando",
    "other_names": null,
    "display_name": "Owner Orlando",
    "dob": "1964-10-30",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/users/{user}`

`HEAD api/v1/users/{user}`


<!-- END_b4ea58dd963da91362c51d4088d0d4f4 -->

<!-- START_296fac4bf818c99f6dd42a4a0eb56b58 -->
## Update User

Modify information about an existing User by ID
- Rules of Access
 - User is an ADMIN or
 - User is updating his/her own account

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/users/{user}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/users/{user}`

`PATCH api/v1/users/{user}`


<!-- END_296fac4bf818c99f6dd42a4a0eb56b58 -->

<!-- START_22354fc95c42d81a744eece68f5b9b9a -->
## Delete User

Removes a User from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User is deleting his/her own account

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/users/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/users/{user}`


<!-- END_22354fc95c42d81a744eece68f5b9b9a -->

<!-- START_c9d3b927b6965b01a76d34cda213ca5b -->
## Get Faculties

Responds with a list of Faculties
- Rules of Access
  - User is in the same school
- Filters
  - ?with_departments
  - ?with_programs
  - ?with_students
  - ?with_staff
  - ?with_users

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/faculties",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Law",
            "dean_id": 1,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/faculties?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/faculties?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/faculties",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/faculties`

`HEAD api/v1/faculties`


<!-- END_c9d3b927b6965b01a76d34cda213ca5b -->

<!-- START_0c8c499795da31a51f59483fd01024d2 -->
## Create Faculty

Supply Faculty information to create a new one
- Rules of Access
 - User is an administrator or
 - User owns school the Faculty belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/faculties" \
-H "Accept: application/json" \
    -d "name"="ullam" \
    -d "school_id"="153" \
    -d "dean_id"="153" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/faculties",
    "method": "POST",
    "data": {
        "name": "ullam",
        "school_id": 153,
        "dean_id": 153
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/faculties`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    school_id | numeric |  required  | Valid school id
    dean_id | numeric |  required  | Valid staff id

<!-- END_0c8c499795da31a51f59483fd01024d2 -->

<!-- START_2b4b96972ff9388c1c971ecfc843a678 -->
## Get Faculty by ID

Responds with a specific Faculty by its ID
- Rules of Access
  - User is in the same school
- Filters
  - ?with_departments
  - ?with_programs
  - ?with_students
  - ?with_staff
  - ?with_users

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/faculties/{faculty}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Law",
    "dean_id": 1,
    "school_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/faculties/{faculty}`

`HEAD api/v1/faculties/{faculty}`


<!-- END_2b4b96972ff9388c1c971ecfc843a678 -->

<!-- START_bae63780312e049c058daea185fe33e5 -->
## Update Faculty

Modify information about an existing Faculty by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Faculty belongs to or
 - User is Dean of the Faculty

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/faculties/{faculty}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/faculties/{faculty}`

`PATCH api/v1/faculties/{faculty}`


<!-- END_bae63780312e049c058daea185fe33e5 -->

<!-- START_bbd224a14d96f159144315ab9a1ad68d -->
## Delete Faculty

Removes a Faculty from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Faculty belongs to or
 - User is Dean of the Faculty

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/faculties/{faculty}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/faculties/{faculty}`


<!-- END_bbd224a14d96f159144315ab9a1ad68d -->

<!-- START_1d1d007961b8cb854b4886d45436f988 -->
## Get Departments

Responds with a list of Departments
- Rules of Access
  - User is in the same school
- Filters
  - ?with_faculty
  - ?with_hod
  - ?with_programs
  - ?with_staff
  - ?with_students

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/departments" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/departments",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Physics",
            "hod_id": 1,
            "faculty_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "name": "Logic and Design",
            "hod_id": 1,
            "faculty_id": 1,
            "created_at": "2018-08-07 07:32:07",
            "updated_at": "2018-08-07 07:32:07"
        },
        {
            "id": 3,
            "name": "Logic and Design",
            "hod_id": 1,
            "faculty_id": 1,
            "created_at": "2018-08-07 07:33:15",
            "updated_at": "2018-08-07 07:33:15"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/departments?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/departments?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/departments",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/v1/departments`

`HEAD api/v1/departments`


<!-- END_1d1d007961b8cb854b4886d45436f988 -->

<!-- START_906e9f05fc0e3e67e494de5216c04690 -->
## Create Department

Supply Department information to create a new one
- Rules of Access
 - User is an administrator or
 - User owns school the Department belongs to or
 - User is Dean of Faculty the Department belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/departments" \
-H "Accept: application/json" \
    -d "name"="rem" \
    -d "hod_id"="84163" \
    -d "faculty_id"="84163" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/departments",
    "method": "POST",
    "data": {
        "name": "rem",
        "hod_id": 84163,
        "faculty_id": 84163
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/departments`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    hod_id | numeric |  required  | Valid staff id
    faculty_id | numeric |  required  | Valid faculty id

<!-- END_906e9f05fc0e3e67e494de5216c04690 -->

<!-- START_c378864792ae8ead8dd366c729bae0f2 -->
## Get Department by ID

Responds with a specific Department by its ID
- Rules of Access
  - User is in the same school
- Filters
  - ?with_faculty
  - ?with_hod
  - ?with_programs
  - ?with_staff
  - ?with_students

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/departments/{department}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Physics",
    "hod_id": 1,
    "faculty_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/departments/{department}`

`HEAD api/v1/departments/{department}`


<!-- END_c378864792ae8ead8dd366c729bae0f2 -->

<!-- START_accd9957963adc58a7fe94bac55bf7b5 -->
## Update Department

Modify information about an existing Department by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Department belongs to or
 - User is Dean of Faculty the Department belongs to or
 - User is HOD of the Department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/departments/{department}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/departments/{department}`

`PATCH api/v1/departments/{department}`


<!-- END_accd9957963adc58a7fe94bac55bf7b5 -->

<!-- START_9b6e8ce529e300ec3bd3f2b26d57143d -->
## Delete Department

Removes a Department from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Department belongs to or
 - User is Dean of Faculty the Department belongs to or
 - User is HOD of the Department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/departments/{department}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/departments/{department}`


<!-- END_9b6e8ce529e300ec3bd3f2b26d57143d -->

<!-- START_a7dbb997321672547bff79bbd22fbc0d -->
## Get Programs

Responds with a list of Programs
- Rules of Access
  - User is same school as program
- Filters
  - ?with_departments

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/programs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/programs",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Library Studies",
            "department_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/programs?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/programs?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/programs",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/programs`

`HEAD api/v1/programs`


<!-- END_a7dbb997321672547bff79bbd22fbc0d -->

<!-- START_86b49432fac64a3938d5727995607168 -->
## Create Program

Supply Program information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to
 - User is Dean of Program's faculty
 - User is HOD of Program's department

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/programs" \
-H "Accept: application/json" \
    -d "name"="eum" \
    -d "department_id"="1823" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/programs",
    "method": "POST",
    "data": {
        "name": "eum",
        "department_id": 1823
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/programs`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    department_id | numeric |  required  | Valid department id

<!-- END_86b49432fac64a3938d5727995607168 -->

<!-- START_70e8e8bfe9ff9bd02e12e16ceb9ff46f -->
## Get Program by ID

Responds with a specific Program by its ID
- Rules of Access
  - User is same school as program
- Filters
  - ?with_departments

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/programs/{program}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Library Studies",
    "department_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/programs/{program}`

`HEAD api/v1/programs/{program}`


<!-- END_70e8e8bfe9ff9bd02e12e16ceb9ff46f -->

<!-- START_1ac2f49eac1e0b7f7ab1c8b332e6e592 -->
## Update Program

Modify information about an existing Program by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to
 - User is Dean of Program's faculty
 - User is HOD of Program's department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/programs/{program}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/programs/{program}`

`PATCH api/v1/programs/{program}`


<!-- END_1ac2f49eac1e0b7f7ab1c8b332e6e592 -->

<!-- START_48a7a10d5dfbb08d1bb18b07b6a5215e -->
## Delete Program

Removes a Program from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to
 - User is Dean of Program's faculty
 - User is HOD of Program's department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/programs/{program}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/programs/{program}`


<!-- END_48a7a10d5dfbb08d1bb18b07b6a5215e -->

<!-- START_49054bca36adb6214fb283771796d5ea -->
## Get Levels

Responds with a list of Levels
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/levels" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/levels",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "100L",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "name": "200L",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "name": "300L",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "name": "400L",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/levels?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/levels?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/schools\/1\/levels",
    "per_page": 15,
    "prev_page_url": null,
    "to": 4,
    "total": 4
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/levels`

`HEAD api/v1/schools/{school_id}/levels`


<!-- END_49054bca36adb6214fb283771796d5ea -->

<!-- START_586b3b49dd9417c08f8a849d2ddfc7b4 -->
## Create Level

Supply Level information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Level belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/schools/{school_id}/levels" \
-H "Accept: application/json" \
    -d "name"="ut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/levels",
    "method": "POST",
    "data": {
        "name": "ut"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/schools/{school_id}/levels`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 

<!-- END_586b3b49dd9417c08f8a849d2ddfc7b4 -->

<!-- START_1c5c3bac197d1a82a7a4ce68ce787f1c -->
## Get Level by ID

Responds with a specific Level by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/levels/{level}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Yaba College of Technology",
    "short_name": "YABATECH",
    "owner_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/levels/{level}`

`HEAD api/v1/schools/{school_id}/levels/{level}`


<!-- END_1c5c3bac197d1a82a7a4ce68ce787f1c -->

<!-- START_f63d177c01ad1e9f71550f700ceb970d -->
## Update Level

Modify information about an existing Level by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Level belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/levels/{level}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/schools/{school_id}/levels/{level}`

`PATCH api/v1/schools/{school_id}/levels/{level}`


<!-- END_f63d177c01ad1e9f71550f700ceb970d -->

<!-- START_20fb6513c4cce74d9abd928d705e4d41 -->
## Delete Level

Removes a Level from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Level belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/levels/{level}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/schools/{school_id}/levels/{level}`


<!-- END_20fb6513c4cce74d9abd928d705e4d41 -->

<!-- START_46cdc2c8930281448a429f9f69cd2d23 -->
## Get Students

Responds with a list of Students
- Rules of Access
  - User is same school as Student
- Filters
  - ?program={id}
  - ?matric={no}
  - ?with_user
  - ?with_program

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/students" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/students",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 3,
            "program_id": 1,
            "matric_no": "UNI760",
            "is_active": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "user_id": 4,
            "program_id": 1,
            "matric_no": "UNI440",
            "is_active": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "user_id": 5,
            "program_id": 1,
            "matric_no": "UNI554",
            "is_active": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/students?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/students?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/students",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/v1/students`

`HEAD api/v1/students`


<!-- END_46cdc2c8930281448a429f9f69cd2d23 -->

<!-- START_30323be2228388586968760b6f0f4fb0 -->
## Create Student

Supply Student information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Student belongs to or
 - User is HOD in Student's department or
 - User is Dean of Student's Faculty

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/students" \
-H "Accept: application/json" \
    -d "user_id"="2372" \
    -d "program_id"="2372" \
    -d "matric_no"="aliquid" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/students",
    "method": "POST",
    "data": {
        "user_id": 2372,
        "program_id": 2372,
        "matric_no": "aliquid"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/students`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | numeric |  required  | Valid user id
    program_id | numeric |  required  | Valid program id
    matric_no | string |  required  | 

<!-- END_30323be2228388586968760b6f0f4fb0 -->

<!-- START_8db1243567bc1c57d44db16a2007217c -->
## Get Student by ID

Responds with a specific Student by its ID
- Rules of Access
  - User is same school as Student
- Filters
  - ?program={id}
  - ?matric={no}
  - ?with_user
  - ?with_program

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/students/{student}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "user_id": 3,
    "program_id": 1,
    "matric_no": "UNI760",
    "is_active": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/students/{student}`

`HEAD api/v1/students/{student}`


<!-- END_8db1243567bc1c57d44db16a2007217c -->

<!-- START_2b73eadf8e258cca5536669ac1aa711a -->
## Update Student

Modify information about an existing Student by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Student belongs to or
 - User is HOD in Student's department or
 - User is Dean of Student's Faculty

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/students/{student}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/students/{student}`

`PATCH api/v1/students/{student}`


<!-- END_2b73eadf8e258cca5536669ac1aa711a -->

<!-- START_d83746e252acb8597f31d4e987424c82 -->
## Delete Student

Removes a Student from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Student belongs to or
 - User is HOD in Student's department or
 - User is Dean of Student's Faculty

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/students/{student}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/students/{student}`


<!-- END_d83746e252acb8597f31d4e987424c82 -->

<!-- START_80b78bb5213d82cf8fedc59eec885310 -->
## Get Courses

Responds with a list of Courses
- Rules of Access
  - User is in the same school
- Filters
  - ?with_dependencies
  - ?with_staff
  - ?with_department
  - ?with_semester_type
  - ?with_level
  - ?with_school
  - ?with_faculty

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "department_id": 1,
            "semester_type_id": 1,
            "level_id": 1,
            "code": "PHP148",
            "title": "Physical Sciences",
            "credit": 4,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "department_id": 1,
            "semester_type_id": 1,
            "level_id": 2,
            "code": "LSL161",
            "title": "Oscillatory Motion",
            "credit": 3,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "department_id": 1,
            "semester_type_id": 1,
            "level_id": 3,
            "code": "GIP195",
            "title": "Signal Analysis",
            "credit": 3,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "department_id": 1,
            "semester_type_id": 1,
            "level_id": 4,
            "code": "SBD172",
            "title": "Oscillatory Motion",
            "credit": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "department_id": 1,
            "semester_type_id": 2,
            "level_id": 1,
            "code": "KYD114",
            "title": "Kinematics",
            "credit": 2,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "department_id": 1,
            "semester_type_id": 2,
            "level_id": 2,
            "code": "RSD198",
            "title": "Algorithms and Data Structures",
            "credit": 4,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 7,
            "department_id": 1,
            "semester_type_id": 2,
            "level_id": 3,
            "code": "LRD122",
            "title": "Signal Analysis",
            "credit": 5,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 8,
            "department_id": 1,
            "semester_type_id": 2,
            "level_id": 4,
            "code": "AZN115",
            "title": "Basic Algebra",
            "credit": 6,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/courses?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/courses?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/courses",
    "per_page": 15,
    "prev_page_url": null,
    "to": 8,
    "total": 8
}
```

### HTTP Request
`GET api/v1/courses`

`HEAD api/v1/courses`


<!-- END_80b78bb5213d82cf8fedc59eec885310 -->

<!-- START_15245ea1278895ac4c88a2967d66b62d -->
## Create Course

Supply Course information to create a new one
- Rules of Access
 - User can view course's department, level, semester_type and
 - User is an administrator or
 - User owns school the Course belongs to or
 - User is Dean of Faculty the Course belongs to or
 - User is HOD of Department the Course belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/courses" \
-H "Accept: application/json" \
    -d "department_id"="6654700" \
    -d "semester_type_id"="6654700" \
    -d "level_id"="6654700" \
    -d "code"="omnis" \
    -d "title"="omnis" \
    -d "credit"="6654700" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/courses",
    "method": "POST",
    "data": {
        "department_id": 6654700,
        "semester_type_id": 6654700,
        "level_id": 6654700,
        "code": "omnis",
        "title": "omnis",
        "credit": 6654700
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/courses`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    department_id | numeric |  required  | Valid department id
    semester_type_id | numeric |  required  | Valid semester_type id
    level_id | numeric |  required  | Valid level id
    code | string |  required  | 
    title | string |  required  | 
    credit | numeric |  required  | 

<!-- END_15245ea1278895ac4c88a2967d66b62d -->

<!-- START_3e9bac20f710ad63b29e6258d84d2035 -->
## Get Course by ID

Responds with a specific course by its ID
- Rules of Access
  - User is in the same school
- Filters
  - ?with_dependencies
  - ?with_staff
  - ?with_department
  - ?with_semester_type
  - ?with_level
  - ?with_school
  - ?with_faculty

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/courses/{course}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "department_id": 1,
    "semester_type_id": 1,
    "level_id": 1,
    "code": "PHP148",
    "title": "Physical Sciences",
    "credit": 4,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/courses/{course}`

`HEAD api/v1/courses/{course}`


<!-- END_3e9bac20f710ad63b29e6258d84d2035 -->

<!-- START_1a067bbc74e95f961ad6bc806b898b73 -->
## Update Course

Modify information about an existing Course by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/courses/{course}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/courses/{course}`

`PATCH api/v1/courses/{course}`


<!-- END_1a067bbc74e95f961ad6bc806b898b73 -->

<!-- START_04c095825d47b1ac994d43c4d7b5da6b -->
## Delete Course

Removes a Course from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course belongs to or
 - User is Dean of Faculty the Course belongs to or
 - User is HOD of Department the Course belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/courses/{course}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/courses/{course}`


<!-- END_04c095825d47b1ac994d43c4d7b5da6b -->

<!-- START_12455e86ce1c4f05b10f58b8220daac8 -->
## Get Semester Types

Responds with a list of Semester Types

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/semester-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/semester-types",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "1st Semester",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "name": "2nd Semester",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/semester-types?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/semester-types?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/schools\/1\/semester-types",
    "per_page": 15,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/semester-types`

`HEAD api/v1/schools/{school_id}/semester-types`


<!-- END_12455e86ce1c4f05b10f58b8220daac8 -->

<!-- START_f08dbfafe77aefb01ba34f7969a8e290 -->
## Create Semester Type

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/schools/{school_id}/semester-types" \
-H "Accept: application/json" \
    -d "name"="est" \
    -d "school_id"="est" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/semester-types",
    "method": "POST",
    "data": {
        "name": "est",
        "school_id": "est"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/schools/{school_id}/semester-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    school_id | string |  optional  | 

<!-- END_f08dbfafe77aefb01ba34f7969a8e290 -->

<!-- START_8e0d6ee5b77e919f4b3b38c24350323c -->
## Get Semester Type by ID

Responds with a specific Semester Type by its ID

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/semester-types/{semester_type}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Yaba College of Technology",
    "short_name": "YABATECH",
    "owner_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/semester-types/{semester_type}`

`HEAD api/v1/schools/{school_id}/semester-types/{semester_type}`


<!-- END_8e0d6ee5b77e919f4b3b38c24350323c -->

<!-- START_851f0dd3ec3aba5a448fb78a0521bc8a -->
## Update Semester Type

Modify information about an existing Semester Type by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester Type belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/semester-types/{semester_type}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/schools/{school_id}/semester-types/{semester_type}`

`PATCH api/v1/schools/{school_id}/semester-types/{semester_type}`


<!-- END_851f0dd3ec3aba5a448fb78a0521bc8a -->

<!-- START_3b1a0d8fe045092745679aec98aea919 -->
## Delete Semester Type

Removes a Semester Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester Type belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/semester-types/{semester_type}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/schools/{school_id}/semester-types/{semester_type}`


<!-- END_3b1a0d8fe045092745679aec98aea919 -->

<!-- START_3c70128ab6ee8f8245c23836cc1ded17 -->
## Get Staff

Responds with a list of Staff
- Rules of Access
  - User is same school as Staff

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/staff" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 2,
            "school_id": 1,
            "department_id": null,
            "title": "Prof.",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/staff?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/staff?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/staff",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/staff`

`HEAD api/v1/staff`


<!-- END_3c70128ab6ee8f8245c23836cc1ded17 -->

<!-- START_424ea90380caa2c7822483312a352457 -->
## Create Staff

Supply Staff information to create a new one
- Rules of Access
 - User can update Department staff is to be in or
 - User can update School staff is to be in or
 - User can update the staff user's info

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/staff" \
-H "Accept: application/json" \
    -d "school_id"="2045" \
    -d "department_id"="2045" \
    -d "user_id"="2045" \
    -d "title"="reprehenderit" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff",
    "method": "POST",
    "data": {
        "school_id": 2045,
        "department_id": 2045,
        "user_id": 2045,
        "title": "reprehenderit"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/staff`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    school_id | numeric |  required  | Valid school id
    department_id | numeric |  optional  | Valid department id
    user_id | numeric |  required  | Valid user id
    title | string |  required  | 

<!-- END_424ea90380caa2c7822483312a352457 -->

<!-- START_fb619000305e26f3994d93cfcce7a7c7 -->
## Get Staff by ID

Responds with a specific Staff by its ID
- Rules of Access
  - User is same school as Staff

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff/{staff}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "user_id": 2,
    "school_id": 1,
    "department_id": null,
    "title": "Prof.",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/staff/{staff}`

`HEAD api/v1/staff/{staff}`


<!-- END_fb619000305e26f3994d93cfcce7a7c7 -->

<!-- START_df6bbf516d189177a023deac27de7806 -->
## Update Staff

Modify information about an existing Staff by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Staff belongs to or
 - User is HOD in staff's department or
 - User is Dean of Staff's Faculty

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff/{staff}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/staff/{staff}`

`PATCH api/v1/staff/{staff}`


<!-- END_df6bbf516d189177a023deac27de7806 -->

<!-- START_9e519def4e473405da624d2bcf7cb015 -->
## Delete Staff

Removes a Staff from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Staff belongs to or
 - User is HOD in staff's department or
 - User is Dean of Staff's Faculty

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff/{staff}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/staff/{staff}`


<!-- END_9e519def4e473405da624d2bcf7cb015 -->

<!-- START_b4e2711333d052144729444a895a3228 -->
## Get Sessions

Responds with a list of Sessions
- Rules of Access
  - User is same school as Session

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/sessions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/sessions",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "school_id": 1,
            "name": "2018\/2019",
            "start_date": "2018-08-01 00:00:00",
            "end_date": "2019-08-01 00:00:00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "school_id": 1,
            "name": "2019\/2020",
            "start_date": "2019-08-01 00:00:00",
            "end_date": "2020-07-31 00:00:00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/sessions?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/sessions?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/sessions",
    "per_page": 15,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```

### HTTP Request
`GET api/v1/sessions`

`HEAD api/v1/sessions`


<!-- END_b4e2711333d052144729444a895a3228 -->

<!-- START_52e91afc61c421928a194ddf84ad0634 -->
## Create Session

Supply Session information to create a new one
- Rules of Access
 - User can update Session's school

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/sessions" \
-H "Accept: application/json" \
    -d "school_id"="9" \
    -d "name"="ipsa" \
    -d "start_date"="1972-01-01" \
    -d "end_date"="1972-01-01" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/sessions",
    "method": "POST",
    "data": {
        "school_id": 9,
        "name": "ipsa",
        "start_date": "1972-01-01",
        "end_date": "1972-01-01"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/sessions`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    school_id | numeric |  required  | Valid school id
    name | string |  required  | 
    start_date | date |  required  | 
    end_date | date |  required  | 

<!-- END_52e91afc61c421928a194ddf84ad0634 -->

<!-- START_2198f1b08e7532135fddc6bfef6b1a3c -->
## Get Session by ID

Responds with a specific Session by its ID
- Rules of Access
  - User is same school as Session

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/sessions/{session}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "school_id": 1,
    "name": "2018\/2019",
    "start_date": "2018-08-01 00:00:00",
    "end_date": "2019-08-01 00:00:00",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/sessions/{session}`

`HEAD api/v1/sessions/{session}`


<!-- END_2198f1b08e7532135fddc6bfef6b1a3c -->

<!-- START_4fe7a3a3763311b5d91e63803efaeac6 -->
## Update Session

Modify information about an existing Session by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Session belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/sessions/{session}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/sessions/{session}`

`PATCH api/v1/sessions/{session}`


<!-- END_4fe7a3a3763311b5d91e63803efaeac6 -->

<!-- START_f2636ab51db3deb4b56052c1a51cf987 -->
## Delete Session

Removes a Session from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Session belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/sessions/{session}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/sessions/{session}`


<!-- END_f2636ab51db3deb4b56052c1a51cf987 -->

<!-- START_cd7efec5827a031cf8575f41a0ebe2a4 -->
## Get Semesters

Responds with a list Semesters
- Rules of Access
  - User is same school as Semester
- Filters
  - ?with_session
  - ?with_type

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/semesters" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/semesters",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "semester_type_id": 1,
            "session_id": 1,
            "start_date": "2018-08-01 00:00:00",
            "end_date": "2019-01-28 00:00:00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "semester_type_id": 2,
            "session_id": 1,
            "start_date": "2019-02-02 00:00:00",
            "end_date": "2019-08-01 00:00:00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/semesters?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/semesters?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/semesters",
    "per_page": 15,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```

### HTTP Request
`GET api/v1/semesters`

`HEAD api/v1/semesters`


<!-- END_cd7efec5827a031cf8575f41a0ebe2a4 -->

<!-- START_a8f20c98b3664db1030dfef0fc6aae06 -->
## Create Semester

Supply Semester information to create a new one
- Rules of Access
 - User can update semester type

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/semesters" \
-H "Accept: application/json" \
    -d "session_id"="851794023" \
    -d "semester_type_id"="851794023" \
    -d "start_date"="2018-03-20" \
    -d "end_date"="2018-03-20" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/semesters",
    "method": "POST",
    "data": {
        "session_id": 851794023,
        "semester_type_id": 851794023,
        "start_date": "2018-03-20",
        "end_date": "2018-03-20"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/semesters`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    session_id | numeric |  optional  | Valid session id
    semester_type_id | numeric |  required  | Valid semester_type id
    start_date | date |  required  | 
    end_date | date |  required  | 

<!-- END_a8f20c98b3664db1030dfef0fc6aae06 -->

<!-- START_abf6d34542e2b4f807bd4c9a0e53829c -->
## Get Semester by ID

Responds with a specific Semester by its ID
- Rules of Access
  - User is same school as Semester
- Filters
  - ?with_session
  - ?with_type

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/semesters/{semester}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/semesters/{semester}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "semester_type_id": 1,
    "session_id": 1,
    "start_date": "2018-08-01 00:00:00",
    "end_date": "2019-01-28 00:00:00",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/semesters/{semester}`

`HEAD api/v1/semesters/{semester}`


<!-- END_abf6d34542e2b4f807bd4c9a0e53829c -->

<!-- START_c4dc92558d2a2a3c9886bca8ed9fe6b2 -->
## Update Semester

Modify information about an existing Semester by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/semesters/{semester}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/semesters/{semester}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/semesters/{semester}`

`PATCH api/v1/semesters/{semester}`


<!-- END_c4dc92558d2a2a3c9886bca8ed9fe6b2 -->

<!-- START_c829e21fa10bf93eecbd4daa2d4d0404 -->
## Delete Semester

Removes a Semester from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/semesters/{semester}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/semesters/{semester}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/semesters/{semester}`


<!-- END_c829e21fa10bf93eecbd4daa2d4d0404 -->

<!-- START_c504034cfdc5d503c6bf79f723a71977 -->
## Get Chargeable Services

Responds with a list of chargeable services
- Rules of Access
  - User is in the same school
- Filters
  - ?with_schools
  - ?with_chargeables
  - ?school={id}

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/chargeable-services" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeable-services",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "type": "App\\Models\\Semester",
            "name": "1st Semester Fees",
            "description": null,
            "amount": "500.00",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "type": "App\\Models\\Semester",
            "name": "2nd Semester Fees",
            "description": null,
            "amount": "500.00",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "type": "App\\Models\\Session",
            "name": "2018\/2019 Fees",
            "description": null,
            "amount": "1000.00",
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/chargeable-services?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/chargeable-services?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/chargeable-services",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/v1/chargeable-services`

`HEAD api/v1/chargeable-services`


<!-- END_c504034cfdc5d503c6bf79f723a71977 -->

<!-- START_bae6f879c238d1fc732ac5c2a844ec4c -->
## Create Chargeable Service

Supply chargeable service information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable Service belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/chargeable-services" \
-H "Accept: application/json" \
    -d "school_id"="4352" \
    -d "type"="App\Models\Semester" \
    -d "name"="dignissimos" \
    -d "description"="dignissimos" \
    -d "amount"="948870890" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeable-services",
    "method": "POST",
    "data": {
        "school_id": 4352,
        "type": "App\\Models\\Semester",
        "name": "dignissimos",
        "description": "dignissimos",
        "amount": 948870890
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/chargeable-services`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    school_id | numeric |  required  | Valid school id
    type | string |  required  | `App\Models\Semester` or `App\Models\Session`
    name | string |  required  | 
    description | string |  optional  | 
    amount | numeric |  required  | Minimum: `0`

<!-- END_bae6f879c238d1fc732ac5c2a844ec4c -->

<!-- START_e511d978ef368cad7f5925f3bc05e2d3 -->
## Get Chargeable Service by ID

Responds with a specific chargeable service by its ID
- Rules of Access
  - User is in the same school
- Filters
  - ?with_schools
  - ?with_chargeables
  - ?school={id}

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/chargeable-services/{chargeable_service}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeable-services/{chargeable_service}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "type": "App\\Models\\Semester",
    "name": "1st Semester Fees",
    "description": null,
    "amount": "500.00",
    "school_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/chargeable-services/{chargeable_service}`

`HEAD api/v1/chargeable-services/{chargeable_service}`


<!-- END_e511d978ef368cad7f5925f3bc05e2d3 -->

<!-- START_d8693e1903ec99d63209fc97616f7822 -->
## Update Chargeable Service

Modify information about an existing Chargeable Service by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable Service belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/chargeable-services/{chargeable_service}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeable-services/{chargeable_service}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/chargeable-services/{chargeable_service}`

`PATCH api/v1/chargeable-services/{chargeable_service}`


<!-- END_d8693e1903ec99d63209fc97616f7822 -->

<!-- START_b2456880f4173a3d42c026eadecdc90a -->
## Delete Chargeable Service

Removes a Chargeable Service from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable Service belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/chargeable-services/{chargeable_service}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeable-services/{chargeable_service}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/chargeable-services/{chargeable_service}`


<!-- END_b2456880f4173a3d42c026eadecdc90a -->

<!-- START_bf245505e23dfbbe661326e8dbef8f91 -->
## Gets Chargeables

Responds with a list of Chargeables
- Rules of Access
  - User is in same school as the Chargeable
- Filters
 - ?with_service (includes the chargeable service)
 - ?with_owner (includes the chargeable's owner)
 - ?with_school (includes the chargeable's school)
 - ?service={id} (filters by the chargeable service id)
 - ?owner={id} (filters by the owner id)
 - ?min_amount={amount} (filters by minimum amount)
 - ?max_amount={amount} (filters by maximum amount)

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/chargeables" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeables",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "chargeable_service_id": 1,
            "owner_id": 1,
            "amount": "500.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "chargeable_service_id": 2,
            "owner_id": 2,
            "amount": "500.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "chargeable_service_id": 3,
            "owner_id": 1,
            "amount": "1000.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/chargeables?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/chargeables?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/chargeables",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/v1/chargeables`

`HEAD api/v1/chargeables`


<!-- END_bf245505e23dfbbe661326e8dbef8f91 -->

<!-- START_a73d24dd49969540840ddf41de3efc15 -->
## Create Chargeable

Supply chargeable information to create a new one
- Rules of Access
 - User can view Chargeable Service and
 - User can update the owner of the Chargeable (See Chargeable Model)

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/chargeables" \
-H "Accept: application/json" \
    -d "chargeable_service_id"="2" \
    -d "owner_id"="2" \
    -d "amount"="2" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeables",
    "method": "POST",
    "data": {
        "chargeable_service_id": 2,
        "owner_id": 2,
        "amount": 2
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/chargeables`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    chargeable_service_id | numeric |  required  | Valid chargeable_service id
    owner_id | numeric |  required  | 
    amount | numeric |  optional  | 

<!-- END_a73d24dd49969540840ddf41de3efc15 -->

<!-- START_cd1cb6c785046b3d60d7457d176bcdf4 -->
## Get Chargeable by ID

Responds with a specific Chargeable by its ID
- Rules of Access
  - User is in same school as the Chargeable
- Filters
 - ?with_service (includes the chargeable service)
 - ?with_owner (includes the chargeable's owner)
 - ?with_school (includes the chargeable's school)
 - ?service={id} (filters by the chargeable service id)
 - ?owner={id} (filters by the owner id)
 - ?min_amount={amount} (filters by minimum amount)
 - ?max_amount={amount} (filters by maximum amount)

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/chargeables/{chargeable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeables/{chargeable}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "chargeable_service_id": 1,
    "owner_id": 1,
    "amount": "500.00",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/chargeables/{chargeable}`

`HEAD api/v1/chargeables/{chargeable}`


<!-- END_cd1cb6c785046b3d60d7457d176bcdf4 -->

<!-- START_1e0e4d60e9dd43475bbc0cb6a52b99e3 -->
## Update Chargeable

Modify information about an existing chargeable by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/chargeables/{chargeable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeables/{chargeable}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/chargeables/{chargeable}`

`PATCH api/v1/chargeables/{chargeable}`


<!-- END_1e0e4d60e9dd43475bbc0cb6a52b99e3 -->

<!-- START_c0eaf9c0c8270d516defc031afd05455 -->
## Delete Chargeable

Removes a Chargeable from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/chargeables/{chargeable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/chargeables/{chargeable}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/chargeables/{chargeable}`


<!-- END_c0eaf9c0c8270d516defc031afd05455 -->

<!-- START_828340f04adade83bc661bbbdcd22025 -->
## Get Program Credits

Responds with a list of Program Credits
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/program-credits" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/program-credits",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "program_id": 1,
            "semester_id": 1,
            "level_id": 1,
            "credit": 19,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "program_id": 1,
            "semester_id": 1,
            "level_id": 2,
            "credit": 23,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "program_id": 1,
            "semester_id": 1,
            "level_id": 3,
            "credit": 20,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/program-credits?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/program-credits?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/program-credits",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/v1/program-credits`

`HEAD api/v1/program-credits`


<!-- END_828340f04adade83bc661bbbdcd22025 -->

<!-- START_f2b14a11d09c2951bfcf839f39e514f1 -->
## Create Program Credit

Supply Program Credit information to create a new one
- Rules of Access
 - User can update program
 = User can update semester
 - User can update level

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/program-credits" \
-H "Accept: application/json" \
    -d "program_id"="332472" \
    -d "semester_id"="332472" \
    -d "level_id"="332472" \
    -d "credit"="332472" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/program-credits",
    "method": "POST",
    "data": {
        "program_id": 332472,
        "semester_id": 332472,
        "level_id": 332472,
        "credit": 332472
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/program-credits`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    program_id | numeric |  required  | Valid program id
    semester_id | numeric |  required  | Valid semester id
    level_id | numeric |  required  | Valid level id
    credit | numeric |  required  | 

<!-- END_f2b14a11d09c2951bfcf839f39e514f1 -->

<!-- START_dd35bfd9e70c3174d731efd13dc53018 -->
## Get Program Credit by ID

Responds with a specific Program Credit by its ID
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/program-credits/{program_credit}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/program-credits/{program_credit}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "program_id": 1,
    "semester_id": 1,
    "level_id": 1,
    "credit": 19,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/program-credits/{program_credit}`

`HEAD api/v1/program-credits/{program_credit}`


<!-- END_dd35bfd9e70c3174d731efd13dc53018 -->

<!-- START_fb62a45646d90df0a8d0c8c976b67336 -->
## Update Program Credit

Modify information about an existing Program Credit by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program Credit belongs to
 - User is Dean of Program Credit's faculty
 - User is HOD of Program Credit's department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/program-credits/{program_credit}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/program-credits/{program_credit}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/program-credits/{program_credit}`

`PATCH api/v1/program-credits/{program_credit}`


<!-- END_fb62a45646d90df0a8d0c8c976b67336 -->

<!-- START_5de91b2c87336df943c55e20723c2b28 -->
## Delete Program Credit

Removes a Program Credut from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program Credit belongs to
 - User is Dean of Program Credit's faculty
 - User is HOD of Program Credit's department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/program-credits/{program_credit}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/program-credits/{program_credit}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/program-credits/{program_credit}`


<!-- END_5de91b2c87336df943c55e20723c2b28 -->

<!-- START_5c21dc750788f6b12d4f473da651be30 -->
## Get Payables

Responds with a list of Payables
- Rules of Access
  - User owns Payable or
  - User can update school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/payables" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/payables",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "chargeable_id": 1,
            "paid_at": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36",
            "deleted_at": null
        },
        {
            "id": 2,
            "user_id": 1,
            "chargeable_id": 2,
            "paid_at": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36",
            "deleted_at": null
        },
        {
            "id": 3,
            "user_id": 1,
            "chargeable_id": 3,
            "paid_at": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36",
            "deleted_at": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/payables?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/payables?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/payables",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/v1/payables`

`HEAD api/v1/payables`


<!-- END_5c21dc750788f6b12d4f473da651be30 -->

<!-- START_ffbb16f377703b6a6e2b1b6cf9fb07ce -->
## Create Payable

Supply Payable information to create a new one
- Rules of Access
 - User can view school and
 - User can update the user that owns the payable

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/payables" \
-H "Accept: application/json" \
    -d "chargeable_id"="7988" \
    -d "user_id"="7988" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/payables",
    "method": "POST",
    "data": {
        "chargeable_id": 7988,
        "user_id": 7988
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/payables`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    chargeable_id | numeric |  required  | Valid chargeable id
    user_id | numeric |  optional  | Valid user id

<!-- END_ffbb16f377703b6a6e2b1b6cf9fb07ce -->

<!-- START_32d2c88fefd17654dce7c673aae96e01 -->
## Get Payable by ID

Responds with a specific Payable by its ID
- Rules of Access
  - User owns Payable or
  - User can update school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/payables/{payable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/payables/{payable}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "user_id": 1,
    "chargeable_id": 1,
    "paid_at": null,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36",
    "deleted_at": null
}
```

### HTTP Request
`GET api/v1/payables/{payable}`

`HEAD api/v1/payables/{payable}`


<!-- END_32d2c88fefd17654dce7c673aae96e01 -->

<!-- START_0611acec8d6abcef19d1b3ce1afc01a6 -->
## Update Payable

Modify information about an existing Payable by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Payable belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/payables/{payable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/payables/{payable}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/payables/{payable}`

`PATCH api/v1/payables/{payable}`


<!-- END_0611acec8d6abcef19d1b3ce1afc01a6 -->

<!-- START_de499844e028eefa4e87c3cf5f14876f -->
## Delete Payable

Removes a Payable from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Payable belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/payables/{payable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/payables/{payable}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/payables/{payable}`


<!-- END_de499844e028eefa4e87c3cf5f14876f -->

<!-- START_9c7d842ba86c7d6334d10ab5b88cffee -->
## Get Course Dependencies

Responds with a list of Course Dependencies
- Rules of Access
  - User is in the same school
- Filters
  - ?with_course
  - ?with_dependency
  - ?course={id} filter by course id
  - ?dependency={id} filter by dependency id (also a course)

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/course-dependencies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/course-dependencies",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "course_id": 5,
            "dependency_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "course_id": 5,
            "dependency_id": 2,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "course_id": 5,
            "dependency_id": 3,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "course_id": 5,
            "dependency_id": 4,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "course_id": 6,
            "dependency_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "course_id": 6,
            "dependency_id": 2,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 7,
            "course_id": 6,
            "dependency_id": 3,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 8,
            "course_id": 6,
            "dependency_id": 4,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 9,
            "course_id": 7,
            "dependency_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 10,
            "course_id": 7,
            "dependency_id": 2,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 11,
            "course_id": 7,
            "dependency_id": 3,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 12,
            "course_id": 7,
            "dependency_id": 4,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 13,
            "course_id": 8,
            "dependency_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 14,
            "course_id": 8,
            "dependency_id": 2,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 15,
            "course_id": 8,
            "dependency_id": 3,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/course-dependencies?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "http:\/\/localhost\/api\/v1\/course-dependencies?page=2",
    "next_page_url": "http:\/\/localhost\/api\/v1\/course-dependencies?page=2",
    "path": "http:\/\/localhost\/api\/v1\/course-dependencies",
    "per_page": 15,
    "prev_page_url": null,
    "to": 15,
    "total": 16
}
```

### HTTP Request
`GET api/v1/course-dependencies`

`HEAD api/v1/course-dependencies`


<!-- END_9c7d842ba86c7d6334d10ab5b88cffee -->

<!-- START_b645443768f72653f0d93a1bd7bf1c13 -->
## Create Course Dependency

Supply Course information to create a new one
- Rules of Access
 - User can update course and
 - User can update dependency

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/course-dependencies" \
-H "Accept: application/json" \
    -d "course_id"="79370" \
    -d "dependency_id"="79370" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/course-dependencies",
    "method": "POST",
    "data": {
        "course_id": 79370,
        "dependency_id": 79370
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/course-dependencies`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    course_id | numeric |  required  | Valid course id Must have a different value than parameter: `dependency_id`
    dependency_id | numeric |  required  | Valid course id Must have a different value than parameter: `course_id`

<!-- END_b645443768f72653f0d93a1bd7bf1c13 -->

<!-- START_7f8898eb27f41264c5bcf6f999bcc8cd -->
## Get Course Dependency by ID

Responds with a specific Course Dependency by its ID
- Rules of Access
  - User is in the same school
- Filters
  - ?with_course
  - ?with_dependency

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/course-dependencies/{course_dependency}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/course-dependencies/{course_dependency}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "course_id": 5,
    "dependency_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/course-dependencies/{course_dependency}`

`HEAD api/v1/course-dependencies/{course_dependency}`


<!-- END_7f8898eb27f41264c5bcf6f999bcc8cd -->

<!-- START_2bab42ae56798fd8f7c63bcc4f3f52c0 -->
## Update Course Dependency

Modifies information about an existing Course Dependency
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course and Dependency belongs to or
 - User is Dean of Faculty the Course and Dependency belongs to or
 - User is HOD of Department the Course and Dependency belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/course-dependencies/{course_dependency}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/course-dependencies/{course_dependency}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/course-dependencies/{course_dependency}`

`PATCH api/v1/course-dependencies/{course_dependency}`


<!-- END_2bab42ae56798fd8f7c63bcc4f3f52c0 -->

<!-- START_fc6cb69d28c594af1ded78d159d9819f -->
## Delete Course Dependency

Removes a Course Dependency from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course and Dependency belongs to or
 - User is Dean of Faculty the Course and Dependency belongs to or
 - User is HOD of Department the Course and Dependency belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/course-dependencies/{course_dependency}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/course-dependencies/{course_dependency}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/course-dependencies/{course_dependency}`


<!-- END_fc6cb69d28c594af1ded78d159d9819f -->

<!-- START_b8ee524902fa1c5c5c72bb85291aa6fd -->
## Get Staff-Teach-Course List

Responds with a list of Staff-Teach-Course info
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/staff-courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff-courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "staff_id": 1,
            "course_id": 1,
            "semester_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/staff-courses?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/staff-courses?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/staff-courses",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/staff-courses`

`HEAD api/v1/staff-courses`


<!-- END_b8ee524902fa1c5c5c72bb85291aa6fd -->

<!-- START_40adf2fbafd3ff64672d5b17fdfcae58 -->
## Create Staff-Teach-Course

Supply Staff-Teach-Course information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is a SCHOOL_OWNER or DEAN of HOD in staff-teach-course's school and
 - User can update course

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/staff-courses" \
-H "Accept: application/json" \
    -d "staff_id"="3" \
    -d "course_id"="3" \
    -d "semester_id"="3" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff-courses",
    "method": "POST",
    "data": {
        "staff_id": 3,
        "course_id": 3,
        "semester_id": 3
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/staff-courses`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    staff_id | numeric |  required  | Valid staff id
    course_id | numeric |  required  | Valid course id
    semester_id | numeric |  required  | Valid semester id

<!-- END_40adf2fbafd3ff64672d5b17fdfcae58 -->

<!-- START_986ea9794a2928de6eb4d74c1adeed67 -->
## Get Staff-Teach-Course Info by ID

Responds with a specific Staff-Teach-Course by its ID
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/staff-courses/{staff_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff-courses/{staff_course}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "staff_id": 1,
    "course_id": 1,
    "semester_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/staff-courses/{staff_course}`

`HEAD api/v1/staff-courses/{staff_course}`


<!-- END_986ea9794a2928de6eb4d74c1adeed67 -->

<!-- START_4783f6d68793139593ae29470119fbdb -->
## Update Staff-Teach-Course

Modify information about an existing Staff-Teach-Course by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/staff-courses/{staff_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff-courses/{staff_course}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/staff-courses/{staff_course}`

`PATCH api/v1/staff-courses/{staff_course}`


<!-- END_4783f6d68793139593ae29470119fbdb -->

<!-- START_33bff41475a69cb9c9455b860020eebf -->
## Delete Staff-Teach-Course

Removes a Staff-Teach-Course entry from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/staff-courses/{staff_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/staff-courses/{staff_course}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/staff-courses/{staff_course}`


<!-- END_33bff41475a69cb9c9455b860020eebf -->

<!-- START_de1ecc1a95409f0c84c5309ea2af6af6 -->
## Get Student-Takes-Course List

Responds with a list of Student-Takes-Course info
- Rules of Access
  - User is same school
- Filters
  - ?with_student
  - ?with_staff_courses
  - ?with_semester
  - ?with_staff
  - ?with_course
  - ?with_school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/student-courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/student-courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "student_id": 1,
            "staff_teach_course_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/student-courses?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/student-courses?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/student-courses",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/student-courses`

`HEAD api/v1/student-courses`


<!-- END_de1ecc1a95409f0c84c5309ea2af6af6 -->

<!-- START_5a2c272e7b102cb7732f6548fdae085a -->
## Create Student-Takes-Course

Supply Student-Takes-Course information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is a SCHOOL_OWNER or DEAN of HOD in school and or
 - User is student

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/student-courses" \
-H "Accept: application/json" \
    -d "student_id"="8408" \
    -d "staff_teach_course_id"="8408" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/student-courses",
    "method": "POST",
    "data": {
        "student_id": 8408,
        "staff_teach_course_id": 8408
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/student-courses`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    student_id | numeric |  required  | Valid student id
    staff_teach_course_id | numeric |  required  | Valid staff_teach_course id

<!-- END_5a2c272e7b102cb7732f6548fdae085a -->

<!-- START_f50f8705c1ff6fd50d73968f7a78f4f4 -->
## Get Student-Takes-Course by ID

Responds with a specific Student-Takes-Course by its ID
- Rules of Access
  - User is same school
- Filters
  - ?with_student
  - ?with_staff_courses
  - ?with_semester
  - ?with_staff
  - ?with_course
  - ?with_school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/student-courses/{student_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/student-courses/{student_course}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "student_id": 1,
    "staff_teach_course_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/student-courses/{student_course}`

`HEAD api/v1/student-courses/{student_course}`


<!-- END_f50f8705c1ff6fd50d73968f7a78f4f4 -->

<!-- START_7700a6a9b13aecdcfb6ccca4aae5f0ce -->
## Update Student-Takes-Course

Modify information about an existing Student-Takes-Course by ID
- Rules of Access
 - Student, Staff, Course and Semester are in the same school and
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/student-courses/{student_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/student-courses/{student_course}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/student-courses/{student_course}`

`PATCH api/v1/student-courses/{student_course}`


<!-- END_7700a6a9b13aecdcfb6ccca4aae5f0ce -->

<!-- START_f3e273e12e5e470ac689afdc584a4361 -->
## Delete Student-Takes-Course

Removes a Student-Takes-Course entry from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/student-courses/{student_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/student-courses/{student_course}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/student-courses/{student_course}`


<!-- END_f3e273e12e5e470ac689afdc584a4361 -->

<!-- START_d4160fd9e1456d0f13a1fef5eadeee4a -->
## Get Grade Types

Responds with a list of Grades in school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/grade-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/grade-types",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "A",
            "value": 5,
            "school_id": 1,
            "minimum": "70.00",
            "maximum": "100.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "name": "B",
            "value": 4,
            "school_id": 1,
            "minimum": "60.00",
            "maximum": "70.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "name": "C",
            "value": 3,
            "school_id": 1,
            "minimum": "50.00",
            "maximum": "60.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "name": "D",
            "value": 2,
            "school_id": 1,
            "minimum": "45.00",
            "maximum": "50.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "name": "E",
            "value": 1,
            "school_id": 1,
            "minimum": "40.00",
            "maximum": "45.00",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/grade-types?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/grade-types?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/schools\/1\/grade-types",
    "per_page": 15,
    "prev_page_url": null,
    "to": 5,
    "total": 5
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/grade-types`

`HEAD api/v1/schools/{school_id}/grade-types`


<!-- END_d4160fd9e1456d0f13a1fef5eadeee4a -->

<!-- START_6fc06e012d285068c3c4e8b4981a54a3 -->
## Create Grade Type

Supply Grade Type information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is the school owner

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/schools/{school_id}/grade-types" \
-H "Accept: application/json" \
    -d "name"="nulla" \
    -d "value"="85" \
    -d "minimum"="85" \
    -d "maximum"="85" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/grade-types",
    "method": "POST",
    "data": {
        "name": "nulla",
        "value": 85,
        "minimum": 85,
        "maximum": 85
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/schools/{school_id}/grade-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    value | numeric |  required  | Minimum: `0` Maximum: `100`
    minimum | numeric |  required  | Minimum: `0` Maximum: `100`
    maximum | numeric |  required  | Minimum: `0` Maximum: `100`

<!-- END_6fc06e012d285068c3c4e8b4981a54a3 -->

<!-- START_118fd4a11444871754b08b4a4f4e357b -->
## Get Grade Type by ID

Responds with a specific Grade by its ID

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/grade-types/{grade_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/grade-types/{grade_type}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Yaba College of Technology",
    "short_name": "YABATECH",
    "owner_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/grade-types/{grade_type}`

`HEAD api/v1/schools/{school_id}/grade-types/{grade_type}`


<!-- END_118fd4a11444871754b08b4a4f4e357b -->

<!-- START_2599817a8f8de7881ae34b50d59c1193 -->
## Update Grade Type

Modify information about an existing Grade Type by ID
- Rules of Access
 - User is an ADMIN or
 - User is the school owner

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/schools/{school_id}/grade-types/{grade_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/grade-types/{grade_type}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/schools/{school_id}/grade-types/{grade_type}`

`PATCH api/v1/schools/{school_id}/grade-types/{grade_type}`


<!-- END_2599817a8f8de7881ae34b50d59c1193 -->

<!-- START_832a2016a6e91878ce9f92488bd6f5f0 -->
## Delete Grade Type

Removes a Grade Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User is the school owner

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/schools/{school_id}/grade-types/{grade_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/grade-types/{grade_type}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/schools/{school_id}/grade-types/{grade_type}`


<!-- END_832a2016a6e91878ce9f92488bd6f5f0 -->

<!-- START_b45d49ef68197ae95ecca62f72cb260a -->
## Get Grades

Responds with a list of Grades
- Rules of Access
  - User can update grade student or
  - Grade belongs to current User
- Filters
  - ?with_student
  - ?with_staff
  - ?with_course
  - ?with_school
  - ?with_users
  - ?with_total

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/grades" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/grades",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "student_takes_course_id": 1,
            "score": 27,
            "description": "Test 4",
            "locked_at": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/grades?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/grades?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/grades",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/grades`

`HEAD api/v1/grades`


<!-- END_b45d49ef68197ae95ecca62f72cb260a -->

<!-- START_9b17853926069a563c6f3ca0239dc845 -->
## Create Grade

Supply Grade information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is the staff that taught the Course or
 - User is the school owner or
 - User is the Dean of the Faculty the Course belongs to
 - User is the HOD of the Department the Course belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/grades" \
-H "Accept: application/json" \
    -d "student_takes_course_id"="94746801" \
    -d "score"="94746801" \
    -d "description"="dolorem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/grades",
    "method": "POST",
    "data": {
        "student_takes_course_id": 94746801,
        "score": 94746801,
        "description": "dolorem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/grades`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    student_takes_course_id | numeric |  required  | Valid student_takes_course id
    score | numeric |  required  | 
    description | string |  required  | 

<!-- END_9b17853926069a563c6f3ca0239dc845 -->

<!-- START_744d0f515fbc626d55ed2f2816548122 -->
## Get Grade by ID

Responds with a specific Grade by its ID
- Rules of Access
  - User can update grade student or
  - Grade belongs to current User
- Filters
  - ?with_student
  - ?with_staff
  - ?with_course
  - ?with_school
  - ?with_users
  - ?with_total

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/grades/{grade}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/grades/{grade}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "student_takes_course_id": 1,
    "score": 27,
    "description": "Test 4",
    "locked_at": null,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/grades/{grade}`

`HEAD api/v1/grades/{grade}`


<!-- END_744d0f515fbc626d55ed2f2816548122 -->

<!-- START_4458e5e01d9a818d6f1c9b6c76f0d953 -->
## Update Grade

Modify information about an existing Grade by ID
- Rules of Access
 - User is an ADMIN or
 - User is the staff that taught the Course or
 - User is the school owner or
 - User is the Dean of the Faculty the Course belongs to
 - User is the HOD of the Department the Course belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/grades/{grade}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/grades/{grade}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/grades/{grade}`

`PATCH api/v1/grades/{grade}`


<!-- END_4458e5e01d9a818d6f1c9b6c76f0d953 -->

<!-- START_15a89f8c6d58d8d713cc3b4af80cd9b3 -->
## Delete Grade

Removes a Grade from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User is the staff that taught the Course or
 - User is the school owner or
 - User is the Dean of the Faculty the Course belongs to
 - User is the HOD of the Department the Course belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/grades/{grade}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/grades/{grade}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/grades/{grade}`


<!-- END_15a89f8c6d58d8d713cc3b4af80cd9b3 -->

<!-- START_95ec744b33772b36ed5047e2e752bf54 -->
## Get Image Types

Responds with a list of Image Types
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/image-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/image-types",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "school_id": 1,
            "type": "App\\User",
            "name": "Type 1",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/image-types?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/image-types?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/schools\/1\/image-types",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/image-types`

`HEAD api/v1/schools/{school_id}/image-types`


<!-- END_95ec744b33772b36ed5047e2e752bf54 -->

<!-- START_f6e43ee179ed6761ad28d1a8fa89b0a5 -->
## Create Image Type

Supply Image Type information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image Type belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/schools/{school_id}/image-types" \
-H "Accept: application/json" \
    -d "type"="ut" \
    -d "name"="ut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/image-types",
    "method": "POST",
    "data": {
        "type": "ut",
        "name": "ut"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/schools/{school_id}/image-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  required  | 
    name | string |  required  | 

<!-- END_f6e43ee179ed6761ad28d1a8fa89b0a5 -->

<!-- START_64eddade3fda44911e2a127460992520 -->
## Get Image Type by ID

Responds with a specific Image Type by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/image-types/{image_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/image-types/{image_type}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Yaba College of Technology",
    "short_name": "YABATECH",
    "owner_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/image-types/{image_type}`

`HEAD api/v1/schools/{school_id}/image-types/{image_type}`


<!-- END_64eddade3fda44911e2a127460992520 -->

<!-- START_440955136c6a733fbc7353f5d6decb3a -->
## Update Image Type

Modify information about an existing Image Type by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/schools/{school_id}/image-types/{image_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/image-types/{image_type}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/schools/{school_id}/image-types/{image_type}`

`PATCH api/v1/schools/{school_id}/image-types/{image_type}`


<!-- END_440955136c6a733fbc7353f5d6decb3a -->

<!-- START_dacab0a373498b4451fb92c29478cddd -->
## Delete Image Type

Removes a Image Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/schools/{school_id}/image-types/{image_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/image-types/{image_type}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/schools/{school_id}/image-types/{image_type}`


<!-- END_dacab0a373498b4451fb92c29478cddd -->

<!-- START_1d04295a992bc914b1677b97934e11ad -->
## Get Images

Responds with a list of Images
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/images" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/images",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "owner_id": 3,
            "image_type_id": 1,
            "location": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/images?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/images?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/images",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/images`

`HEAD api/v1/images`


<!-- END_1d04295a992bc914b1677b97934e11ad -->

<!-- START_796d8cbd139f7944a430e626c3e5acc4 -->
## Create Image

Supply Image information to create a new one
- Rules of Access
 - User can view image type and
 - User can update image owner

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/images" \
-H "Accept: application/json" \
    -d "owner_id"="21" \
    -d "image_type_id"="21" \
    -d "file"="nesciunt" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/images",
    "method": "POST",
    "data": {
        "owner_id": 21,
        "image_type_id": 21,
        "file": "nesciunt"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/images`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    owner_id | numeric |  required  | 
    image_type_id | numeric |  required  | Valid image_type id
    file | image |  required  | Must be an image (jpeg, png, bmp, gif, or svg)

<!-- END_796d8cbd139f7944a430e626c3e5acc4 -->

<!-- START_28feb2eb2dd6d526715fa6b092a38380 -->
## Get Image by ID

Responds with a specific Image by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/images/{image}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/images/{image}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "owner_id": 3,
    "image_type_id": 1,
    "location": null,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/images/{image}`

`HEAD api/v1/images/{image}`


<!-- END_28feb2eb2dd6d526715fa6b092a38380 -->

<!-- START_835d6bf8f59a2749ad968731f2798695 -->
## Update Image

Modify information about an existing Image by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/images/{image}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/images/{image}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/images/{image}`

`PATCH api/v1/images/{image}`


<!-- END_835d6bf8f59a2749ad968731f2798695 -->

<!-- START_91e97babe411ae6cf71ffe46be046980 -->
## Delete Image

Removes a Image from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/images/{image}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/images/{image}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/images/{image}`


<!-- END_91e97babe411ae6cf71ffe46be046980 -->

<!-- START_7c944fd89c1d252d20aba8764359030f -->
## Update Image

Modify information about an existing Image by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/images/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/images/{id}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/images/{id}`


<!-- END_7c944fd89c1d252d20aba8764359030f -->

<!-- START_150955de7955df0ac566df3e477f9f7b -->
## Get Intent Types

Responds with a list of Intent Types

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/intent-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intent-types",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "change-password",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/intent-types?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/intent-types?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/intent-types",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/intent-types`

`HEAD api/v1/intent-types`


<!-- END_150955de7955df0ac566df3e477f9f7b -->

<!-- START_421515d53b59d5debb5e38cad694f3ca -->
## Create Intent Type

Supply Intent Type information to create a new one
- Rules of Access
 - User is an ADMIN

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/intent-types" \
-H "Accept: application/json" \
    -d "name"="et" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intent-types",
    "method": "POST",
    "data": {
        "name": "et"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/intent-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 

<!-- END_421515d53b59d5debb5e38cad694f3ca -->

<!-- START_138e71cf17e682c2c68f7b3a7e571bad -->
## Get Intent Type by ID

Responds with a specific Intent Type by its ID

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/intent-types/{intent_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intent-types/{intent_type}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "change-password",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/intent-types/{intent_type}`

`HEAD api/v1/intent-types/{intent_type}`


<!-- END_138e71cf17e682c2c68f7b3a7e571bad -->

<!-- START_f1c74e25f71625287aeb40fb7a84ccd5 -->
## Update Intent Type

Modifies information on an existing Intent Type
- Rules of Access
 - User is an ADMIN

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/intent-types/{intent_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intent-types/{intent_type}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/intent-types/{intent_type}`

`PATCH api/v1/intent-types/{intent_type}`


<!-- END_f1c74e25f71625287aeb40fb7a84ccd5 -->

<!-- START_58192ebda2324a3b3f4530241f733266 -->
## Delete Intent Type

Removes an Intent Type from the System by ID
- Rules of Access
 - User is an ADMIN

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/intent-types/{intent_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intent-types/{intent_type}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/intent-types/{intent_type}`


<!-- END_58192ebda2324a3b3f4530241f733266 -->

<!-- START_53bcee8d8bf3a88c049d76399a9a8cbf -->
## Get Intent by ID

Responds with a list of Intents
- Rules of Access
  - User owns Intents

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/intents" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intents",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "intent_type_id": 1,
            "extras": "[]",
            "resolved_at": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/intents?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/intents?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/intents",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/intents`

`HEAD api/v1/intents`


<!-- END_53bcee8d8bf3a88c049d76399a9a8cbf -->

<!-- START_bb0317557044f43c90e71870bbf03402 -->
## Create Intent

Supply Intent information to create a new one

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/intents" \
-H "Accept: application/json" \
    -d "user_id"="4546976" \
    -d "intent_type_id"="4546976" \
    -d "intent_type"="nobis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intents",
    "method": "POST",
    "data": {
        "user_id": 4546976,
        "intent_type_id": 4546976,
        "intent_type": "nobis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/intents`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | numeric |  optional  | Valid user id
    intent_type_id | numeric |  optional  | Valid intent_type id
    intent_type | string |  optional  | Valid intent_type name

<!-- END_bb0317557044f43c90e71870bbf03402 -->

<!-- START_30fd2985b276f3e0ea21d3f67792b186 -->
## Get Intent by ID

Responds with a specific Intent by its ID
- Rules of Access
  - User owns Intent

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/intents/{intent}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intents/{intent}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "user_id": 1,
    "intent_type_id": 1,
    "extras": "[]",
    "resolved_at": null,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/intents/{intent}`

`HEAD api/v1/intents/{intent}`


<!-- END_30fd2985b276f3e0ea21d3f67792b186 -->

<!-- START_d0171497bcfd16407f39be8ad6c88b6e -->
## Update Intent (Not Supported)

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/intents/{intent}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intents/{intent}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/intents/{intent}`

`PATCH api/v1/intents/{intent}`


<!-- END_d0171497bcfd16407f39be8ad6c88b6e -->

<!-- START_37fc401684429329c105769e39adee88 -->
## Delete Intent

Removes an Intent from the System by ID
- Rules of Access
 - User owns Intent

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/intents/{intent}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/intents/{intent}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/intents/{intent}`


<!-- END_37fc401684429329c105769e39adee88 -->

<!-- START_d97fba8dbd0d0033960fdc6a25fca8d9 -->
## Get Roles

Responds with a list of Roles
- Rules of Access
  - Anyone

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/roles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/roles",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "admin",
            "display_name": "Administrator",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "name": "school-owner",
            "display_name": "School Owner",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "name": "staff",
            "display_name": "Staff",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "name": "student",
            "display_name": "Student",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "name": "hod",
            "display_name": "Head of Department",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "name": "dean",
            "display_name": "Dean of Faculty",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 7,
            "name": "prospect",
            "display_name": "Student Admission Candidate",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/roles?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/roles?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/roles",
    "per_page": 15,
    "prev_page_url": null,
    "to": 7,
    "total": 7
}
```

### HTTP Request
`GET api/v1/roles`

`HEAD api/v1/roles`


<!-- END_d97fba8dbd0d0033960fdc6a25fca8d9 -->

<!-- START_5f753b2bffb6b34b6136ddfe1be7bcce -->
## Create Role

Supply Role Information to create a new one

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/roles" \
-H "Accept: application/json" \
    -d "name"="quae" \
    -d "display_name"="quae" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/roles",
    "method": "POST",
    "data": {
        "name": "quae",
        "display_name": "quae"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/roles`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    display_name | string |  required  | 

<!-- END_5f753b2bffb6b34b6136ddfe1be7bcce -->

<!-- START_f47a034257a009b731160db044157715 -->
## Get Role by ID

Responds with a specific Role by its ID
- Rules of Access
  - Anyone can view

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/roles/{role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/roles/{role}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "admin",
    "display_name": "Administrator",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/roles/{role}`

`HEAD api/v1/roles/{role}`


<!-- END_f47a034257a009b731160db044157715 -->

<!-- START_81ac9047f8db2b92092c5a7f13e5d28d -->
## Update Role

Modify Information about an existing Role

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/roles/{role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/roles/{role}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/roles/{role}`

`PATCH api/v1/roles/{role}`


<!-- END_81ac9047f8db2b92092c5a7f13e5d28d -->

<!-- START_04c524fc2f0ea8c793406426144b4c71 -->
## Delete Role

Removes a Role from the system
- Rules of Access
  - User is an ADMIN or
  - User is a SCHOOL_OWNER

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/roles/{role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/roles/{role}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/roles/{role}`


<!-- END_04c524fc2f0ea8c793406426144b4c71 -->

<!-- START_b18ab56c779f0dc0850138609eb496b1 -->
## Get UserHasRoles

Responds with a list of UserHasRole
- Rules of Access
  - Current User can view User whose UserHasRole Info is being accessed

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/user-roles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/user-roles",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "role_id": 1,
            "school_id": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "user_id": 1,
            "role_id": 2,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "user_id": 2,
            "role_id": 3,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "user_id": 2,
            "role_id": 6,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "user_id": 2,
            "role_id": 5,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "user_id": 3,
            "role_id": 4,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 7,
            "user_id": 4,
            "role_id": 4,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 8,
            "user_id": 5,
            "role_id": 4,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 9,
            "user_id": 6,
            "role_id": 7,
            "school_id": 1,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/user-roles?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/user-roles?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/user-roles",
    "per_page": 15,
    "prev_page_url": null,
    "to": 9,
    "total": 9
}
```

### HTTP Request
`GET api/v1/user-roles`

`HEAD api/v1/user-roles`


<!-- END_b18ab56c779f0dc0850138609eb496b1 -->

<!-- START_932a8db945a9fbd7b6c7a00de45de757 -->
## Create UserHasRole

Supply UserHasRole Information to create a new one
- Rules of Access
  - User is an ADMIN or
  - User owns School

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/user-roles" \
-H "Accept: application/json" \
    -d "user_id"="5" \
    -d "role_id"="5" \
    -d "school_id"="5" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/user-roles",
    "method": "POST",
    "data": {
        "user_id": 5,
        "role_id": 5,
        "school_id": 5
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/user-roles`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | numeric |  required  | Valid user id
    role_id | numeric |  required  | Valid role id
    school_id | numeric |  optional  | Valid school id

<!-- END_932a8db945a9fbd7b6c7a00de45de757 -->

<!-- START_64478de3206735d03331d1185346b762 -->
## Get UserHasRole by ID

Responds with a specific UserHasRole by its ID
- Rules of Access
  - Current User can view User whose UserHasRole Info is being accessed

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/user-roles/{user_role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/user-roles/{user_role}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "user_id": 1,
    "role_id": 1,
    "school_id": null,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/user-roles/{user_role}`

`HEAD api/v1/user-roles/{user_role}`


<!-- END_64478de3206735d03331d1185346b762 -->

<!-- START_dd0bd964dfa540ba34c3b435cf52a8b4 -->
## Update UserHasRole (Not Supported)

Modify Information about an existing UserHasRole

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/user-roles/{user_role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/user-roles/{user_role}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/user-roles/{user_role}`

`PATCH api/v1/user-roles/{user_role}`


<!-- END_dd0bd964dfa540ba34c3b435cf52a8b4 -->

<!-- START_771782101f91d08abc0ae3101176909a -->
## Delete UserHasRole

Removes a particular UserHasRole from the system
- Rules of Access
  - User is an ADMIN or
  - User owns School

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/user-roles/{user_role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/user-roles/{user_role}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/user-roles/{user_role}`


<!-- END_771782101f91d08abc0ae3101176909a -->

<!-- START_3680f3c93117981b79a99939a73d5bbd -->
## Get Content Types

Responds with a list of Content Types
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/content-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/content-types",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "school_id": 1,
            "type": "App\\Models\\Department",
            "name": "type-1",
            "display_name": "Type 1",
            "format": "array",
            "related_to": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "school_id": 1,
            "type": "App\\Models\\Staff",
            "name": "type-5",
            "display_name": "Type 5",
            "format": "datetime",
            "related_to": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "school_id": 1,
            "type": "App\\Models\\Staff",
            "name": "type-10",
            "display_name": "Type 10",
            "format": "number",
            "related_to": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "school_id": 1,
            "type": "App\\Models\\Department",
            "name": "type-9",
            "display_name": "Type 9",
            "format": "string",
            "related_to": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "school_id": 1,
            "type": "App\\User",
            "name": "type-3",
            "display_name": "Type 3",
            "format": "boolean",
            "related_to": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "school_id": 1,
            "type": "App\\Models\\Department",
            "name": "type-6",
            "display_name": "Type 6",
            "format": "object",
            "related_to": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 7,
            "school_id": 1,
            "type": "App\\Models\\Department",
            "name": "type-4",
            "display_name": "Type 4",
            "format": "string",
            "related_to": 6,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 8,
            "school_id": 1,
            "type": "App\\Models\\Department",
            "name": "type-8",
            "display_name": "Type 8",
            "format": "number",
            "related_to": 6,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/content-types?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/schools\/1\/content-types?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/schools\/1\/content-types",
    "per_page": 15,
    "prev_page_url": null,
    "to": 8,
    "total": 8
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/content-types`

`HEAD api/v1/schools/{school_id}/content-types`


<!-- END_3680f3c93117981b79a99939a73d5bbd -->

<!-- START_8c7d45d41d930bd2006dd4eb3b8bf626 -->
## Create Content Type

Supply Content Type information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Content Type belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/schools/{school_id}/content-types" \
-H "Accept: application/json" \
    -d "type"="illo" \
    -d "name"="illo" \
    -d "display_name"="illo" \
    -d "school_id"="illo" \
    -d "format"="array" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/content-types",
    "method": "POST",
    "data": {
        "type": "illo",
        "name": "illo",
        "display_name": "illo",
        "school_id": "illo",
        "format": "array"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/schools/{school_id}/content-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  required  | 
    name | string |  required  | 
    display_name | string |  required  | 
    school_id | string |  optional  | 
    format | string |  required  | `array`, `datetime`, `number`, `string`, `boolean` or `object`

<!-- END_8c7d45d41d930bd2006dd4eb3b8bf626 -->

<!-- START_f1f96fdce8cef8f49baf668a036e811a -->
## Get Content Type by ID

Responds with a specific Content Type by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/schools/{school_id}/content-types/{content_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/content-types/{content_type}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Yaba College of Technology",
    "short_name": "YABATECH",
    "owner_id": 1,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/schools/{school_id}/content-types/{content_type}`

`HEAD api/v1/schools/{school_id}/content-types/{content_type}`


<!-- END_f1f96fdce8cef8f49baf668a036e811a -->

<!-- START_c648599210e1528a9035ae92556e647c -->
## Update Content Type

Modify information about an existing Content Type by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Content Type belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/schools/{school_id}/content-types/{content_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/content-types/{content_type}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/schools/{school_id}/content-types/{content_type}`

`PATCH api/v1/schools/{school_id}/content-types/{content_type}`


<!-- END_c648599210e1528a9035ae92556e647c -->

<!-- START_f3ba6c3272166512747340ba3c534be4 -->
## Delete Content Type

Removes a Content Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the ContentType belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/schools/{school_id}/content-types/{content_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/schools/{school_id}/content-types/{content_type}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/schools/{school_id}/content-types/{content_type}`


<!-- END_f3ba6c3272166512747340ba3c534be4 -->

<!-- START_0afa62f6c9788653382aed8c733219a7 -->
## Get Contents

Responds with a list of Content

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/contents" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/contents",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "owner_id": 1,
            "content_type_id": 1,
            "value": "array-value-1",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 2,
            "owner_id": 1,
            "content_type_id": 1,
            "value": "array-value-2",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 3,
            "owner_id": 1,
            "content_type_id": 1,
            "value": "array-value-3",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 4,
            "owner_id": 1,
            "content_type_id": 2,
            "value": "2018-08-01",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 5,
            "owner_id": 1,
            "content_type_id": 3,
            "value": "123",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 6,
            "owner_id": 1,
            "content_type_id": 4,
            "value": "Value 1",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 7,
            "owner_id": 1,
            "content_type_id": 5,
            "value": "true",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 8,
            "owner_id": 1,
            "content_type_id": 6,
            "value": "{}",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 9,
            "owner_id": 1,
            "content_type_id": 7,
            "value": "object-value-1",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        },
        {
            "id": 10,
            "owner_id": 1,
            "content_type_id": 8,
            "value": "123",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/contents?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/contents?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/contents",
    "per_page": 15,
    "prev_page_url": null,
    "to": 10,
    "total": 10
}
```

### HTTP Request
`GET api/v1/contents`

`HEAD api/v1/contents`


<!-- END_0afa62f6c9788653382aed8c733219a7 -->

<!-- START_dcb9fa5d1b0a5999e79951a93df8464d -->
## Create Content

Supply Content information to create a new one
- Rules of Access
 - User can update the model the Content belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/contents" \
-H "Accept: application/json" \
    -d "owner_id"="7750997" \
    -d "content_type_id"="7750997" \
    -d "value"="nobis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/contents",
    "method": "POST",
    "data": {
        "owner_id": 7750997,
        "content_type_id": 7750997,
        "value": "nobis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/contents`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    owner_id | numeric |  required  | 
    content_type_id | numeric |  required  | Valid content_type id
    value | string |  required  | 

<!-- END_dcb9fa5d1b0a5999e79951a93df8464d -->

<!-- START_d09fc6d932cf750b9a20c7469021bd5d -->
## Get Content by ID

Responds with a specific Content by its ID
- Rules of Access
  - User is in the same school as the user who owns the content

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/contents/{content}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/contents/{content}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "owner_id": 1,
    "content_type_id": 1,
    "value": "array-value-1",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/contents/{content}`

`HEAD api/v1/contents/{content}`


<!-- END_d09fc6d932cf750b9a20c7469021bd5d -->

<!-- START_d61a72d71a537feaa033af00f3c30314 -->
## Update Content

Modify information about an existing Content by ID
- Rules of Access
 - User can update the model the Content belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/contents/{content}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/contents/{content}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/contents/{content}`

`PATCH api/v1/contents/{content}`


<!-- END_d61a72d71a537feaa033af00f3c30314 -->

<!-- START_396745607b4e979b38bededf979728aa -->
## Delete Content

Removes a Content from the System by ID
- Rules of Access
 - User can update the model the Content belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/contents/{content}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/contents/{content}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/contents/{content}`


<!-- END_396745607b4e979b38bededf979728aa -->

<!-- START_48b5c65c0afbafb50790e88c6afe4ec6 -->
## Get Invites

Responds with a list of Invites the user has access to view
- Rules of Access
  - User is an ADMIN
  - User owns school where Invite is made to
  - User has role of INVITE_CREATOR in school where Invite is made to
  - User created the Invite

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/invites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/invites",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "creator_id": 1,
            "school_id": 1,
            "email": "invited.user@mailinator.com",
            "message": "Please come to my school as a student",
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/invites?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/invites?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/invites",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/invites`

`HEAD api/v1/invites`


<!-- END_48b5c65c0afbafb50790e88c6afe4ec6 -->

<!-- START_e32d9e0ee4c2d9fc8b3ad6cf6eb21b8a -->
## Create Invite

Supply Invite information to create a new one
- Rules of Access
 - User can invite an ADMIN only if User is an ADMIN
 - User can invite a SCHOOL_OWNER if User is an ADMIN or SCHOOL_OWNER in same school
 - User can invite anyone else to a school if User is ADMIN / SCHOOL_OWNER / INVITE_CREATOR

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/invites" \
-H "Accept: application/json" \
    -d "email"="lamont.littel@example.org" \
    -d "role_id"="2931" \
    -d "roles"="autem" \
    -d "school_id"="2931" \
    -d "message"="autem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/invites",
    "method": "POST",
    "data": {
        "email": "lamont.littel@example.org",
        "role_id": 2931,
        "roles": "autem",
        "school_id": 2931,
        "message": "autem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/invites`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    role_id | numeric |  optional  | Required if the parameters `roles` are not present. Valid role id
    roles | array |  optional  | Required if the parameters `role_id` are not present.
    school_id | numeric |  optional  | Valid school id
    message | string |  required  | 

<!-- END_e32d9e0ee4c2d9fc8b3ad6cf6eb21b8a -->

<!-- START_93ab13d4129d8f052fa7a3f19acda848 -->
## Get Invite by ID

Responds with a specific Invite by its ID
- Rules of Access
  - User is an ADMIN
  - User owns school where Invite is made to
  - User has role of INVITE_CREATOR in school where Invite is made to
  - User created the Invite

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/invites/{invite}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/invites/{invite}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "creator_id": 1,
    "school_id": 1,
    "email": "invited.user@mailinator.com",
    "message": "Please come to my school as a student",
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/invites/{invite}`

`HEAD api/v1/invites/{invite}`


<!-- END_93ab13d4129d8f052fa7a3f19acda848 -->

<!-- START_5baecaa00070ce371d45f975ca8a32ff -->
## Update Invite

Modify information about an existing Invite by ID
- Rules of Access
 - Invite was made to User's email address

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/invites/{invite}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/invites/{invite}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/invites/{invite}`

`PATCH api/v1/invites/{invite}`


<!-- END_5baecaa00070ce371d45f975ca8a32ff -->

<!-- START_3a4c286ef3a0c4ae0e3e8cb0f1e95352 -->
## Delete Invite

Removes a Invite from the System by ID
- Rules of Access
  - User is an ADMIN
  - User owns school where Invite is made to
  - User has role of INVITE_CREATOR in school where Invite is made to
  - User created the Invite

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/invites/{invite}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/invites/{invite}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/invites/{invite}`


<!-- END_3a4c286ef3a0c4ae0e3e8cb0f1e95352 -->

<!-- START_b6bbc2cf05b33e585d5053cc29ff36e3 -->
## Get Prospects

Responds with a list of Prospects
- Rules of Access
  - User is same school as prospect

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/prospects" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/prospects",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 6,
            "school_id": 1,
            "program_id": 1,
            "session_id": 1,
            "student_id": null,
            "locked_at": null,
            "accepted_at": null,
            "created_at": "2018-08-01 08:23:36",
            "updated_at": "2018-08-01 08:23:36"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/v1\/prospects?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/v1\/prospects?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/v1\/prospects",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/v1/prospects`

`HEAD api/v1/prospects`


<!-- END_b6bbc2cf05b33e585d5053cc29ff36e3 -->

<!-- START_bc853266f71199facace19e300e78784 -->
## Create Prospect

Supply Prospect information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/v1/prospects" \
-H "Accept: application/json" \
    -d "user_id"="provident" \
    -d "school_id"="85191" \
    -d "program_id"="85191" \
    -d "session_id"="85191" \
    -d "locked_at"="provident" \
    -d "accepted_at"="provident" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/prospects",
    "method": "POST",
    "data": {
        "user_id": "provident",
        "school_id": 85191,
        "program_id": 85191,
        "session_id": 85191,
        "locked_at": "provident",
        "accepted_at": "provident"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/prospects`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | string |  optional  | 
    school_id | numeric |  required  | Valid school id
    program_id | numeric |  required  | Valid program id
    session_id | numeric |  required  | Valid session id
    locked_at | string |  optional  | 
    accepted_at | string |  optional  | 

<!-- END_bc853266f71199facace19e300e78784 -->

<!-- START_d4095a1dedb7e0a30fbf61655e3c6fc5 -->
## Get Prospect by ID

Responds with a specific Prospect by its ID
- Rules of Access
  - User is an ADMIN or SCHOOL_OWNER of prospect's school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/v1/prospects/{prospect}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/prospects/{prospect}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "user_id": 6,
    "school_id": 1,
    "program_id": 1,
    "session_id": 1,
    "student_id": null,
    "locked_at": null,
    "accepted_at": null,
    "created_at": "2018-08-01 08:23:36",
    "updated_at": "2018-08-01 08:23:36"
}
```

### HTTP Request
`GET api/v1/prospects/{prospect}`

`HEAD api/v1/prospects/{prospect}`


<!-- END_d4095a1dedb7e0a30fbf61655e3c6fc5 -->

<!-- START_5ee12da09530128e4ac035e927d919dc -->
## Update Prospect

Modify information about an existing Program by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/v1/prospects/{prospect}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/prospects/{prospect}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/prospects/{prospect}`

`PATCH api/v1/prospects/{prospect}`


<!-- END_5ee12da09530128e4ac035e927d919dc -->

<!-- START_34f4c59b094674c5f6e0da77c06b769b -->
## Delete Prospect

Removes a Prospect from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Prospect belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/v1/prospects/{prospect}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/v1/prospects/{prospect}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/prospects/{prospect}`


<!-- END_34f4c59b094674c5f6e0da77c06b769b -->

