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
<!-- START_5ef90dd4846f0d2902b89354bf5c42bb -->
## Authenticate User

Uses basic authentication and returns a Json Web Token

> Example request:

```bash
curl -X POST "http://localhost:8000/api/auth" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/auth",
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
`POST api/auth`


<!-- END_5ef90dd4846f0d2902b89354bf5c42bb -->

<!-- START_2ea88ff35aa222f5582e50f39a2b35fd -->
## Get Current User

Retrieve information about the current authenticated user

> Example request:

```bash
curl -X GET "http://localhost:8000/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/user",
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
    "dob": "1963-03-19",
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->

<!-- START_e51aeda29969b51e7035a2b96d978ef3 -->
## Get Schools

Responds with a list of Schools
- Rules of Access
  - User is admin or in school
- Filters
  - ?with_schools

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools",
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
[
    {
        "id": 1,
        "name": "Obafemi Awolowo University",
        "short_name": "OAU",
        "owner_id": 1,
        "is_active": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48",
        "pivot": {
            "user_id": 1,
            "school_id": 1,
            "created_at": "2018-07-07 14:17:48",
            "updated_at": "2018-07-07 14:17:48"
        }
    }
]
```

### HTTP Request
`GET api/schools`

`HEAD api/schools`


<!-- END_e51aeda29969b51e7035a2b96d978ef3 -->

<!-- START_d290b49f6ab037b29f928b0181113d60 -->
## Create School

Supply School information to create a new one

> Example request:

```bash
curl -X POST "http://localhost:8000/api/schools" \
-H "Accept: application/json" \
    -d "name"="assumenda" \
    -d "short_name"="assumenda" \
    -d "is_active"="0" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools",
    "method": "POST",
    "data": {
        "name": "assumenda",
        "short_name": "assumenda",
        "is_active": "0"
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
`POST api/schools`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    short_name | string |  required  | 
    is_active | numeric |  optional  | `1` or `0`

<!-- END_d290b49f6ab037b29f928b0181113d60 -->

<!-- START_862296e54f319c85cabc63651980e5de -->
## Get School by ID

Responds with a specific School by its ID
- Rules of Access
  - User is admin or in school
- Filters
  - ?with_schools

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school}",
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
    "name": "Obafemi Awolowo University",
    "short_name": "OAU",
    "owner_id": 1,
    "is_active": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48",
    "pivot": {
        "user_id": 1,
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
}
```

### HTTP Request
`GET api/schools/{school}`

`HEAD api/schools/{school}`


<!-- END_862296e54f319c85cabc63651980e5de -->

<!-- START_85e6256a1bed7221faf44b3f695d2cb0 -->
## Update School

Modify information about an existing School by ID
- Rules of Access
 - User is an ADMIN or
 - User owns the School

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school}",
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
`PUT api/schools/{school}`

`PATCH api/schools/{school}`


<!-- END_85e6256a1bed7221faf44b3f695d2cb0 -->

<!-- START_ae812fba78695c4d4e2b414d2afe7fa9 -->
## Delete School

Removes a School from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns the School

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school}",
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
`DELETE api/schools/{school}`


<!-- END_ae812fba78695c4d4e2b414d2afe7fa9 -->

<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## Get Users

Responds with a list of Users
- Rules of Access
  - User is same school
- Filters
  - ?with_staff
  - ?with_students

> Example request:

```bash
curl -X GET "http://localhost:8000/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/users",
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
    "data": [
        {
            "id": 1,
            "first_name": "Dean",
            "last_name": "Daniels",
            "other_names": null,
            "display_name": "Dean Daniels",
            "dob": "1971-03-13",
            "created_at": "2018-07-07T14:17:48+00:00",
            "updated_at": "2018-07-07T14:17:48+00:00"
        },
        {
            "id": 1,
            "first_name": "Dean",
            "last_name": "Daniels",
            "other_names": null,
            "display_name": "Dean Daniels",
            "dob": "1971-03-13",
            "created_at": "2018-07-07T14:17:48+00:00",
            "updated_at": "2018-07-07T14:17:48+00:00"
        },
        {
            "id": 1,
            "first_name": "Dean",
            "last_name": "Daniels",
            "other_names": null,
            "display_name": "Dean Daniels",
            "dob": "1971-03-13",
            "created_at": "2018-07-07T14:17:48+00:00",
            "updated_at": "2018-07-07T14:17:48+00:00"
        },
        {
            "id": 1,
            "first_name": "Kailey",
            "last_name": "Kertzmann",
            "other_names": null,
            "display_name": "Kailey Kertzmann",
            "dob": "1957-10-30",
            "created_at": "2018-07-07T14:17:48+00:00",
            "updated_at": "2018-07-07T14:17:48+00:00"
        },
        {
            "id": 1,
            "first_name": "Enos",
            "last_name": "Stiedemann",
            "other_names": null,
            "display_name": "Enos Stiedemann",
            "dob": "1987-05-22",
            "created_at": "2018-07-07T14:17:48+00:00",
            "updated_at": "2018-07-07T14:17:48+00:00"
        },
        {
            "id": 1,
            "first_name": "Jade",
            "last_name": "Pfannerstill",
            "other_names": null,
            "display_name": "Jade Pfannerstill",
            "dob": "1965-05-06",
            "created_at": "2018-07-07T14:17:48+00:00",
            "updated_at": "2018-07-07T14:17:48+00:00"
        }
    ]
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create User

Supply User information to create a new one

> Example request:

```bash
curl -X POST "http://localhost:8000/api/users" \
-H "Accept: application/json" \
    -d "first_name"="ut" \
    -d "last_name"="ut" \
    -d "email"="nakia.mcclure@example.org" \
    -d "password"="ut" \
    -d "dob"="1986-10-25" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/users",
    "method": "POST",
    "data": {
        "first_name": "ut",
        "last_name": "ut",
        "email": "nakia.mcclure@example.org",
        "password": "ut",
        "dob": "1986-10-25"
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
`POST api/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | 
    last_name | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 
    dob | date |  required  | 

<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8f99b42746e451f8dc43742e118cb47b -->
## Get User by ID

Responds with a specific User by its ID
- Rules of Access
  - User is same school
- Filters
  - ?with_staff
  - ?with_students

> Example request:

```bash
curl -X GET "http://localhost:8000/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/users/{user}",
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
    "dob": "1963-03-19",
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update User

Modify information about an existing User by ID
- Rules of Access
 - User is an ADMIN or
 - User is updating his/her own account

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/users/{user}",
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
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Delete User

Removes a User from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User is deleting his/her own account

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/users/{user}",
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
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

<!-- START_0151899c6cc8923a22b32cbfb1d662aa -->
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
curl -X GET "http://localhost:8000/api/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/faculties",
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
[
    {
        "id": 1,
        "name": "Science and Technology",
        "dean_id": 1,
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48",
        "deleted_at": null
    }
]
```

### HTTP Request
`GET api/faculties`

`HEAD api/faculties`


<!-- END_0151899c6cc8923a22b32cbfb1d662aa -->

<!-- START_3d82dcd0fb3f2c54d0822c0296209190 -->
## Create Faculty

Supply Faculty information to create a new one
- Rules of Access
 - User is an administrator or
 - User owns school the Faculty belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/faculties" \
-H "Accept: application/json" \
    -d "name"="sed" \
    -d "school_id"="25" \
    -d "dean_id"="25" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/faculties",
    "method": "POST",
    "data": {
        "name": "sed",
        "school_id": 25,
        "dean_id": 25
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
`POST api/faculties`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    school_id | numeric |  required  | Valid school id
    dean_id | numeric |  required  | Valid staff id

<!-- END_3d82dcd0fb3f2c54d0822c0296209190 -->

<!-- START_81ed220a7e8f733c1b8ef9150c0eea2b -->
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
curl -X GET "http://localhost:8000/api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/faculties/{faculty}",
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
    "name": "Science and Technology",
    "dean_id": 1,
    "school_id": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48",
    "deleted_at": null
}
```

### HTTP Request
`GET api/faculties/{faculty}`

`HEAD api/faculties/{faculty}`


<!-- END_81ed220a7e8f733c1b8ef9150c0eea2b -->

<!-- START_cd906852e526fae660e2dd28c177318b -->
## Update Faculty

Modify information about an existing Faculty by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Faculty belongs to or
 - User is Dean of the Faculty

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/faculties/{faculty}",
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
`PUT api/faculties/{faculty}`

`PATCH api/faculties/{faculty}`


<!-- END_cd906852e526fae660e2dd28c177318b -->

<!-- START_7d4ac3e94893c9e6c3e7c48438874f0c -->
## Delete Faculty

Removes a Faculty from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Faculty belongs to or
 - User is Dean of the Faculty

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/faculties/{faculty}",
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
`DELETE api/faculties/{faculty}`


<!-- END_7d4ac3e94893c9e6c3e7c48438874f0c -->

<!-- START_2a2bd5f635421bebeab28f82894cfdaa -->
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
curl -X GET "http://localhost:8000/api/departments" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/departments",
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
[
    {
        "id": 1,
        "name": "Computer Science",
        "hod_id": 1,
        "faculty_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/departments`

