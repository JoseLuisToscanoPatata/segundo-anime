# Manga

API Endpoints for working with mangas

## Index

<small class="badge badge-darkred">requires authentication</small>

Get info of every manga on the database

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/mangas" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas"
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
    "message": "Failed! No mangas found :("
}
```
<div id="execution-results-GETapi-mangas" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mangas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mangas"></code></pre>
</div>
<div id="execution-error-GETapi-mangas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mangas"></code></pre>
</div>
<form id="form-GETapi-mangas" data-method="GET" data-path="api/mangas" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mangas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mangas</code></b>
</p>
<p>
<label id="auth-GETapi-mangas" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-mangas" data-component="header"></label>
</p>
</form>


## Store

<small class="badge badge-darkred">requires authentication</small>

Create a new manga on the database

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/mangas" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Manga":{"title":"Naruto","synopsis":"Ugh","chapters":500,"status":"current","subType":"G"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Manga": {
        "title": "Naruto",
        "synopsis": "Ugh",
        "chapters": 500,
        "status": "current",
        "subType": "G"
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
    "message": "Manga created successfully :)",
    "data": {
        "id": 5,
        "title": "Naruto",
        "synopsis": "Ugh",
        "chapters": 500,
        "subtype": "manga",
        "status": "current",
        "ageRating": "G",
        "startDate": null,
        "endDate": null,
        "cover": null
    }
}
```
> Example response (401):

```json
{
    "status": "failed",
    "message": "You dont have permissions :("
}
```
<div id="execution-results-POSTapi-mangas" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mangas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mangas"></code></pre>
</div>
<div id="execution-error-POSTapi-mangas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mangas"></code></pre>
</div>
<form id="form-POSTapi-mangas" data-method="POST" data-path="api/mangas" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mangas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mangas</code></b>
</p>
<p>
<label id="auth-POSTapi-mangas" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-mangas" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>Manga</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
Manga details
</summary>
<br>
<p>
<b><code>Manga.title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Manga.title" data-endpoint="POSTapi-mangas" data-component="body" required  hidden>
<br>
Manga title
</p>
<p>
<b><code>Manga.synopsis</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Manga.synopsis" data-endpoint="POSTapi-mangas" data-component="body" required  hidden>
<br>
Manga synopsis
</p>
<p>
<b><code>Manga.chapters</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Manga.chapters" data-endpoint="POSTapi-mangas" data-component="body" required  hidden>
<br>
Number of chapters
</p>
<p>
<b><code>Manga.status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.status" data-endpoint="POSTapi-mangas" data-component="body"  hidden>
<br>
Manga required status
</p>
<p>
<b><code>Manga.subType</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.subType" data-endpoint="POSTapi-mangas" data-component="body"  hidden>
<br>
Manga ageRating
</p>
<p>
<b><code>Manga.startDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.startDate" data-endpoint="POSTapi-mangas" data-component="body"  hidden>
<br>
Manga startDate
</p>
<p>
<b><code>Manga.endDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.endDate" data-endpoint="POSTapi-mangas" data-component="body"  hidden>
<br>
Manga endDate
</p>
<p>
<b><code>Manga.cover</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="Manga.cover" data-endpoint="POSTapi-mangas" data-component="body"  hidden>
<br>
Manga cover
</p>
</details>
</p>

</form>


## Show

<small class="badge badge-darkred">requires authentication</small>

