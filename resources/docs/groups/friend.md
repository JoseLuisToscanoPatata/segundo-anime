# Friend

API Endpoints for working with friends

## Index

<small class="badge badge-darkred">requires authentication</small>

See all friend a user have, as well as invitations if the user is the currently logged

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/friendsIndex/eius" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friendsIndex/eius"
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
    "data": [
        "Array of friends",
        "Array of invitation sends",
        "Array of invitations recieved"
    ]
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "User not found:("
}
```
<div id="execution-results-GETapi-friendsIndex--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-friendsIndex--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-friendsIndex--user-"></code></pre>
</div>
<div id="execution-error-GETapi-friendsIndex--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-friendsIndex--user-"></code></pre>
</div>
<form id="form-GETapi-friendsIndex--user-" data-method="GET" data-path="api/friendsIndex/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-friendsIndex--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/friendsIndex/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-friendsIndex--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-friendsIndex--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-friendsIndex--user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Store

<small class="badge badge-darkred">requires authentication</small>

Add an user as a friend

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/friends" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Friendship":{"id":3}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Friendship": {
        "id": 3
    }
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
    "message": "Friend invitation sent to that user :)"
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant send a message to yourself"
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "User not found:("
}
```
<div id="execution-results-POSTapi-friends" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-friends"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-friends"></code></pre>
</div>
<div id="execution-error-POSTapi-friends" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-friends"></code></pre>
</div>
<form id="form-POSTapi-friends" data-method="POST" data-path="api/friends" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-friends', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/friends</code></b>
</p>
<p>
<label id="auth-POSTapi-friends" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-friends" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>Friendship</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
Message defailts
</summary>
<br>
<p>
<b><code>Friendship.id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Friendship.id" data-endpoint="POSTapi-friends" data-component="body" required  hidden>
<br>
User you want to add
</p>
</details>
</p>

</form>


## Show

<small class="badge badge-darkred">requires authentication</small>

Show a friendship between users (quite useless)

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/friends/104" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/104"
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
        "user1_id": 1,
        "user2_id": 2,
        "confirmation_date": null
    }
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant get data from other users relations :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Friendship not found :("
}
```
<div id="execution-results-GETapi-friends--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-friends--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-friends--friend-"></code></pre>
</div>
<div id="execution-error-GETapi-friends--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-friends--friend-"></code></pre>
</div>
<form id="form-GETapi-friends--friend-" data-method="GET" data-path="api/friends/{friend}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-friends--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<p>
<label id="auth-GETapi-friends--friend-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-friends--friend-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="friend" data-endpoint="GETapi-friends--friend-" data-component="url" required  hidden>
<br>
The ID of the friendship.
</p>
</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Accept an user sent invitation to you

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/friends/distinctio" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"friend":3}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/distinctio"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "friend": 3
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "You have confirmed his friend invitation :)"
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant confirm a friendship you have already acepted"
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Friendship not found:("
}
```
<div id="execution-results-PUTapi-friends--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-friends--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-friends--friend-"></code></pre>
</div>
<div id="execution-error-PUTapi-friends--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-friends--friend-"></code></pre>
</div>
<form id="form-PUTapi-friends--friend-" data-method="PUT" data-path="api/friends/{friend}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-friends--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<p>
<label id="auth-PUTapi-friends--friend-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-friends--friend-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="friend" data-endpoint="PUTapi-friends--friend-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="friend" data-endpoint="PUTapi-friends--friend-" data-component="body" required  hidden>
<br>
User you want to add
</p>

</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete a friendship you belong to

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/friends/14" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/14"
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
    "message": "You have deleted this relationship :("
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant delete a friendship you dont belong to :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Friendship not found:("
}
```
<div id="execution-results-DELETEapi-friends--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-friends--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-friends--friend-"></code></pre>
</div>
<div id="execution-error-DELETEapi-friends--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-friends--friend-"></code></pre>
</div>
<form id="form-DELETEapi-friends--friend-" data-method="DELETE" data-path="api/friends/{friend}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-friends--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<p>
<label id="auth-DELETEapi-friends--friend-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-friends--friend-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="friend" data-endpoint="DELETEapi-friends--friend-" data-component="url" required  hidden>
<br>
The ID of the friendship.
</p>
</form>



