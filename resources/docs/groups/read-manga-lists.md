# Read (Manga Lists)

API Endpoints for working with users manga lists

## Index

<small class="badge badge-darkred">requires authentication</small>

Get info of every manga on the list of an user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/reads/molestias" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/molestias"
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
> Example response (404):

```json
{
    "status": "failed",
    "message": "User not found :("
}
```
<div id="execution-results-GETapi-reads--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reads--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reads--user-"></code></pre>
</div>
<div id="execution-error-GETapi-reads--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reads--user-"></code></pre>
</div>
<form id="form-GETapi-reads--user-" data-method="GET" data-path="api/reads/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reads--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/reads/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-reads--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-reads--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-reads--user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-reads--user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## show

<small class="badge badge-darkred">requires authentication</small>

Show the read status of a manga on an user list

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/reads/1/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/1/1"
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
        "user_id": 1,
        "manga_id": 1,
        "score": 10,
        "favourite": 0,
        "readStatus": "Reading"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Manga not found in any list :("
}
```
<div id="execution-results-GETapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-GETapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reads--manga---user-"></code></pre>
</div>
<form id="form-GETapi-reads--manga---user-" data-method="GET" data-path="api/reads/{manga}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-reads--manga---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-reads--manga---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="GETapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the manga.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## Store

<small class="badge badge-darkred">requires authentication</small>

Add a manga to the list of an user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/reads" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"List":{"manga_id":1,"score":"10","favourite":0,"readStatus":"Reading"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "List": {
        "manga_id": 1,
        "score": "10",
        "favourite": 0,
        "readStatus": "Reading"
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
    "message": "Manga added successfully to your list :)",
    "data": {
        "id": 1,
        "user_id": 1,
        "manga_id": 1,
        "score": 10,
        "favourite": 0,
        "readStatus": "Reading"
    }
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "An user cant read the same manga twice"
}
```
<div id="execution-results-POSTapi-reads" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reads"></code></pre>
</div>
<div id="execution-error-POSTapi-reads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reads"></code></pre>
</div>
<form id="form-POSTapi-reads" data-method="POST" data-path="api/reads" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reads</code></b>
</p>
<p>
<label id="auth-POSTapi-reads" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-reads" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>List</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
List read details
</summary>
<br>
<p>
<b><code>List.manga_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.manga_id" data-endpoint="POSTapi-reads" data-component="body" required  hidden>
<br>
Id of the manga to add to the list
</p>
<p>
<b><code>List.score</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="List.score" data-endpoint="POSTapi-reads" data-component="body" required  hidden>
<br>
Manga synopsis
</p>
<p>
<b><code>List.favourite</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.favourite" data-endpoint="POSTapi-reads" data-component="body" required  hidden>
<br>
Boolean declaring if its a favourite manga
</p>
<p>
<b><code>List.readStatus</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="List.readStatus" data-endpoint="POSTapi-reads" data-component="body"  hidden>
<br>
Status of read
</p>
</details>
</p>

</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Change the read status of a manga on an user list

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/reads/1/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"List":{"manga_id":1,"score":"10","favourite":0,"readStatus":"Reading"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/1/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "List": {
        "manga_id": 1,
        "score": "10",
        "favourite": 0,
        "readStatus": "Reading"
    }
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
    "message": "Manga updated on your list  :)",
    "data": {
        "id": 1,
        "user_id": 1,
        "manga_id": 1,
        "score": 10,
        "favourite": 0,
        "readStatus": "Reading"
    }
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant update an anime from other people lists :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Manga read not found in your list :("
}
```
<div id="execution-results-PUTapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-PUTapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-reads--manga---user-"></code></pre>
</div>
<form id="form-PUTapi-reads--manga---user-" data-method="PUT" data-path="api/reads/{manga}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<p>
<label id="auth-PUTapi-reads--manga---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-reads--manga---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="PUTapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the manga.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PUTapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>List</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
List read details
</summary>
<br>
<p>
<b><code>List.manga_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.manga_id" data-endpoint="PUTapi-reads--manga---user-" data-component="body" required  hidden>
<br>
Id of the manga to add to the list
</p>
<p>
<b><code>List.score</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="List.score" data-endpoint="PUTapi-reads--manga---user-" data-component="body" required  hidden>
<br>
Manga synopsis
</p>
<p>
<b><code>List.favourite</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.favourite" data-endpoint="PUTapi-reads--manga---user-" data-component="body" required  hidden>
<br>
Boolean declaring if its a favourite manga
</p>
<p>
<b><code>List.readStatus</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="List.readStatus" data-endpoint="PUTapi-reads--manga---user-" data-component="body"  hidden>
<br>
Status of read
</p>
</details>
</p>

</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Change the read status of a manga on an user list

> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/reads/1/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"List":{"manga_id":1,"score":"10","favourite":0,"readStatus":"Reading"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/1/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "List": {
        "manga_id": 1,
        "score": "10",
        "favourite": 0,
        "readStatus": "Reading"
    }
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Manga updated on your list  :)",
    "data": {
        "id": 1,
        "user_id": 1,
        "manga_id": 1,
        "score": 10,
        "favourite": 0,
        "readStatus": "Reading"
    }
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant update an anime from other people lists :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Manga read not found in your list :("
}
```
<div id="execution-results-PATCHapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-PATCHapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-reads--manga---user-"></code></pre>
</div>
<form id="form-PATCHapi-reads--manga---user-" data-method="PATCH" data-path="api/reads/{manga}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<p>
<label id="auth-PATCHapi-reads--manga---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-reads--manga---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="PATCHapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the manga.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PATCHapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>List</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
List read details
</summary>
<br>
<p>
<b><code>List.manga_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.manga_id" data-endpoint="PATCHapi-reads--manga---user-" data-component="body" required  hidden>
<br>
Id of the manga to add to the list
</p>
<p>
<b><code>List.score</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="List.score" data-endpoint="PATCHapi-reads--manga---user-" data-component="body" required  hidden>
<br>
Manga synopsis
</p>
<p>
<b><code>List.favourite</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.favourite" data-endpoint="PATCHapi-reads--manga---user-" data-component="body" required  hidden>
<br>
Boolean declaring if its a favourite manga
</p>
<p>
<b><code>List.readStatus</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="List.readStatus" data-endpoint="PATCHapi-reads--manga---user-" data-component="body"  hidden>
<br>
Status of read
</p>
</details>
</p>

</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete the given manga from an user list

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/reads/1/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/1/1"
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
    "message": "Manga deleted from your list :)"
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant delete a manga from other people lists :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Manga not found on your list:("
}
```
<div id="execution-results-DELETEapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-reads--manga---user-"></code></pre>
</div>
<form id="form-DELETEapi-reads--manga---user-" data-method="DELETE" data-path="api/reads/{manga}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<p>
<label id="auth-DELETEapi-reads--manga---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-reads--manga---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="DELETEapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the manga.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="DELETEapi-reads--manga---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>