`HEAD api/departments`


<!-- END_2a2bd5f635421bebeab28f82894cfdaa -->

<!-- START_b002b7c6ad7a3a78a8d833aed62c535e -->
## Create Department

Supply Department information to create a new one
- Rules of Access
 - User is an administrator or
 - User owns school the Department belongs to or
 - User is Dean of Faculty the Department belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/departments" \
-H "Accept: application/json" \
    -d "name"="dolorum" \
    -d "hod_id"="487700" \
    -d "faculty_id"="487700" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/departments",
    "method": "POST",
    "data": {
        "name": "dolorum",
        "hod_id": 487700,
        "faculty_id": 487700
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
`POST api/departments`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    hod_id | numeric |  required  | Valid staff id
    faculty_id | numeric |  required  | Valid faculty id

<!-- END_b002b7c6ad7a3a78a8d833aed62c535e -->

<!-- START_987c0aa639e88c0aad48c5924fc5ad5f -->
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
curl -X GET "http://localhost:8000/api/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/departments/{department}",
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
    "name": "Computer Science",
    "hod_id": 1,
    "faculty_id": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/departments/{department}`

`HEAD api/departments/{department}`


<!-- END_987c0aa639e88c0aad48c5924fc5ad5f -->

<!-- START_699b52fb4bcae66f8ebd1b94d43840b3 -->
## Update Department

Modify information about an existing Department by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Department belongs to or
 - User is Dean of Faculty the Department belongs to or
 - User is HOD of the Department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/departments/{department}",
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
`PUT api/departments/{department}`

`PATCH api/departments/{department}`


<!-- END_699b52fb4bcae66f8ebd1b94d43840b3 -->

<!-- START_0e43c6b5ed1c5abe92437f672ec3eaef -->
## Delete Department

Removes a Department from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Department belongs to or
 - User is Dean of Faculty the Department belongs to or
 - User is HOD of the Department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/departments/{department}",
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
`DELETE api/departments/{department}`


<!-- END_0e43c6b5ed1c5abe92437f672ec3eaef -->

<!-- START_e75eb1d616a7c047f8e23de26a73eae9 -->
## Get Programs

Responds with a list of Programs
- Rules of Access
  - User is same school as program
- Filters
  - ?with_departments

> Example request:

```bash
curl -X GET "http://localhost:8000/api/programs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/programs",
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
[
    {
        "id": 1,
        "name": "Library Studies",
        "department_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/programs`

`HEAD api/programs`


<!-- END_e75eb1d616a7c047f8e23de26a73eae9 -->

<!-- START_f23415d8a8c84bb895710ecc0b704704 -->
## Create Program

Supply Program information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to
 - User is Dean of Program's faculty
 - User is HOD of Program's department

> Example request:

```bash
curl -X POST "http://localhost:8000/api/programs" \
-H "Accept: application/json" \
    -d "name"="et" \
    -d "department_id"="18670618" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/programs",
    "method": "POST",
    "data": {
        "name": "et",
        "department_id": 18670618
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
`POST api/programs`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    department_id | numeric |  required  | Valid department id

<!-- END_f23415d8a8c84bb895710ecc0b704704 -->

<!-- START_86d53e9643d43f01a320bf290a1bf1f6 -->
## Get Program by ID

Responds with a specific Program by its ID
- Rules of Access
  - User is same school as program
- Filters
  - ?with_departments

> Example request:

```bash
curl -X GET "http://localhost:8000/api/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/programs/{program}",
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
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/programs/{program}`

`HEAD api/programs/{program}`


<!-- END_86d53e9643d43f01a320bf290a1bf1f6 -->

<!-- START_d005858bc6b7b52ffe5a56bb184310bd -->
## Update Program

Modify information about an existing Program by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to
 - User is Dean of Program's faculty
 - User is HOD of Program's department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/programs/{program}",
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
`PUT api/programs/{program}`

`PATCH api/programs/{program}`


<!-- END_d005858bc6b7b52ffe5a56bb184310bd -->

<!-- START_9fe7eacc4db501466b4abf06986f2c77 -->
## Delete Program

Removes a Program from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program belongs to
 - User is Dean of Program's faculty
 - User is HOD of Program's department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/programs/{program}",
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
`DELETE api/programs/{program}`


<!-- END_9fe7eacc4db501466b4abf06986f2c77 -->

<!-- START_93cdf9b2f9623052a54b92ab126b0613 -->
## Get Levels

Responds with a list of Levels
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/levels" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/levels",
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
[
    {
        "id": 1,
        "name": "100L",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "name": "200L",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "name": "300L",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "name": "400L",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/schools/{school_id}/levels`

`HEAD api/schools/{school_id}/levels`


<!-- END_93cdf9b2f9623052a54b92ab126b0613 -->

<!-- START_a25ccd3f64819ae565d1984f65208097 -->
## Create Level

Supply Level information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Level belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/schools/{school_id}/levels" \
-H "Accept: application/json" \
    -d "name"="eos" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/levels",
    "method": "POST",
    "data": {
        "name": "eos"
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
`POST api/schools/{school_id}/levels`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 

<!-- END_a25ccd3f64819ae565d1984f65208097 -->

<!-- START_d02823935f7591612a419a2a09ed4cd3 -->
## Get Level by ID

Responds with a specific Level by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/levels/{level}",
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
    "name": "Obafemi Awolowo University",
    "short_name": "OAU",
    "owner_id": 1,
    "is_active": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48",
    "pivot": {
        "user_id": 1,
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
}
```

### HTTP Request
`GET api/schools/{school_id}/levels/{level}`

`HEAD api/schools/{school_id}/levels/{level}`


<!-- END_d02823935f7591612a419a2a09ed4cd3 -->

<!-- START_f4d441f9577cc5154603c1f0f6798b65 -->
## Update Level

Modify information about an existing Level by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Level belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/levels/{level}",
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
`PUT api/schools/{school_id}/levels/{level}`

`PATCH api/schools/{school_id}/levels/{level}`


<!-- END_f4d441f9577cc5154603c1f0f6798b65 -->

<!-- START_42b9e113ffe8d5e8779cbf3ff355c41d -->
## Delete Level

Removes a Level from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Level belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/levels/{level}",
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
`DELETE api/schools/{school_id}/levels/{level}`


<!-- END_42b9e113ffe8d5e8779cbf3ff355c41d -->

<!-- START_e22068e5b34cd9ff059322f3a3ec5c2e -->
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
curl -X GET "http://localhost:8000/api/students" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/students",
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
[
    {
        "id": 1,
        "user_id": 3,
        "program_id": 1,
        "matric_no": "UNI991",
        "is_active": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "user_id": 4,
        "program_id": 1,
        "matric_no": "UNI758",
        "is_active": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "user_id": 5,
        "program_id": 1,
        "matric_no": "UNI576",
        "is_active": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/students`

`HEAD api/students`


<!-- END_e22068e5b34cd9ff059322f3a3ec5c2e -->

<!-- START_058e6d0cac82649086bbc06fe88fd040 -->
## Create Student

Supply Student information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Student belongs to or
 - User is HOD in Student's department or
 - User is Dean of Student's Faculty

> Example request:

```bash
curl -X POST "http://localhost:8000/api/students" \
-H "Accept: application/json" \
    -d "user_id"="10295" \
    -d "program_id"="10295" \
    -d "matric_no"="sed" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/students",
    "method": "POST",
    "data": {
        "user_id": 10295,
        "program_id": 10295,
        "matric_no": "sed"
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
`POST api/students`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | numeric |  required  | Valid user id
    program_id | numeric |  required  | Valid program id
    matric_no | string |  required  | 

<!-- END_058e6d0cac82649086bbc06fe88fd040 -->

<!-- START_0312bb71e4bdd9469395fd583d93f3c4 -->
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
curl -X GET "http://localhost:8000/api/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/students/{student}",
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
    "matric_no": "UNI991",
    "is_active": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/students/{student}`

`HEAD api/students/{student}`


<!-- END_0312bb71e4bdd9469395fd583d93f3c4 -->

<!-- START_f4798a6166743436fe98df7c0a10ea60 -->
## Update Student

Modify information about an existing Student by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Student belongs to or
 - User is HOD in Student's department or
 - User is Dean of Student's Faculty

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/students/{student}",
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
`PUT api/students/{student}`

`PATCH api/students/{student}`


<!-- END_f4798a6166743436fe98df7c0a10ea60 -->

<!-- START_9b6130181f7a43c0b235a243cf8e7980 -->
## Delete Student

Removes a Student from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Student belongs to or
 - User is HOD in Student's department or
 - User is Dean of Student's Faculty

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/students/{student}",
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
`DELETE api/students/{student}`


<!-- END_9b6130181f7a43c0b235a243cf8e7980 -->

<!-- START_38f650806a828403a7b131016b537617 -->
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
curl -X GET "http://localhost:8000/api/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/courses",
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
[
    {
        "id": 1,
        "department_id": 1,
        "semester_type_id": 1,
        "level_id": 1,
        "code": "AZN119",
        "title": "Kinematics",
        "credit": 4,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "department_id": 1,
        "semester_type_id": 1,
        "level_id": 2,
        "code": "KWD148",
        "title": "Algorithms and Data Structures",
        "credit": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "department_id": 1,
        "semester_type_id": 1,
        "level_id": 3,
        "code": "CNY108",
        "title": "Physical Sciences",
        "credit": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "department_id": 1,
        "semester_type_id": 1,
        "level_id": 4,
        "code": "SEK114",
        "title": "Oscillatory Motion",
        "credit": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 5,
        "department_id": 1,
        "semester_type_id": 2,
        "level_id": 1,
        "code": "XPF183",
        "title": "Discrete Mathematics",
        "credit": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 6,
        "department_id": 1,
        "semester_type_id": 2,
        "level_id": 2,
        "code": "ARS185",
        "title": "Signal Analysis",
        "credit": 3,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 7,
        "department_id": 1,
        "semester_type_id": 2,
        "level_id": 3,
        "code": "AOA141",
        "title": "Oscillatory Motion",
        "credit": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 8,
        "department_id": 1,
        "semester_type_id": 2,
        "level_id": 4,
        "code": "BTN156",
        "title": "Basic Algebra",
        "credit": 4,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/courses`

`HEAD api/courses`


<!-- END_38f650806a828403a7b131016b537617 -->

<!-- START_7adfcfdea10d30f89cf1c74a69c31361 -->
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
curl -X POST "http://localhost:8000/api/courses" \
-H "Accept: application/json" \
    -d "department_id"="6090928" \
    -d "semester_type_id"="6090928" \
    -d "level_id"="6090928" \
    -d "code"="cum" \
    -d "title"="cum" \
    -d "credit"="6090928" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/courses",
    "method": "POST",
    "data": {
        "department_id": 6090928,
        "semester_type_id": 6090928,
        "level_id": 6090928,
        "code": "cum",
        "title": "cum",
        "credit": 6090928
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
`POST api/courses`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    department_id | numeric |  required  | Valid department id
    semester_type_id | numeric |  required  | Valid semester_type id
    level_id | numeric |  required  | Valid level id
    code | string |  required  | 
    title | string |  required  | 
    credit | numeric |  required  | 

<!-- END_7adfcfdea10d30f89cf1c74a69c31361 -->

<!-- START_8689ce8f09e81fcaee386cfbd8e265cd -->
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
curl -X GET "http://localhost:8000/api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/courses/{course}",
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
    "code": "AZN119",
    "title": "Kinematics",
    "credit": 4,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/courses/{course}`

`HEAD api/courses/{course}`


<!-- END_8689ce8f09e81fcaee386cfbd8e265cd -->

<!-- START_bb5a98f4f88ceacd9c6cef8cf663b402 -->
## Update Course

Modify information about an existing Course by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/courses/{course}",
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
`PUT api/courses/{course}`

`PATCH api/courses/{course}`


<!-- END_bb5a98f4f88ceacd9c6cef8cf663b402 -->

<!-- START_ddc71fecb200b23443e0cfaad85d4241 -->
## Delete Course

Removes a Course from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course belongs to or
 - User is Dean of Faculty the Course belongs to or
 - User is HOD of Department the Course belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/courses/{course}",
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
`DELETE api/courses/{course}`


<!-- END_ddc71fecb200b23443e0cfaad85d4241 -->

<!-- START_86c98e828da326493a503b9fc2efe542 -->
## Get Semester Types

Responds with a list of Semester Types

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/semester-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/semester-types",
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
[
    {
        "id": 1,
        "name": "1st Semester",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "name": "2nd Semester",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/schools/{school_id}/semester-types`

`HEAD api/schools/{school_id}/semester-types`


<!-- END_86c98e828da326493a503b9fc2efe542 -->

<!-- START_e9af71bfe9c11e7cac6f3f8729da915f -->
## Create Semester Type

> Example request:

```bash
curl -X POST "http://localhost:8000/api/schools/{school_id}/semester-types" \
-H "Accept: application/json" \
    -d "name"="non" \
    -d "school_id"="93" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/semester-types",
    "method": "POST",
    "data": {
        "name": "non",
        "school_id": 93
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
`POST api/schools/{school_id}/semester-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    school_id | numeric |  required  | Valid school id

<!-- END_e9af71bfe9c11e7cac6f3f8729da915f -->

<!-- START_5e16b99ca1a0ee860aff7066eaeb3d0b -->
## Get Semester Type by ID

Responds with a specific Semester Type by its ID

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/semester-types/{semester_type}",
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
    "name": "Obafemi Awolowo University",
    "short_name": "OAU",
    "owner_id": 1,
    "is_active": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48",
    "pivot": {
        "user_id": 1,
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
}
```

### HTTP Request
`GET api/schools/{school_id}/semester-types/{semester_type}`

`HEAD api/schools/{school_id}/semester-types/{semester_type}`


<!-- END_5e16b99ca1a0ee860aff7066eaeb3d0b -->

<!-- START_ef0c2c212cd1cb064424ab9cbf98a76f -->
## Update Semester Type

Modify information about an existing Semester Type by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester Type belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/semester-types/{semester_type}",
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
`PUT api/schools/{school_id}/semester-types/{semester_type}`

`PATCH api/schools/{school_id}/semester-types/{semester_type}`


<!-- END_ef0c2c212cd1cb064424ab9cbf98a76f -->

<!-- START_40df788cb409056debb2f4a311fb068e -->
## Delete Semester Type

Removes a Semester Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester Type belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/semester-types/{semester_type}",
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
`DELETE api/schools/{school_id}/semester-types/{semester_type}`


<!-- END_40df788cb409056debb2f4a311fb068e -->

<!-- START_adb73d4f224601ea718940e6bb97c778 -->
## Get Staff

Responds with a list of Staff
- Rules of Access
  - User is same school as Staff

> Example request:

```bash
curl -X GET "http://localhost:8000/api/staff" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff",
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
[
    {
        "id": 1,
        "user_id": 2,
        "school_id": 1,
        "department_id": null,
        "title": "Mr.",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/staff`

`HEAD api/staff`


<!-- END_adb73d4f224601ea718940e6bb97c778 -->

<!-- START_cde1a268ad4879413936f91d73a540bc -->
## Create Staff

Supply Staff information to create a new one
- Rules of Access
 - User can update Department staff is to be in or
 - User can update School staff is to be in or
 - User can update the staff user's info

> Example request:

```bash
curl -X POST "http://localhost:8000/api/staff" \
-H "Accept: application/json" \
    -d "school_id"="6953" \
    -d "department_id"="6953" \
    -d "user_id"="6953" \
    -d "title"="eum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff",
    "method": "POST",
    "data": {
        "school_id": 6953,
        "department_id": 6953,
        "user_id": 6953,
        "title": "eum"
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
`POST api/staff`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    school_id | numeric |  required  | Valid school id
    department_id | numeric |  optional  | Valid department id
    user_id | numeric |  required  | Valid user id
    title | string |  required  | 

<!-- END_cde1a268ad4879413936f91d73a540bc -->

<!-- START_76c9bf4aa84f78a0a0c2eb2729e34188 -->
## Get Staff by ID

Responds with a specific Staff by its ID
- Rules of Access
  - User is same school as Staff

> Example request:

```bash
curl -X GET "http://localhost:8000/api/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff/{staff}",
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
    "title": "Mr.",
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/staff/{staff}`

`HEAD api/staff/{staff}`


<!-- END_76c9bf4aa84f78a0a0c2eb2729e34188 -->

<!-- START_c5c03cc30b365cbb9de2757105311e99 -->
## Update Staff

Modify information about an existing Staff by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Staff belongs to or
 - User is HOD in staff's department or
 - User is Dean of Staff's Faculty

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff/{staff}",
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
`PUT api/staff/{staff}`

`PATCH api/staff/{staff}`


<!-- END_c5c03cc30b365cbb9de2757105311e99 -->

<!-- START_60046dd4fa0b05e4f13b356b1407843e -->
## Delete Staff

Removes a Staff from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Staff belongs to or
 - User is HOD in staff's department or
 - User is Dean of Staff's Faculty

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff/{staff}",
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
`DELETE api/staff/{staff}`


<!-- END_60046dd4fa0b05e4f13b356b1407843e -->

<!-- START_13c5ec5040d217b9644ebd1d574ffb35 -->
## Get Sessions

Responds with a list of Sessions
- Rules of Access
  - User is same school as Session

> Example request:

```bash
curl -X GET "http://localhost:8000/api/sessions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/sessions",
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
[
    {
        "id": 1,
        "school_id": 1,
        "name": "2018\/2019",
        "start_date": "2018-07-07 00:00:00",
        "end_date": "2019-07-07 00:00:00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "school_id": 1,
        "name": "2019\/2020",
        "start_date": "2019-07-07 00:00:00",
        "end_date": "2020-07-06 00:00:00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/sessions`

`HEAD api/sessions`


<!-- END_13c5ec5040d217b9644ebd1d574ffb35 -->

<!-- START_b0309e45a2af0a1e9b599219dbce6d98 -->
## Create Session

Supply Session information to create a new one
- Rules of Access
 - User can update Session's school

> Example request:

```bash
curl -X POST "http://localhost:8000/api/sessions" \
-H "Accept: application/json" \
    -d "school_id"="5240575" \
    -d "name"="soluta" \
    -d "start_date"="2003-01-08" \
    -d "end_date"="2003-01-08" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/sessions",
    "method": "POST",
    "data": {
        "school_id": 5240575,
        "name": "soluta",
        "start_date": "2003-01-08",
        "end_date": "2003-01-08"
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
`POST api/sessions`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    school_id | numeric |  required  | Valid school id
    name | string |  required  | 
    start_date | date |  required  | 
    end_date | date |  required  | 

<!-- END_b0309e45a2af0a1e9b599219dbce6d98 -->

<!-- START_60741d30911f638fc16fef8f85b172cc -->
## Get Session by ID

Responds with a specific Session by its ID
- Rules of Access
  - User is same school as Session

> Example request:

```bash
curl -X GET "http://localhost:8000/api/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/sessions/{session}",
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
    "start_date": "2018-07-07 00:00:00",
    "end_date": "2019-07-07 00:00:00",
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/sessions/{session}`

`HEAD api/sessions/{session}`


<!-- END_60741d30911f638fc16fef8f85b172cc -->

<!-- START_01d1a457f56b8ac4134ff996daf9e9ab -->
## Update Session

Modify information about an existing Session by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Session belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/sessions/{session}",
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
`PUT api/sessions/{session}`

`PATCH api/sessions/{session}`


<!-- END_01d1a457f56b8ac4134ff996daf9e9ab -->

<!-- START_4fd1093757d2141b14b2cd8666e3e281 -->
## Delete Session

Removes a Session from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Session belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/sessions/{session}",
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
`DELETE api/sessions/{session}`


<!-- END_4fd1093757d2141b14b2cd8666e3e281 -->

<!-- START_ce3236c7fa6759518a65c3054348bbc8 -->
## Get Semesters

Responds with a list Semesters
- Rules of Access
  - User is same school as Semester
- Filters
  - ?with_session
  - ?with_type

> Example request:

```bash
curl -X GET "http://localhost:8000/api/semesters" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/semesters",
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
[
    {
        "id": 1,
        "semester_type_id": 1,
        "session_id": 1,
        "start_date": "2018-07-07 00:00:00",
        "end_date": "2019-01-03 00:00:00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "semester_type_id": 2,
        "session_id": 1,
        "start_date": "2019-01-08 00:00:00",
        "end_date": "2019-07-07 00:00:00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "semester_type_id": 1,
        "session_id": 2,
        "start_date": "2019-07-07 00:00:00",
        "end_date": "2020-01-03 00:00:00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "semester_type_id": 2,
        "session_id": 2,
        "start_date": "2020-01-08 00:00:00",
        "end_date": "2020-07-06 00:00:00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/semesters`

`HEAD api/semesters`


<!-- END_ce3236c7fa6759518a65c3054348bbc8 -->

<!-- START_6f3217dd5e05b1415edd3043bb8bab34 -->
## Create Semester

Supply Semester information to create a new one
- Rules of Access
 - User can update semester type

> Example request:

```bash
curl -X POST "http://localhost:8000/api/semesters" \
-H "Accept: application/json" \
    -d "session_id"="17" \
    -d "semester_type_id"="17" \
    -d "start_date"="1980-05-23" \
    -d "end_date"="1980-05-23" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/semesters",
    "method": "POST",
    "data": {
        "session_id": 17,
        "semester_type_id": 17,
        "start_date": "1980-05-23",
        "end_date": "1980-05-23"
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
`POST api/semesters`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    session_id | numeric |  optional  | Valid session id
    semester_type_id | numeric |  required  | Valid semester_type id
    start_date | date |  required  | 
    end_date | date |  required  | 

<!-- END_6f3217dd5e05b1415edd3043bb8bab34 -->

<!-- START_d02ac86dc363f25589ad59aedebbb645 -->
## Get Semester by ID

Responds with a specific Semester by its ID
- Rules of Access
  - User is same school as Semester
- Filters
  - ?with_session
  - ?with_type

> Example request:

```bash
curl -X GET "http://localhost:8000/api/semesters/{semester}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/semesters/{semester}",
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
    "start_date": "2018-07-07 00:00:00",
    "end_date": "2019-01-03 00:00:00",
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/semesters/{semester}`

`HEAD api/semesters/{semester}`


<!-- END_d02ac86dc363f25589ad59aedebbb645 -->

<!-- START_5a2c97a3c1aef2662a46127990470eb4 -->
## Update Semester

Modify information about an existing Semester by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/semesters/{semester}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/semesters/{semester}",
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
`PUT api/semesters/{semester}`

`PATCH api/semesters/{semester}`


<!-- END_5a2c97a3c1aef2662a46127990470eb4 -->

<!-- START_be7aac52984c7891ac2aa54ef98411bb -->
## Delete Semester

Removes a Semester from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Semester belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/semesters/{semester}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/semesters/{semester}",
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
`DELETE api/semesters/{semester}`


<!-- END_be7aac52984c7891ac2aa54ef98411bb -->

<!-- START_aa96d971126700d18dab3dfd9aa73bfe -->
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
curl -X GET "http://localhost:8000/api/chargeable-services" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeable-services",
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
[
    {
        "id": 1,
        "type": "App\\Models\\Semester",
        "name": "1st Semester Fees",
        "description": null,
        "amount": "500.00",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "type": "App\\Models\\Semester",
        "name": "2nd Semester Fees",
        "description": null,
        "amount": "500.00",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "type": "App\\Models\\Session",
        "name": "2018\/2019 Fees",
        "description": null,
        "amount": "1000.00",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "type": "App\\Models\\Session",
        "name": "2019\/2020 Fees",
        "description": null,
        "amount": "1000.00",
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/chargeable-services`

`HEAD api/chargeable-services`


<!-- END_aa96d971126700d18dab3dfd9aa73bfe -->

<!-- START_e1b07ddf84249cd4ddc849aaef01f0cf -->
## Create Chargeable Service

Supply chargeable service information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable Service belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/chargeable-services" \
-H "Accept: application/json" \
    -d "school_id"="5" \
    -d "type"="App\Models\Semester" \
    -d "name"="explicabo" \
    -d "description"="explicabo" \
    -d "amount"="203778426" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeable-services",
    "method": "POST",
    "data": {
        "school_id": 5,
        "type": "App\\Models\\Semester",
        "name": "explicabo",
        "description": "explicabo",
        "amount": 203778426
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
`POST api/chargeable-services`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    school_id | numeric |  required  | Valid school id
    type | string |  required  | `App\Models\Semester` or `App\Models\Session`
    name | string |  required  | 
    description | string |  optional  | 
    amount | numeric |  required  | Minimum: `0`

<!-- END_e1b07ddf84249cd4ddc849aaef01f0cf -->

<!-- START_7397402ccc42b1248bacc1cc1601a45c -->
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
curl -X GET "http://localhost:8000/api/chargeable-services/{chargeable_service}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeable-services/{chargeable_service}",
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
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/chargeable-services/{chargeable_service}`

`HEAD api/chargeable-services/{chargeable_service}`


<!-- END_7397402ccc42b1248bacc1cc1601a45c -->

<!-- START_a0349fd655f3c3a4040c456eff5e7d23 -->
## Update Chargeable Service

Modify information about an existing Chargeable Service by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable Service belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/chargeable-services/{chargeable_service}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeable-services/{chargeable_service}",
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
`PUT api/chargeable-services/{chargeable_service}`

`PATCH api/chargeable-services/{chargeable_service}`


<!-- END_a0349fd655f3c3a4040c456eff5e7d23 -->

<!-- START_be22584d774050d980d3ac84655898a1 -->
## Delete Chargeable Service

Removes a Chargeable Service from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable Service belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/chargeable-services/{chargeable_service}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeable-services/{chargeable_service}",
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
`DELETE api/chargeable-services/{chargeable_service}`


<!-- END_be22584d774050d980d3ac84655898a1 -->

<!-- START_08297040d81b9ceb7027a8e1b9e5f028 -->
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
curl -X GET "http://localhost:8000/api/chargeables" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeables",
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
[
    {
        "id": 1,
        "chargeable_service_id": 1,
        "owner_id": 1,
        "amount": "500.00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "chargeable_service_id": 2,
        "owner_id": 2,
        "amount": "500.00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "chargeable_service_id": 3,
        "owner_id": 1,
        "amount": "1000.00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "chargeable_service_id": 1,
        "owner_id": 3,
        "amount": "500.00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 5,
        "chargeable_service_id": 2,
        "owner_id": 4,
        "amount": "500.00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 6,
        "chargeable_service_id": 4,
        "owner_id": 2,
        "amount": "1000.00",
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/chargeables`

`HEAD api/chargeables`


<!-- END_08297040d81b9ceb7027a8e1b9e5f028 -->

<!-- START_46130962643824b6bc2f0d290a53d9bb -->
## Create Chargeable

Supply chargeable information to create a new one
- Rules of Access
 - User can view Chargeable Service and
 - User can update the owner of the Chargeable (See Chargeable Model)

> Example request:

```bash
curl -X POST "http://localhost:8000/api/chargeables" \
-H "Accept: application/json" \
    -d "chargeable_service_id"="340" \
    -d "owner_id"="340" \
    -d "amount"="340" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeables",
    "method": "POST",
    "data": {
        "chargeable_service_id": 340,
        "owner_id": 340,
        "amount": 340
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
`POST api/chargeables`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    chargeable_service_id | numeric |  required  | Valid chargeable_service id
    owner_id | numeric |  required  | 
    amount | numeric |  optional  | 

<!-- END_46130962643824b6bc2f0d290a53d9bb -->

<!-- START_e34b83e52ba197fe6fcf816897aaf7be -->
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
curl -X GET "http://localhost:8000/api/chargeables/{chargeable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeables/{chargeable}",
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
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/chargeables/{chargeable}`

`HEAD api/chargeables/{chargeable}`


<!-- END_e34b83e52ba197fe6fcf816897aaf7be -->

<!-- START_21e225bf3a11542643d736eb6f316e57 -->
## Update Chargeable

Modify information about an existing chargeable by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/chargeables/{chargeable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeables/{chargeable}",
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
`PUT api/chargeables/{chargeable}`

`PATCH api/chargeables/{chargeable}`


<!-- END_21e225bf3a11542643d736eb6f316e57 -->

<!-- START_e5467f78255bdb6ad94f992dc0a80d92 -->
## Delete Chargeable

Removes a Chargeable from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Chargeable belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/chargeables/{chargeable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/chargeables/{chargeable}",
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
`DELETE api/chargeables/{chargeable}`


<!-- END_e5467f78255bdb6ad94f992dc0a80d92 -->

<!-- START_55420e506d54d905a525ce1c8e5c9aff -->
## Get Program Credits

Responds with a list of Program Credits
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/program-credits" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/program-credits",
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
[
    {
        "id": 1,
        "program_id": 1,
        "semester_id": 1,
        "level_id": 1,
        "credit": 21,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "program_id": 1,
        "semester_id": 1,
        "level_id": 2,
        "credit": 21,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "program_id": 1,
        "semester_id": 1,
        "level_id": 3,
        "credit": 19,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "program_id": 1,
        "semester_id": 1,
        "level_id": 4,
        "credit": 22,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/program-credits`

`HEAD api/program-credits`


<!-- END_55420e506d54d905a525ce1c8e5c9aff -->

<!-- START_34661629a823a0e38c8f67c82d416717 -->
## Create Program Credit

Supply Program Credit information to create a new one
- Rules of Access
 - User can update program
 = User can update semester
 - User can update level

> Example request:

```bash
curl -X POST "http://localhost:8000/api/program-credits" \
-H "Accept: application/json" \
    -d "program_id"="308341321" \
    -d "semester_id"="308341321" \
    -d "level_id"="308341321" \
    -d "credit"="308341321" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/program-credits",
    "method": "POST",
    "data": {
        "program_id": 308341321,
        "semester_id": 308341321,
        "level_id": 308341321,
        "credit": 308341321
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
`POST api/program-credits`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    program_id | numeric |  required  | Valid program id
    semester_id | numeric |  required  | Valid semester id
    level_id | numeric |  required  | Valid level id
    credit | numeric |  required  | 

<!-- END_34661629a823a0e38c8f67c82d416717 -->

<!-- START_6fee6da26606a09d3bfb6b43dd54322e -->
## Get Program Credit by ID

Responds with a specific Program Credit by its ID
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/program-credits/{program_credit}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/program-credits/{program_credit}",
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
    "credit": 21,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/program-credits/{program_credit}`

`HEAD api/program-credits/{program_credit}`


<!-- END_6fee6da26606a09d3bfb6b43dd54322e -->

<!-- START_afce5fc61fd2c81371cf72ca1b235389 -->
## Update Program Credit

Modify information about an existing Program Credit by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program Credit belongs to
 - User is Dean of Program Credit's faculty
 - User is HOD of Program Credit's department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/program-credits/{program_credit}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/program-credits/{program_credit}",
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
`PUT api/program-credits/{program_credit}`

`PATCH api/program-credits/{program_credit}`


<!-- END_afce5fc61fd2c81371cf72ca1b235389 -->

<!-- START_ed068da7a7370917198af3dc3f81d01b -->
## Delete Program Credit

Removes a Program Credut from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Program Credit belongs to
 - User is Dean of Program Credit's faculty
 - User is HOD of Program Credit's department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/program-credits/{program_credit}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/program-credits/{program_credit}",
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
`DELETE api/program-credits/{program_credit}`


<!-- END_ed068da7a7370917198af3dc3f81d01b -->

<!-- START_edd68da971fd2ec2a99042b6bcadd933 -->
## Get Payables

Responds with a list of Payables
- Rules of Access
  - User owns Payable or
  - User can update school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/payables" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/payables",
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
[]
```

### HTTP Request
`GET api/payables`

`HEAD api/payables`


<!-- END_edd68da971fd2ec2a99042b6bcadd933 -->

<!-- START_763e1546d1b06004e9085b3944e2d792 -->
## Create Payable

Supply Payable information to create a new one
- Rules of Access
 - User can view school and
 - User can update the user that owns the payable

> Example request:

```bash
curl -X POST "http://localhost:8000/api/payables" \
-H "Accept: application/json" \
    -d "chargeable_id"="2816266" \
    -d "user_id"="2816266" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/payables",
    "method": "POST",
    "data": {
        "chargeable_id": 2816266,
        "user_id": 2816266
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
`POST api/payables`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    chargeable_id | numeric |  required  | Valid chargeable id
    user_id | numeric |  optional  | Valid user id

<!-- END_763e1546d1b06004e9085b3944e2d792 -->

<!-- START_d38fdbb665badd91021de0e2d3a90827 -->
## Get Payable by ID

Responds with a specific Payable by its ID
- Rules of Access
  - User owns Payable or
  - User can update school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/payables/{payable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/payables/{payable}",
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
    "message": "No query results for model [App\\Models\\Payable] 1",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 199,
    "trace": [
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 175,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Exceptions\/Handler.php",
            "line": 49,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 68,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 83,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 32,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Http\/Middleware\/AccessTokenSecurity.php",
            "line": 32,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "App\\Http\\Middleware\\AccessTokenSecurity",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 667,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 642,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 608,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 597,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 51,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 116,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/AbstractGenerator.php",
            "line": 98,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 58,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 261,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 83,
            "function": "processLaravelRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 199,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Console\/Commands\/GenerateDocsCommand.php",
            "line": 57,
            "function": "call",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "App\\Console\\Commands\\GenerateDocsCommand",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/payables/{payable}`

`HEAD api/payables/{payable}`


<!-- END_d38fdbb665badd91021de0e2d3a90827 -->

<!-- START_3e697670b1fba43d301a779e861b061c -->
## Update Payable

Modify information about an existing Payable by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Payable belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/payables/{payable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/payables/{payable}",
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
`PUT api/payables/{payable}`

`PATCH api/payables/{payable}`


<!-- END_3e697670b1fba43d301a779e861b061c -->

<!-- START_bab52c4f8ecbc00955178a2df2c47890 -->
## Delete Payable

Removes a Payable from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Payable belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/payables/{payable}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/payables/{payable}",
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
`DELETE api/payables/{payable}`


<!-- END_bab52c4f8ecbc00955178a2df2c47890 -->

<!-- START_4914b6fc3b249654255764a9a371dc37 -->
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
curl -X GET "http://localhost:8000/api/course-dependencies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/course-dependencies",
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
[
    {
        "id": 1,
        "course_id": 5,
        "dependency_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 2,
        "course_id": 5,
        "dependency_id": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 3,
        "course_id": 5,
        "dependency_id": 3,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 4,
        "course_id": 5,
        "dependency_id": 4,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 5,
        "course_id": 6,
        "dependency_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 6,
        "course_id": 6,
        "dependency_id": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 7,
        "course_id": 6,
        "dependency_id": 3,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 8,
        "course_id": 6,
        "dependency_id": 4,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 9,
        "course_id": 7,
        "dependency_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 10,
        "course_id": 7,
        "dependency_id": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 11,
        "course_id": 7,
        "dependency_id": 3,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 12,
        "course_id": 7,
        "dependency_id": 4,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 13,
        "course_id": 8,
        "dependency_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 14,
        "course_id": 8,
        "dependency_id": 2,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    },
    {
        "id": 15,
        "course_id": 8,
        "dependency_id": 3,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
]
```

### HTTP Request
`GET api/course-dependencies`

`HEAD api/course-dependencies`


<!-- END_4914b6fc3b249654255764a9a371dc37 -->

<!-- START_8a27f60a8595484fe955148e4ac9e68c -->
## Create Course Dependency

Supply Course information to create a new one
- Rules of Access
 - User can update course and
 - User can update dependency

> Example request:

```bash
curl -X POST "http://localhost:8000/api/course-dependencies" \
-H "Accept: application/json" \
    -d "course_id"="46193" \
    -d "dependency_id"="46193" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/course-dependencies",
    "method": "POST",
    "data": {
        "course_id": 46193,
        "dependency_id": 46193
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
`POST api/course-dependencies`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    course_id | numeric |  required  | Valid course id Must have a different value than parameter: `dependency_id`
    dependency_id | numeric |  required  | Valid course id Must have a different value than parameter: `course_id`

<!-- END_8a27f60a8595484fe955148e4ac9e68c -->

<!-- START_d6b05ca96d920d98cda017f6996574ae -->
## Get Course Dependency by ID

Responds with a specific Course Dependency by its ID
- Rules of Access
  - User is in the same school
- Filters
  - ?with_course
  - ?with_dependency

> Example request:

```bash
curl -X GET "http://localhost:8000/api/course-dependencies/{course_dependency}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/course-dependencies/{course_dependency}",
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
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48"
}
```

### HTTP Request
`GET api/course-dependencies/{course_dependency}`

`HEAD api/course-dependencies/{course_dependency}`


<!-- END_d6b05ca96d920d98cda017f6996574ae -->

<!-- START_d625019fc2242f0c9ddfbe0da6a8a1db -->
## Update Course Dependency

Modifies information about an existing Course Dependency
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course and Dependency belongs to or
 - User is Dean of Faculty the Course and Dependency belongs to or
 - User is HOD of Department the Course and Dependency belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/course-dependencies/{course_dependency}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/course-dependencies/{course_dependency}",
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
`PUT api/course-dependencies/{course_dependency}`

`PATCH api/course-dependencies/{course_dependency}`


<!-- END_d625019fc2242f0c9ddfbe0da6a8a1db -->

<!-- START_686bdc126cc45e49bd53a09946a40e01 -->
## Delete Course Dependency

Removes a Course Dependency from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Course and Dependency belongs to or
 - User is Dean of Faculty the Course and Dependency belongs to or
 - User is HOD of Department the Course and Dependency belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/course-dependencies/{course_dependency}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/course-dependencies/{course_dependency}",
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
`DELETE api/course-dependencies/{course_dependency}`


<!-- END_686bdc126cc45e49bd53a09946a40e01 -->

<!-- START_a71d314809ab17f1ba7047d7bfd8c60e -->
## Get Staff-Teach-Course List

Responds with a list of Staff-Teach-Course info
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/staff-courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff-courses",
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
[]
```

### HTTP Request
`GET api/staff-courses`

`HEAD api/staff-courses`


<!-- END_a71d314809ab17f1ba7047d7bfd8c60e -->

<!-- START_a58eca23a72b67ca1e5efbe42c9743b2 -->
## Create Staff-Teach-Course

Supply Staff-Teach-Course information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is a SCHOOL_OWNER or DEAN of HOD in staff-teach-course's school and
 - User can update course

> Example request:

```bash
curl -X POST "http://localhost:8000/api/staff-courses" \
-H "Accept: application/json" \
    -d "staff_id"="296676" \
    -d "course_id"="296676" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff-courses",
    "method": "POST",
    "data": {
        "staff_id": 296676,
        "course_id": 296676
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
`POST api/staff-courses`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    staff_id | numeric |  required  | Valid staff id
    course_id | numeric |  required  | Valid course id

<!-- END_a58eca23a72b67ca1e5efbe42c9743b2 -->

<!-- START_ebe949caba68633343fae8cae0f825f8 -->
## Get Staff-Teach-Course Info by ID

Responds with a specific Staff-Teach-Course by its ID
- Rules of Access
  - User is same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/staff-courses/{staff_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff-courses/{staff_course}",
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
    "message": "No query results for model [App\\Models\\StaffTeachCourse] 1",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 199,
    "trace": [
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 175,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Exceptions\/Handler.php",
            "line": 49,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 68,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 83,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 32,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Http\/Middleware\/AccessTokenSecurity.php",
            "line": 32,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "App\\Http\\Middleware\\AccessTokenSecurity",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 667,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 642,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 608,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 597,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 51,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 116,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/AbstractGenerator.php",
            "line": 98,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 58,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 261,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 83,
            "function": "processLaravelRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 199,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Console\/Commands\/GenerateDocsCommand.php",
            "line": 57,
            "function": "call",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "App\\Console\\Commands\\GenerateDocsCommand",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/staff-courses/{staff_course}`

`HEAD api/staff-courses/{staff_course}`


<!-- END_ebe949caba68633343fae8cae0f825f8 -->

<!-- START_e9d9055c557a5a245971126b3658e3e6 -->
## Update Staff-Teach-Course

Modify information about an existing Staff-Teach-Course by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/staff-courses/{staff_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff-courses/{staff_course}",
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
`PUT api/staff-courses/{staff_course}`

`PATCH api/staff-courses/{staff_course}`


<!-- END_e9d9055c557a5a245971126b3658e3e6 -->

<!-- START_4de8beb7ab9d568bdf31e3e80a8a1e8a -->
## Delete Staff-Teach-Course

Removes a Staff-Teach-Course entry from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/staff-courses/{staff_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/staff-courses/{staff_course}",
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
`DELETE api/staff-courses/{staff_course}`


<!-- END_4de8beb7ab9d568bdf31e3e80a8a1e8a -->

<!-- START_ac87a33c02c4746d533388a04841e162 -->
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
curl -X GET "http://localhost:8000/api/student-courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/student-courses",
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
[]
```

### HTTP Request
`GET api/student-courses`

`HEAD api/student-courses`


<!-- END_ac87a33c02c4746d533388a04841e162 -->

<!-- START_ca1a13663540fbb23d794fcb760a7734 -->
## Create Student-Takes-Course

Supply Student-Takes-Course information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is a SCHOOL_OWNER or DEAN of HOD in school and or
 - User is student

> Example request:

```bash
curl -X POST "http://localhost:8000/api/student-courses" \
-H "Accept: application/json" \
    -d "student_id"="11534" \
    -d "staff_teach_course_id"="11534" \
    -d "semester_id"="11534" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/student-courses",
    "method": "POST",
    "data": {
        "student_id": 11534,
        "staff_teach_course_id": 11534,
        "semester_id": 11534
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
`POST api/student-courses`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    student_id | numeric |  required  | Valid student id
    staff_teach_course_id | numeric |  required  | Valid staff_teach_course id
    semester_id | numeric |  required  | Valid semester id

<!-- END_ca1a13663540fbb23d794fcb760a7734 -->

<!-- START_4adb12413ed978cfe991f6a4bd44b0fa -->
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
curl -X GET "http://localhost:8000/api/student-courses/{student_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/student-courses/{student_course}",
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
    "message": "No query results for model [App\\Models\\StudentTakesCourse] 1",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 199,
    "trace": [
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 175,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Exceptions\/Handler.php",
            "line": 49,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 68,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 83,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 32,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Http\/Middleware\/AccessTokenSecurity.php",
            "line": 32,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "App\\Http\\Middleware\\AccessTokenSecurity",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 667,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 642,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 608,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 597,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 51,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 116,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/AbstractGenerator.php",
            "line": 98,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 58,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 261,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 83,
            "function": "processLaravelRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 199,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Console\/Commands\/GenerateDocsCommand.php",
            "line": 57,
            "function": "call",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "App\\Console\\Commands\\GenerateDocsCommand",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/student-courses/{student_course}`

`HEAD api/student-courses/{student_course}`


<!-- END_4adb12413ed978cfe991f6a4bd44b0fa -->

<!-- START_1dc105420186107b91af85f25379d512 -->
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
curl -X PUT "http://localhost:8000/api/student-courses/{student_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/student-courses/{student_course}",
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
`PUT api/student-courses/{student_course}`

`PATCH api/student-courses/{student_course}`


<!-- END_1dc105420186107b91af85f25379d512 -->

<!-- START_d6020f0b1dfa65a706e9380ed1d6baa3 -->
## Delete Student-Takes-Course

Removes a Student-Takes-Course entry from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school or
 - User is a Dean in faculty or
 - User is an HOD in department

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/student-courses/{student_course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/student-courses/{student_course}",
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
`DELETE api/student-courses/{student_course}`


<!-- END_d6020f0b1dfa65a706e9380ed1d6baa3 -->

<!-- START_7dc51eaf7038fbe62db0659e67c9d876 -->
## Get Grade Types

Responds with a list of Grades in school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/grade-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/grade-types",
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
[]
```

### HTTP Request
`GET api/schools/{school_id}/grade-types`

`HEAD api/schools/{school_id}/grade-types`


<!-- END_7dc51eaf7038fbe62db0659e67c9d876 -->

<!-- START_698001f792aea9502012002aaa216531 -->
## Create Grade Type

Supply Grade Type information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User is the school owner

> Example request:

```bash
curl -X POST "http://localhost:8000/api/schools/{school_id}/grade-types" \
-H "Accept: application/json" \
    -d "name"="id" \
    -d "value"="74" \
    -d "minimum"="74" \
    -d "maximum"="74" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/grade-types",
    "method": "POST",
    "data": {
        "name": "id",
        "value": 74,
        "minimum": 74,
        "maximum": 74
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
`POST api/schools/{school_id}/grade-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    value | numeric |  required  | Minimum: `0` Maximum: `100`
    minimum | numeric |  required  | Minimum: `0` Maximum: `100`
    maximum | numeric |  required  | Minimum: `0` Maximum: `100`

<!-- END_698001f792aea9502012002aaa216531 -->

<!-- START_50d38b7ebc96ec0209d69bc4f5ca9448 -->
## Get Grade Type by ID

Responds with a specific Grade by its ID

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/grade-types/{grade_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/grade-types/{grade_type}",
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
    "name": "Obafemi Awolowo University",
    "short_name": "OAU",
    "owner_id": 1,
    "is_active": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48",
    "pivot": {
        "user_id": 1,
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
}
```

### HTTP Request
`GET api/schools/{school_id}/grade-types/{grade_type}`

`HEAD api/schools/{school_id}/grade-types/{grade_type}`


<!-- END_50d38b7ebc96ec0209d69bc4f5ca9448 -->

<!-- START_6fc2d63f475b83a2a62c507c3f84f92d -->
## Update Grade Type

Modify information about an existing Grade Type by ID
- Rules of Access
 - User is an ADMIN or
 - User is the school owner

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/schools/{school_id}/grade-types/{grade_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/grade-types/{grade_type}",
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
`PUT api/schools/{school_id}/grade-types/{grade_type}`

`PATCH api/schools/{school_id}/grade-types/{grade_type}`


<!-- END_6fc2d63f475b83a2a62c507c3f84f92d -->

<!-- START_abc2997440ba7652a37f01c2dbb28264 -->
## Delete Grade Type

Removes a Grade Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User is the school owner

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/schools/{school_id}/grade-types/{grade_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/grade-types/{grade_type}",
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
`DELETE api/schools/{school_id}/grade-types/{grade_type}`


<!-- END_abc2997440ba7652a37f01c2dbb28264 -->

<!-- START_104e56ec1fad9ec0ebc1fb4f6d8669d5 -->
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
curl -X GET "http://localhost:8000/api/grades" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/grades",
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
[]
```

### HTTP Request
`GET api/grades`

`HEAD api/grades`


<!-- END_104e56ec1fad9ec0ebc1fb4f6d8669d5 -->

<!-- START_9f50be565ddcc025ae53490cb389fcf3 -->
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
curl -X POST "http://localhost:8000/api/grades" \
-H "Accept: application/json" \
    -d "student_takes_course_id"="9" \
    -d "score"="9" \
    -d "description"="veritatis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/grades",
    "method": "POST",
    "data": {
        "student_takes_course_id": 9,
        "score": 9,
        "description": "veritatis"
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
`POST api/grades`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    student_takes_course_id | numeric |  required  | Valid student_takes_course id
    score | numeric |  required  | 
    description | string |  required  | 

<!-- END_9f50be565ddcc025ae53490cb389fcf3 -->

<!-- START_86d1fca55166d3372052405f07168010 -->
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
curl -X GET "http://localhost:8000/api/grades/{grade}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/grades/{grade}",
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
    "message": "No query results for model [App\\Models\\Grade] 1",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 199,
    "trace": [
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 175,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Exceptions\/Handler.php",
            "line": 49,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 68,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 83,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 32,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Http\/Middleware\/AccessTokenSecurity.php",
            "line": 32,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "App\\Http\\Middleware\\AccessTokenSecurity",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 667,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 642,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 608,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 597,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 51,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 116,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/AbstractGenerator.php",
            "line": 98,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 58,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 261,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 83,
            "function": "processLaravelRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 199,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Console\/Commands\/GenerateDocsCommand.php",
            "line": 57,
            "function": "call",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "App\\Console\\Commands\\GenerateDocsCommand",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/grades/{grade}`

`HEAD api/grades/{grade}`


<!-- END_86d1fca55166d3372052405f07168010 -->

<!-- START_537f328ab71323d12b5527a5f4b652e7 -->
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
curl -X PUT "http://localhost:8000/api/grades/{grade}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/grades/{grade}",
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
`PUT api/grades/{grade}`

`PATCH api/grades/{grade}`


<!-- END_537f328ab71323d12b5527a5f4b652e7 -->

<!-- START_047f19e1a3acfe078665f687d45f8a59 -->
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
curl -X DELETE "http://localhost:8000/api/grades/{grade}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/grades/{grade}",
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
`DELETE api/grades/{grade}`


<!-- END_047f19e1a3acfe078665f687d45f8a59 -->

<!-- START_9d84e1b061be7d13bf8c370c7c771e01 -->
## Get Image Types

Responds with a list of Image Types
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/image-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/image-types",
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
[]
```

### HTTP Request
`GET api/schools/{school_id}/image-types`

`HEAD api/schools/{school_id}/image-types`


<!-- END_9d84e1b061be7d13bf8c370c7c771e01 -->

<!-- START_d102f534c84e974581acf8ec68beecfa -->
## Create Image Type

Supply Image Type information to create a new one
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/schools/{school_id}/image-types" \
-H "Accept: application/json" \
    -d "type"="facere" \
    -d "name"="facere" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/image-types",
    "method": "POST",
    "data": {
        "type": "facere",
        "name": "facere"
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
`POST api/schools/{school_id}/image-types`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  required  | 
    name | string |  required  | 

<!-- END_d102f534c84e974581acf8ec68beecfa -->

<!-- START_7b1d3f22ce106162fbf0781f636eb512 -->
## Get Image Type by ID

Responds with a specific Image Type by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/schools/{school_id}/image-types/{image_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/image-types/{image_type}",
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
    "name": "Obafemi Awolowo University",
    "short_name": "OAU",
    "owner_id": 1,
    "is_active": 1,
    "created_at": "2018-07-07 14:17:48",
    "updated_at": "2018-07-07 14:17:48",
    "pivot": {
        "user_id": 1,
        "school_id": 1,
        "created_at": "2018-07-07 14:17:48",
        "updated_at": "2018-07-07 14:17:48"
    }
}
```

### HTTP Request
`GET api/schools/{school_id}/image-types/{image_type}`

`HEAD api/schools/{school_id}/image-types/{image_type}`


<!-- END_7b1d3f22ce106162fbf0781f636eb512 -->

<!-- START_446612946ac234409478ab27e293a7b1 -->
## Update Image Type

Modify information about an existing Image Type by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/schools/{school_id}/image-types/{image_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/image-types/{image_type}",
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
`PUT api/schools/{school_id}/image-types/{image_type}`

`PATCH api/schools/{school_id}/image-types/{image_type}`


<!-- END_446612946ac234409478ab27e293a7b1 -->

<!-- START_3cca85be723315a5e37efe70a7382b25 -->
## Delete Image Type

Removes a Image Type from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/schools/{school_id}/image-types/{image_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/schools/{school_id}/image-types/{image_type}",
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
`DELETE api/schools/{school_id}/image-types/{image_type}`


<!-- END_3cca85be723315a5e37efe70a7382b25 -->

<!-- START_2d5802b9c2bdbdccf4a58da17f23a7f1 -->
## Get Images

Responds with a list of Images
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/images" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/images",
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
[]
```

### HTTP Request
`GET api/images`

`HEAD api/images`


<!-- END_2d5802b9c2bdbdccf4a58da17f23a7f1 -->

<!-- START_204613676cab89a55dfdc7d81f16a281 -->
## Create Image

Supply Image information to create a new one
- Rules of Access
 - User can view image type and
 - User can update image owner

> Example request:

```bash
curl -X POST "http://localhost:8000/api/images" \
-H "Accept: application/json" \
    -d "owner_id"="6146694" \
    -d "image_type_id"="6146694" \
    -d "file"="placeat" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/images",
    "method": "POST",
    "data": {
        "owner_id": 6146694,
        "image_type_id": 6146694,
        "file": "placeat"
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
`POST api/images`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    owner_id | numeric |  required  | 
    image_type_id | numeric |  required  | Valid image_type id
    file | image |  required  | Must be an image (jpeg, png, bmp, gif, or svg)

<!-- END_204613676cab89a55dfdc7d81f16a281 -->

<!-- START_67424e745d978355538c7df809cf57ad -->
## Get Image by ID

Responds with a specific Image by its ID
- Rules of Access
  - User is in the same school

> Example request:

```bash
curl -X GET "http://localhost:8000/api/images/{image}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/images/{image}",
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
    "message": "No query results for model [App\\Models\\Image] 1",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 199,
    "trace": [
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 175,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Exceptions\/Handler.php",
            "line": 49,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 68,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 83,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 32,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Http\/Middleware\/AccessTokenSecurity.php",
            "line": 32,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "App\\Http\\Middleware\\AccessTokenSecurity",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 667,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 642,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 608,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 597,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 51,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 116,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/AbstractGenerator.php",
            "line": 98,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Generators\/LaravelGenerator.php",
            "line": 58,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 261,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Mpociot\/ApiDoc\/Commands\/GenerateDocumentation.php",
            "line": 83,
            "function": "processLaravelRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 199,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/app\/Console\/Commands\/GenerateDocsCommand.php",
            "line": 57,
            "function": "call",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "App\\Console\\Commands\\GenerateDocsCommand",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 184,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 171,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/seniortechnicalconsultant\/Dev\/websites\/zaportal\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/images/{image}`

`HEAD api/images/{image}`


<!-- END_67424e745d978355538c7df809cf57ad -->

<!-- START_663d256882d5392cfe487383a4e8703e -->
## Update Image

Modify information about an existing Image by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/images/{image}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/images/{image}",
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
`PUT api/images/{image}`

`PATCH api/images/{image}`


<!-- END_663d256882d5392cfe487383a4e8703e -->

<!-- START_f39af5b4ed09dfc1cd00fcaa2c6ecce2 -->
## Delete Image

Removes a Image from the System by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/images/{image}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/images/{image}",
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
`DELETE api/images/{image}`


<!-- END_f39af5b4ed09dfc1cd00fcaa2c6ecce2 -->

<!-- START_dac5bb3acabf927a0dc93b1193419363 -->
## Update Image

Modify information about an existing Image by ID
- Rules of Access
 - User is an ADMIN or
 - User owns school the Image belongs to

> Example request:

```bash
curl -X POST "http://localhost:8000/api/images/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/images/{id}",
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
`POST api/images/{id}`


<!-- END_dac5bb3acabf927a0dc93b1193419363 -->

