# Anime

API Endpoints for working with animes

## Index

<small class="badge badge-darkred">requires authentication</small>

Get info of every anime on the database

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/animes" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes"
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
    "message": "Failed! No animes found :("
}
```
<div id="execution-results-GETapi-animes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-animes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-animes"></code></pre>
</div>
<div id="execution-error-GETapi-animes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-animes"></code></pre>
</div>
<form id="form-GETapi-animes" data-method="GET" data-path="api/animes" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-animes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/animes</code></b>
</p>
<p>
<label id="auth-GETapi-animes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-animes" data-component="header"></label>
</p>
</form>


## Store

<small class="badge badge-darkred">requires authentication</small>

Create a new anime on the database

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/animes" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Anime":{"title":"One piece","synopsis":"too many episodes","episodes":900,"episodeLength":25,"status":"current","subType":"G","trailer":"https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Anime": {
        "title": "One piece",
        "synopsis": "too many episodes",
        "episodes": 900,
        "episodeLength": 25,
        "status": "current",
        "subType": "G",
        "trailer": "https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY"
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
    "message": "Anime created successfully :)",
    "data": {
        "id": 1,
        "title": "One piece",
        "synopsis": "Too many episodes",
        "episodes": 900,
        "episodeLength": 25,
        "subtype": "TV",
        "status": "current",
        "ageRating": "G",
        "trailer": "https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY",
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
<div id="execution-results-POSTapi-animes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-animes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-animes"></code></pre>
</div>
<div id="execution-error-POSTapi-animes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-animes"></code></pre>
</div>
<form id="form-POSTapi-animes" data-method="POST" data-path="api/animes" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-animes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/animes</code></b>
</p>
<p>
<label id="auth-POSTapi-animes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-animes" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>Anime</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
Anime details
</summary>
<br>
<p>
<b><code>Anime.title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Anime.title" data-endpoint="POSTapi-animes" data-component="body" required  hidden>
<br>
Anime title
</p>
<p>
<b><code>Anime.synopsis</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Anime.synopsis" data-endpoint="POSTapi-animes" data-component="body" required  hidden>
<br>
Anime synopsis
</p>
<p>
<b><code>Anime.episodes</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Anime.episodes" data-endpoint="POSTapi-animes" data-component="body" required  hidden>
<br>
Number of episodes
</p>
<p>
<b><code>Anime.episodeLength</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Anime.episodeLength" data-endpoint="POSTapi-animes" data-component="body" required  hidden>
<br>
Length of each episode
</p>
<p>
<b><code>Anime.status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.status" data-endpoint="POSTapi-animes" data-component="body"  hidden>
<br>
Anime required status
</p>
<p>
<b><code>Anime.subType</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.subType" data-endpoint="POSTapi-animes" data-component="body"  hidden>
<br>
Anime ageRating
</p>
<p>
<b><code>Anime.startDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.startDate" data-endpoint="POSTapi-animes" data-component="body"  hidden>
<br>
Anime startDate
</p>
<p>
<b><code>Anime.endDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.endDate" data-endpoint="POSTapi-animes" data-component="body"  hidden>
<br>
Anime endDate
</p>
<p>
<b><code>Anime.trailer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.trailer" data-endpoint="POSTapi-animes" data-component="body"  hidden>
<br>
Anime trailer
</p>
<p>
<b><code>Anime.cover</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="Anime.cover" data-endpoint="POSTapi-animes" data-component="body"  hidden>
<br>
Anime cover
</p>
</details>
</p>

</form>


## Show

<small class="badge badge-darkred">requires authentication</small>

Get info about the specified anime

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/animes/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/1"
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
        "title": "One piece",
        "synopsis": "Too many episodes",
        "episodes": 900,
        "episodeLength": 25,
        "subtype": "TV",
        "status": "current",
        "ageRating": "G",
        "trailer": "https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY",
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
    "message": "Failed! no anime found"
}
```
<div id="execution-results-GETapi-animes--anime-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-animes--anime-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-animes--anime-"></code></pre>
</div>
<div id="execution-error-GETapi-animes--anime-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-animes--anime-"></code></pre>
</div>
<form id="form-GETapi-animes--anime-" data-method="GET" data-path="api/animes/{anime}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-animes--anime-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<p>
<label id="auth-GETapi-animes--anime-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-animes--anime-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="GETapi-animes--anime-" data-component="url" required  hidden>
<br>
The ID of the anime.
</p>
</form>