Get info about the specified manga

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/mangas/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/1"
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
        "title": "Naruto",
        "synopsis": "Ugh",
        "chapters": 500,
        "subtype": "manga",
        "status": "current",
        "ageRating": "G",
        "startDate": "25-04-2011",
        "endDate": "27-10-2017",
        "cover": null
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Failed! no manga found"
}
```
<div id="execution-results-GETapi-mangas--manga-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mangas--manga-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mangas--manga-"></code></pre>
</div>
<div id="execution-error-GETapi-mangas--manga-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mangas--manga-"></code></pre>
</div>
<form id="form-GETapi-mangas--manga-" data-method="GET" data-path="api/mangas/{manga}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mangas--manga-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<p>
<label id="auth-GETapi-mangas--manga-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-mangas--manga-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="GETapi-mangas--manga-" data-component="url" required  hidden>
<br>
The ID of the manga.
</p>
</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Update an existing manga from the database

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/mangas/et" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"manga":1,"Manga":{"title":"Naruto","synopsis":"Ugh","chapters":500,"status":"current","subType":"G"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/et"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "manga": 1,
    "Manga": {
        "title": "Naruto",
        "synopsis": "Ugh",
        "chapters": 500,
        "status": "current",
        "subType": "G"
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
    "message": "Manga updated successfully :)",
    "data": {
        "id": 5,
        "title": "Naruto",
        "synopsis": "Ugh",
        "chapters": 500,
        "subtype": "manga",
        "status": "current",
        "ageRating": "G",
        "startDate": null,
        "endDate": null,
        "cover": null
    }
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
    "message": "Manga not found :("
}
```
<div id="execution-results-PUTapi-mangas--manga-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-mangas--manga-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mangas--manga-"></code></pre>
</div>
<div id="execution-error-PUTapi-mangas--manga-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mangas--manga-"></code></pre>
</div>
<form id="form-PUTapi-mangas--manga-" data-method="PUT" data-path="api/mangas/{manga}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-mangas--manga-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<p>
<label id="auth-PUTapi-mangas--manga-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-mangas--manga-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="PUTapi-mangas--manga-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="PUTapi-mangas--manga-" data-component="body" required  hidden>
<br>
The ID of the manga
</p>
<p>
<details>
<summary>
<b><code>Manga</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
Manga details
</summary>
<br>
<p>
<b><code>Manga.title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Manga.title" data-endpoint="PUTapi-mangas--manga-" data-component="body" required  hidden>
<br>
Manga title
</p>
<p>
<b><code>Manga.synopsis</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Manga.synopsis" data-endpoint="PUTapi-mangas--manga-" data-component="body" required  hidden>
<br>
Manga synopsis
</p>
<p>
<b><code>Manga.chapters</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Manga.chapters" data-endpoint="PUTapi-mangas--manga-" data-component="body" required  hidden>
<br>
Number of chapters
</p>
<p>
<b><code>Manga.status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.status" data-endpoint="PUTapi-mangas--manga-" data-component="body"  hidden>
<br>
Manga required status
</p>
<p>
<b><code>Manga.subType</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.subType" data-endpoint="PUTapi-mangas--manga-" data-component="body"  hidden>
<br>
Manga ageRating
</p>
<p>
<b><code>Manga.startDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.startDate" data-endpoint="PUTapi-mangas--manga-" data-component="body"  hidden>
<br>
Manga startDate
</p>
<p>
<b><code>Manga.endDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Manga.endDate" data-endpoint="PUTapi-mangas--manga-" data-component="body"  hidden>
<br>
Manga endDate
</p>
<p>
<b><code>Manga.cover</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="Manga.cover" data-endpoint="PUTapi-mangas--manga-" data-component="body"  hidden>
<br>
Manga cover
</p>
</details>
</p>

</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete the given manga from the database

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/mangas/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/1"
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
    "message": "Manga deleted successfully :)"
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
    "message": "No manga found :("
}
```
<div id="execution-results-DELETEapi-mangas--manga-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-mangas--manga-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mangas--manga-"></code></pre>
</div>
<div id="execution-error-DELETEapi-mangas--manga-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mangas--manga-"></code></pre>
</div>
<form id="form-DELETEapi-mangas--manga-" data-method="DELETE" data-path="api/mangas/{manga}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mangas--manga-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<p>
<label id="auth-DELETEapi-mangas--manga-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-mangas--manga-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="manga" data-endpoint="DELETEapi-mangas--manga-" data-component="url" required  hidden>
<br>
The ID of the manga.
</p>
</form>



