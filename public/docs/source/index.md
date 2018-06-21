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
[Get Postman Collection](http://zaportal.dev/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_5ef90dd4846f0d2902b89354bf5c42bb -->
## api/auth

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/auth" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/auth",
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
## api/user

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/user",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->

<!-- START_e51aeda29969b51e7035a2b96d978ef3 -->
## api/schools

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/schools" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/schools`

`HEAD api/schools`


<!-- END_e51aeda29969b51e7035a2b96d978ef3 -->

<!-- START_d290b49f6ab037b29f928b0181113d60 -->
## api/schools

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/schools" \
-H "Accept: application/json" \
    -d "name"="assumenda" \
    -d "short_name"="assumenda" \
    -d "is_active"="0" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools",
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
## api/schools/{school}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/schools/{school}`

`HEAD api/schools/{school}`


<!-- END_862296e54f319c85cabc63651980e5de -->

<!-- START_85e6256a1bed7221faf44b3f695d2cb0 -->
## api/schools/{school}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school}",
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
## api/schools/{school}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/schools/{school}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school}",
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
## api/users

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/users",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## api/users

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/users" \
-H "Accept: application/json" \
    -d "first_name"="ut" \
    -d "last_name"="ut" \
    -d "email"="nakia.mcclure@example.org" \
    -d "password"="ut" \
    -d "dob"="1986-10-19" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/users",
    "method": "POST",
    "data": {
        "first_name": "ut",
        "last_name": "ut",
        "email": "nakia.mcclure@example.org",
        "password": "ut",
        "dob": "1986-10-19"
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
## api/users/{user}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/users/{user}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## api/users/{user}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/users/{user}",
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
## api/users/{user}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/users/{user}",
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
## api/faculties

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/faculties",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/faculties`

`HEAD api/faculties`


<!-- END_0151899c6cc8923a22b32cbfb1d662aa -->

<!-- START_3d82dcd0fb3f2c54d0822c0296209190 -->
## api/faculties

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/faculties" \
-H "Accept: application/json" \
    -d "name"="sed" \
    -d "school_id"="25" \
    -d "dean_id"="25" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/faculties",
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
## api/faculties/{faculty}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/faculties/{faculty}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/faculties/{faculty}`

`HEAD api/faculties/{faculty}`


<!-- END_81ed220a7e8f733c1b8ef9150c0eea2b -->

<!-- START_cd906852e526fae660e2dd28c177318b -->
## api/faculties/{faculty}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/faculties/{faculty}",
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
## api/faculties/{faculty}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/faculties/{faculty}",
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
## api/departments

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/departments" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/departments",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/departments`

`HEAD api/departments`


<!-- END_2a2bd5f635421bebeab28f82894cfdaa -->

<!-- START_b002b7c6ad7a3a78a8d833aed62c535e -->
## api/departments

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/departments" \
-H "Accept: application/json" \
    -d "name"="dolorum" \
    -d "hod_id"="487700" \
    -d "faculty_id"="487700" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/departments",
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
## api/departments/{department}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/departments/{department}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/departments/{department}`

`HEAD api/departments/{department}`


<!-- END_987c0aa639e88c0aad48c5924fc5ad5f -->

<!-- START_699b52fb4bcae66f8ebd1b94d43840b3 -->
## api/departments/{department}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/departments/{department}",
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
## api/departments/{department}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/departments/{department}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/departments/{department}",
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
## api/programs

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/programs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/programs",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/programs`

`HEAD api/programs`


<!-- END_e75eb1d616a7c047f8e23de26a73eae9 -->

<!-- START_f23415d8a8c84bb895710ecc0b704704 -->
## api/programs

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/programs" \
-H "Accept: application/json" \
    -d "name"="et" \
    -d "department_id"="18670618" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/programs",
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
## api/programs/{program}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/programs/{program}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/programs/{program}`

`HEAD api/programs/{program}`


<!-- END_86d53e9643d43f01a320bf290a1bf1f6 -->

<!-- START_d005858bc6b7b52ffe5a56bb184310bd -->
## api/programs/{program}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/programs/{program}",
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
## api/programs/{program}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/programs/{program}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/programs/{program}",
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
## api/schools/{school_id}/levels

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/schools/{school_id}/levels" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/levels",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/schools/{school_id}/levels`

`HEAD api/schools/{school_id}/levels`


<!-- END_93cdf9b2f9623052a54b92ab126b0613 -->

<!-- START_a25ccd3f64819ae565d1984f65208097 -->
## api/schools/{school_id}/levels

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/schools/{school_id}/levels" \
-H "Accept: application/json" \
    -d "name"="eos" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/levels",
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
## api/schools/{school_id}/levels/{level}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/levels/{level}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/schools/{school_id}/levels/{level}`

`HEAD api/schools/{school_id}/levels/{level}`


<!-- END_d02823935f7591612a419a2a09ed4cd3 -->

<!-- START_f4d441f9577cc5154603c1f0f6798b65 -->
## api/schools/{school_id}/levels/{level}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/levels/{level}",
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
## api/schools/{school_id}/levels/{level}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/schools/{school_id}/levels/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/levels/{level}",
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
## api/students

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/students" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/students",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/students`

`HEAD api/students`


<!-- END_e22068e5b34cd9ff059322f3a3ec5c2e -->

<!-- START_058e6d0cac82649086bbc06fe88fd040 -->
## api/students

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/students" \
-H "Accept: application/json" \
    -d "user_id"="10295" \
    -d "program_id"="10295" \
    -d "matric_no"="sed" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/students",
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
## api/students/{student}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/students/{student}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/students/{student}`

`HEAD api/students/{student}`


<!-- END_0312bb71e4bdd9469395fd583d93f3c4 -->

<!-- START_f4798a6166743436fe98df7c0a10ea60 -->
## api/students/{student}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/students/{student}",
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
## api/students/{student}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/students/{student}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/students/{student}",
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
## api/courses

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/courses",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/courses`

`HEAD api/courses`


<!-- END_38f650806a828403a7b131016b537617 -->

<!-- START_7adfcfdea10d30f89cf1c74a69c31361 -->
## api/courses

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/courses" \
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
    "url": "http://zaportal.dev/api/courses",
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
## api/courses/{course}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/courses/{course}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/courses/{course}`

`HEAD api/courses/{course}`


<!-- END_8689ce8f09e81fcaee386cfbd8e265cd -->

<!-- START_bb5a98f4f88ceacd9c6cef8cf663b402 -->
## api/courses/{course}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/courses/{course}",
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
## api/courses/{course}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/courses/{course}",
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
## api/schools/{school_id}/semester-types

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/schools/{school_id}/semester-types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/semester-types",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/schools/{school_id}/semester-types`

`HEAD api/schools/{school_id}/semester-types`


<!-- END_86c98e828da326493a503b9fc2efe542 -->

<!-- START_e9af71bfe9c11e7cac6f3f8729da915f -->
## api/schools/{school_id}/semester-types

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/schools/{school_id}/semester-types" \
-H "Accept: application/json" \
    -d "name"="non" \
    -d "school_id"="93" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/semester-types",
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
## api/schools/{school_id}/semester-types/{semester_type}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/semester-types/{semester_type}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/schools/{school_id}/semester-types/{semester_type}`

`HEAD api/schools/{school_id}/semester-types/{semester_type}`


<!-- END_5e16b99ca1a0ee860aff7066eaeb3d0b -->

<!-- START_ef0c2c212cd1cb064424ab9cbf98a76f -->
## api/schools/{school_id}/semester-types/{semester_type}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/semester-types/{semester_type}",
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
## api/schools/{school_id}/semester-types/{semester_type}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/schools/{school_id}/semester-types/{semester_type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/schools/{school_id}/semester-types/{semester_type}",
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
## api/staff

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/staff" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/staff",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/staff`

`HEAD api/staff`


<!-- END_adb73d4f224601ea718940e6bb97c778 -->

<!-- START_cde1a268ad4879413936f91d73a540bc -->
## api/staff

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/staff" \
-H "Accept: application/json" \
    -d "department_id"="6953" \
    -d "user_id"="6953" \
    -d "title"="eum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/staff",
    "method": "POST",
    "data": {
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
    department_id | numeric |  required  | Valid department id
    user_id | numeric |  required  | Valid user id
    title | string |  required  | 

<!-- END_cde1a268ad4879413936f91d73a540bc -->

<!-- START_76c9bf4aa84f78a0a0c2eb2729e34188 -->
## api/staff/{staff}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/staff/{staff}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/staff/{staff}`

`HEAD api/staff/{staff}`


<!-- END_76c9bf4aa84f78a0a0c2eb2729e34188 -->

<!-- START_c5c03cc30b365cbb9de2757105311e99 -->
## api/staff/{staff}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/staff/{staff}",
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
## api/staff/{staff}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/staff/{staff}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/staff/{staff}",
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
## api/sessions

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/sessions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/sessions",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/sessions`

`HEAD api/sessions`


<!-- END_13c5ec5040d217b9644ebd1d574ffb35 -->

<!-- START_b0309e45a2af0a1e9b599219dbce6d98 -->
## api/sessions

> Example request:

```bash
curl -X POST "http://zaportal.dev/api/sessions" \
-H "Accept: application/json" \
    -d "school_id"="5240575" \
    -d "name"="soluta" \
    -d "start_date"="2002-12-27" \
    -d "end_date"="2002-12-27" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/sessions",
    "method": "POST",
    "data": {
        "school_id": 5240575,
        "name": "soluta",
        "start_date": "2002-12-27",
        "end_date": "2002-12-27"
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
## api/sessions/{session}

> Example request:

```bash
curl -X GET "http://zaportal.dev/api/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/sessions/{session}",
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
    "message": "no \"Authorization\" header found"
}
```

### HTTP Request
`GET api/sessions/{session}`

`HEAD api/sessions/{session}`


<!-- END_60741d30911f638fc16fef8f85b172cc -->

<!-- START_01d1a457f56b8ac4134ff996daf9e9ab -->
## api/sessions/{session}

> Example request:

```bash
curl -X PUT "http://zaportal.dev/api/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/sessions/{session}",
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
## api/sessions/{session}

> Example request:

```bash
curl -X DELETE "http://zaportal.dev/api/sessions/{session}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://zaportal.dev/api/sessions/{session}",
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

