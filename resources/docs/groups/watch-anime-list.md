# Watch (Anime List)

API Endpoints for working with users anime lists

## Index

<small class="badge badge-darkred">requires authentication</small>

Get info of every anime on the list of an user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/watches/fugit" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/fugit"
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
<div id="execution-results-GETapi-watches--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-watches--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-watches--user-"></code></pre>
</div>
<div id="execution-error-GETapi-watches--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-watches--user-"></code></pre>
</div>
<form id="form-GETapi-watches--user-" data-method="GET" data-path="api/watches/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-watches--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/watches/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-watches--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-watches--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-watches--user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-watches--user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## show

<small class="badge badge-darkred">requires authentication</small>

Show the watch status of an anime on an user list

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/watches/3/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/3/1"
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
        "anime_id": 3,
        "score": 5,
        "favourite": 1,
        "watchStatus": "Watching"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Anime not found in any list :("
}
```
<div id="execution-results-GETapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-GETapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-watches--anime---user-"></code></pre>
</div>
<form id="form-GETapi-watches--anime---user-" data-method="GET" data-path="api/watches/{anime}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-watches--anime---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-watches--anime---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="GETapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the anime.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>


## Store

<small class="badge badge-darkred">requires authentication</small>

Add an anime to the list of an user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/watches" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"List":{"anime_id":3,"score":"5","favourite":1,"watchStatus":"Watching"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "List": {
        "anime_id": 3,
        "score": "5",
        "favourite": 1,
        "watchStatus": "Watching"
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
    "message": "Anime added successfully to your list :)",
    "data": {
        "id": 1,
        "user_id": 1,
        "anime_id": 3,
        "score": 5,
        "favourite": 1,
        "readStatus": "Watching"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "An user cant watch the same anime twice"
}
```
<div id="execution-results-POSTapi-watches" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-watches"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-watches"></code></pre>
</div>
<div id="execution-error-POSTapi-watches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-watches"></code></pre>
</div>
<form id="form-POSTapi-watches" data-method="POST" data-path="api/watches" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-watches', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/watches</code></b>
</p>
<p>
<label id="auth-POSTapi-watches" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-watches" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>List</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
List watch details
</summary>
<br>
<p>
<b><code>List.anime_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.anime_id" data-endpoint="POSTapi-watches" data-component="body" required  hidden>
<br>
Id of the anime to add to the list
</p>
<p>
<b><code>List.score</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="List.score" data-endpoint="POSTapi-watches" data-component="body" required  hidden>
<br>
anime synopsis
</p>
<p>
<b><code>List.favourite</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.favourite" data-endpoint="POSTapi-watches" data-component="body" required  hidden>
<br>
Boolean declaring if its a favourite anime
</p>
<p>
<b><code>List.watchStatus</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="List.watchStatus" data-endpoint="POSTapi-watches" data-component="body"  hidden>
<br>
Status of watch
</p>
</details>
</p>

</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Change the watch status of a anime on an user list

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/watches/3/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"List":{"anime_id":1,"score":"5","favourite":1,"watchStatus":"Watching"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/3/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "List": {
        "anime_id": 1,
        "score": "5",
        "favourite": 1,
        "watchStatus": "Watching"
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
    "message": "Anime updated on your list  :)",
    "data": {
        "id": 1,
        "user_id": 1,
        "manga_id": 3,
        "score": 5,
        "favourite": 1,
        "readStatus": "Watching"
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
    "message": "Anime read not found in your list :("
}
```
<div id="execution-results-PUTapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-PUTapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-watches--anime---user-"></code></pre>
</div>
<form id="form-PUTapi-watches--anime---user-" data-method="PUT" data-path="api/watches/{anime}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<p>
<label id="auth-PUTapi-watches--anime---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-watches--anime---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="PUTapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the anime.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PUTapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>List</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
List watch details
</summary>
<br>
<p>
<b><code>List.anime_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.anime_id" data-endpoint="PUTapi-watches--anime---user-" data-component="body" required  hidden>
<br>
Id of the anime to add to the list
</p>
<p>
<b><code>List.score</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="List.score" data-endpoint="PUTapi-watches--anime---user-" data-component="body" required  hidden>
<br>
anime synopsis
</p>
<p>
<b><code>List.favourite</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.favourite" data-endpoint="PUTapi-watches--anime---user-" data-component="body" required  hidden>
<br>
Boolean declaring if its a favourite anime
</p>
<p>
<b><code>List.watchStatus</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="List.watchStatus" data-endpoint="PUTapi-watches--anime---user-" data-component="body"  hidden>
<br>
Status of watch
</p>
</details>
</p>

</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Change the watch status of a anime on an user list

> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/watches/3/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"List":{"anime_id":1,"score":"5","favourite":1,"watchStatus":"Watching"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/3/1"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "List": {
        "anime_id": 1,
        "score": "5",
        "favourite": 1,
        "watchStatus": "Watching"
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
    "message": "Anime updated on your list  :)",
    "data": {
        "id": 1,
        "user_id": 1,
        "manga_id": 3,
        "score": 5,
        "favourite": 1,
        "readStatus": "Watching"
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
    "message": "Anime read not found in your list :("
}
```
<div id="execution-results-PATCHapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-PATCHapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-watches--anime---user-"></code></pre>
</div>
<form id="form-PATCHapi-watches--anime---user-" data-method="PATCH" data-path="api/watches/{anime}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<p>
<label id="auth-PATCHapi-watches--anime---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-watches--anime---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="PATCHapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the anime.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PATCHapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>List</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
List watch details
</summary>
<br>
<p>
<b><code>List.anime_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.anime_id" data-endpoint="PATCHapi-watches--anime---user-" data-component="body" required  hidden>
<br>
Id of the anime to add to the list
</p>
<p>
<b><code>List.score</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="List.score" data-endpoint="PATCHapi-watches--anime---user-" data-component="body" required  hidden>
<br>
anime synopsis
</p>
<p>
<b><code>List.favourite</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="List.favourite" data-endpoint="PATCHapi-watches--anime---user-" data-component="body" required  hidden>
<br>
Boolean declaring if its a favourite anime
</p>
<p>
<b><code>List.watchStatus</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="List.watchStatus" data-endpoint="PATCHapi-watches--anime---user-" data-component="body"  hidden>
<br>
Status of watch
</p>
</details>
</p>

</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete the given anime from an user list

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/watches/1/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/1/1"
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
    "message": "Anime deleted from your list :)"
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant delete an anime from other people lists :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Anime not found on your list:("
}
```
<div id="execution-results-DELETEapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-watches--anime---user-"></code></pre>
</div>
<form id="form-DELETEapi-watches--anime---user-" data-method="DELETE" data-path="api/watches/{anime}/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<p>
<label id="auth-DELETEapi-watches--anime---user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-watches--anime---user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="DELETEapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="DELETEapi-watches--anime---user-" data-component="url" required  hidden>
<br>
The ID of the anime.
</p>
</form>



