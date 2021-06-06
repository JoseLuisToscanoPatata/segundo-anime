# User

API Endpoints for working with users, as well as registering and login

## Inertia user

<small class="badge badge-darkred">requires authentication</small>

Inertia default route for getting the current user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/user" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/user"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "id": 1,
    "name": "patata",
    "email": "jl.toscano@hotmail.com",
    "biography": "Me gustan las patatas",
    "email_verified_at": "2021-06-01T13:31:45.000000Z",
    "profile_photo_path": "https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png",
    "last_online": "now",
    "gender": "female",
    "created_at": "2021-06-01T13:31:45.000000Z",
    "updated_at": "2021-06-03T14:54:57.000000Z",
    "role": "admin",
    "profile_photo_url": "http:\/\/localhost:8000\/storage\/https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png"
}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
<p>
<label id="auth-GETapi-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user" data-component="header"></label>
</p>
</form>


## Index

<small class="badge badge-darkred">requires authentication</small>

Get info of every user on the database

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "data": []
}
```
> Example response (401):

```json
{
    "status": "failed",
    "message": "You dont have permissions :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Failed! No user found :("
}
```
<div id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</div>
<div id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</div>
<form id="form-GETapi-users" data-method="GET" data-path="api/users" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users</code></b>
</p>
<p>
<label id="auth-GETapi-users" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-users" data-component="header"></label>
</p>
</form>


## Show

<small class="badge badge-darkred">requires authentication</small>

Get info about the specified user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "name": "patata",
        "email": "jl.toscano@hotmail.com",
        "biography": "Me gustan las patatas",
        "email_verified_at": "2021-06-01T13:31:45.000000Z",
        "profile_photo_path": "https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png",
        "last_online": "now",
        "gender": "female",
        "created_at": "2021-06-01T13:31:45.000000Z",
        "updated_at": "2021-06-03T14:54:57.000000Z",
        "role": "admin",
        "profile_photo_url": "http:\/\/localhost:8000\/storage\/https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "No user found :("
}
```
<div id="execution-results-GETapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--user-"></code></pre>
</div>
<div id="execution-error-GETapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--user-"></code></pre>
</div>
<form id="form-GETapi-users--user-" data-method="GET" data-path="api/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-users--user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Change the role of the given user

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/users/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "User role changed successfully :)"
}
```
> Example response (401):

```json
{
    "status": "failed",
    "message": "You dont have permissions :("
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant change your own permissions :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Failed! No user found :("
}
```
<div id="execution-results-PUTapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--user-"></code></pre>
</div>
<div id="execution-error-PUTapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--user-"></code></pre>
</div>
<form id="form-PUTapi-users--user-" data-method="PUT" data-path="api/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<label id="auth-PUTapi-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PUTapi-users--user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete the given user from the database

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/users/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "User deleted successfully :)"
}
```
> Example response (401):

```json
{
    "status": "failed",
    "message": "You dont have permissions :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Failed! No user found :("
}
```
<div id="execution-results-DELETEapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--user-"></code></pre>
</div>
<form id="form-DELETEapi-users--user-" data-method="DELETE" data-path="api/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<label id="auth-DELETEapi-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="DELETEapi-users--user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## Register

<small class="badge badge-darkred">requires authentication</small>

@unauthenticated

Register a new user in the database

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/register" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"jl.toscano4@hotmail.es","password":"patata12","password_confirmation":"patata12","name":"asdasd"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/register"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "jl.toscano4@hotmail.es",
    "password": "patata12",
    "password_confirmation": "patata12",
    "name": "asdasd"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Success! registration completed",
    "data": {
        "email": "jl.toscano@hotmail.es",
        "name": "asdasd",
        "updated_at": "2021-06-06T13:46:04.000000Z",
        "created_at": "2021-06-06T13:46:04.000000Z",
        "id": 103,
        "role": "user",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=asdasd&color=7F9CF5&background=EBF4FF"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Failed! Registration failed :("
}
```
<div id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</div>
<div id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</div>
<form id="form-POSTapi-register" data-method="POST" data-path="api/register" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/register</code></b>
</p>
<p>
<label id="auth-POSTapi-register" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-register" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The email of the  user.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The password of the  user.
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The password of the  user.
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The password of the  user.
</p>

</form>


## Log in

<small class="badge badge-darkred">requires authentication</small>

@unauthenticated

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/login" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"jl.toscano@hotmail.com","password":"patata12"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/login"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "jl.toscano@hotmail.com",
    "password": "patata12"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "login": true,
    "token": "8|qAFYmSZgBu0fp5c4jiG4FwWIouHffSLh5FeONz1r",
    "data": {
        "id": 1,
        "name": "patata",
        "email": "jl.toscano@hotmail.com",
        "biography": "Me gustan las patatas",
        "email_verified_at": "2021-06-01T13:31:45.000000Z",
        "profile_photo_path": "https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png",
        "last_online": "now",
        "gender": "female",
        "created_at": "2021-06-01T13:31:45.000000Z",
        "updated_at": "2021-06-03T14:54:57.000000Z",
        "role": "admin",
        "profile_photo_url": "http:\/\/localhost:8000\/storage\/https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png"
    }
}
```
> Example response (401):

```json
{
    "status": "failed",
    "message": "You dont have permissions"
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Failed! No user found with this email :("
}
```
<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
<p>
<label id="auth-POSTapi-login" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-login" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
The email of the  user.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
The password of the  user.
</p>

</form>


## Auth User

<small class="badge badge-darkred">requires authentication</small>

Get the user info of the current logged user who called for it

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/userApi" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/userApi"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "name": "patata",
        "email": "jl.toscano@hotmail.com",
        "biography": "Me gustan las patatas",
        "email_verified_at": "2021-06-01T13:31:45.000000Z",
        "profile_photo_path": "https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png",
        "last_online": "now",
        "gender": "female",
        "created_at": "2021-06-01T13:31:45.000000Z",
        "updated_at": "2021-06-03T14:54:57.000000Z",
        "role": "admin",
        "profile_photo_url": "http:\/\/localhost:8000\/storage\/https:\/\/s3.us-east-2.amazonaws.com\/proyectobigchungus\/images\/perfiles\/1.png"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Whoops! no user found"
}
```
<div id="execution-results-GETapi-userApi" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-userApi"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-userApi"></code></pre>
</div>
<div id="execution-error-GETapi-userApi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-userApi"></code></pre>
</div>
<form id="form-GETapi-userApi" data-method="GET" data-path="api/userApi" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-userApi', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/userApi</code></b>
</p>
<p>
<label id="auth-GETapi-userApi" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-userApi" data-component="header"></label>
</p>
</form>