## Update

<small class="badge badge-darkred">requires authentication</small>

Update an existing anime from the database

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/animes/nihil" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"anime":1,"Anime":{"title":"One piece","synopsis":"too many episodes","episodes":900,"episodeLength":25,"status":"current","subType":"G","trailer":"https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY"}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/nihil"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "anime": 1,
    "Anime": {
        "title": "One piece",
        "synopsis": "too many episodes",
        "episodes": 900,
        "episodeLength": 25,
        "status": "current",
        "subType": "G",
        "trailer": "https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY"
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
    "message": "Anime updated successfully :)",
    "data": {
        "id": 1,
        "title": "One piece",
        "synopsis": "Too many episodes",
        "episodes": 900,
        "episodeLength": 25,
        "subtype": "TV",
        "status": "current",
        "ageRating": "G",
        "trailer": "https:\/\/www.youtube.com\/embed\/tM7qJQ1MVZY",
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
    "message": "Anime not found :("
}
```
<div id="execution-results-PUTapi-animes--anime-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-animes--anime-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-animes--anime-"></code></pre>
</div>
<div id="execution-error-PUTapi-animes--anime-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-animes--anime-"></code></pre>
</div>
<form id="form-PUTapi-animes--anime-" data-method="PUT" data-path="api/animes/{anime}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-animes--anime-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<p>
<label id="auth-PUTapi-animes--anime-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-animes--anime-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="PUTapi-animes--anime-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="PUTapi-animes--anime-" data-component="body" required  hidden>
<br>
The ID of the anime
</p>
<p>
<details>
<summary>
<b><code>Anime</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
Anime details
</summary>
<br>
<p>
<b><code>Anime.title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Anime.title" data-endpoint="PUTapi-animes--anime-" data-component="body" required  hidden>
<br>
Anime title
</p>
<p>
<b><code>Anime.synopsis</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Anime.synopsis" data-endpoint="PUTapi-animes--anime-" data-component="body" required  hidden>
<br>
Anime synopsis
</p>
<p>
<b><code>Anime.episodes</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Anime.episodes" data-endpoint="PUTapi-animes--anime-" data-component="body" required  hidden>
<br>
Number of episodes
</p>
<p>
<b><code>Anime.episodeLength</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Anime.episodeLength" data-endpoint="PUTapi-animes--anime-" data-component="body" required  hidden>
<br>
Length of each episode
</p>
<p>
<b><code>Anime.status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.status" data-endpoint="PUTapi-animes--anime-" data-component="body"  hidden>
<br>
Anime required status
</p>
<p>
<b><code>Anime.subType</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.subType" data-endpoint="PUTapi-animes--anime-" data-component="body"  hidden>
<br>
Anime ageRating
</p>
<p>
<b><code>Anime.startDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.startDate" data-endpoint="PUTapi-animes--anime-" data-component="body"  hidden>
<br>
Anime startDate
</p>
<p>
<b><code>Anime.endDate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.endDate" data-endpoint="PUTapi-animes--anime-" data-component="body"  hidden>
<br>
Anime endDate
</p>
<p>
<b><code>Anime.trailer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="Anime.trailer" data-endpoint="PUTapi-animes--anime-" data-component="body"  hidden>
<br>
Anime trailer
</p>
<p>
<b><code>Anime.cover</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="Anime.cover" data-endpoint="PUTapi-animes--anime-" data-component="body"  hidden>
<br>
Anime cover
</p>
</details>
</p>

</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete the given anime from the database

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/animes/1" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/1"
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
    "message": "Anime deleted successfully :)"
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
    "message": "No anime found :("
}
```
<div id="execution-results-DELETEapi-animes--anime-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-animes--anime-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-animes--anime-"></code></pre>
</div>
<div id="execution-error-DELETEapi-animes--anime-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-animes--anime-"></code></pre>
</div>
<form id="form-DELETEapi-animes--anime-" data-method="DELETE" data-path="api/animes/{anime}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-animes--anime-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<p>
<label id="auth-DELETEapi-animes--anime-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-animes--anime-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="anime" data-endpoint="DELETEapi-animes--anime-" data-component="url" required  hidden>
<br>
The ID of the anime.
</p>
</form>



